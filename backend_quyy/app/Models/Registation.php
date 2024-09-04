<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registation extends Model
{
    use HasFactory;

    protected $table = 'registrations';
    protected $fillable = [
        'name',
        'nick_name',
        'birth_date',
        'gender',
        'phone',
        'address',
        'email',
        'status',
    ];
}
