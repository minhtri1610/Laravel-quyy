<?php

namespace App\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    public function all();

    public function find($id);

    public function create(array $attributes);

    public function updateOrCreate(array $attributes, array $values = []);

    public function delete($id);

    public function login(array $attributes);
}
