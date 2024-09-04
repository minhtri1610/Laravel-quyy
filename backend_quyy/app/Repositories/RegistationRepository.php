<?php

namespace App\Repositories;

use App\Models\Registation;
use App\Repositories\Interfaces\RegistationRepositoryInterface;

class RegistationRepository extends BaseRepository implements RegistationRepositoryInterface
{
    public function __construct(Registation $registation)
    {
        parent::__construct($registation);
    }
}