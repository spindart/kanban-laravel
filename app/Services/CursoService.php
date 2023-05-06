<?php

namespace App\Services;

use App\Repositories\CursoRepository;

class CursoService
{
    protected $repository;

    public function __construct(CursoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listAll()
    {
        return $this->repository->listAllCourse();
    }

}
