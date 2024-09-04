<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\RegistationRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class RegistationController extends Controller
{
    protected $registationRepository;

    public function __construct(RegistationRepositoryInterface $registationRepository)
    {
        $this->registationRepository = $registationRepository;
    }

    public function registerUser(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'nick_name' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:registrations',
            'status' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Tạo người dùng mới
        $registation = $this->registationRepository->create($request->all());

        return response()->json(['message' => 'User registered successfully', 'data' => $registation], 201);
    }
}
