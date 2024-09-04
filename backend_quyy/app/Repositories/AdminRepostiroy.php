<?php

namespace App\Repositories;

use App\Repositories\Interfaces\AdminRepositoryInterface;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{
    public function __construct(Admin $model)
    {
        parent::__construct($model);
    }

    public function dashboard()
    {
        return $this->model->dashboard();
    }
}