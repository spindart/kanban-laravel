<?php

namespace App\Repositories;

use App\Models\Curso;
use App\Repositories\Contracts\CursoRepositoryInterface;

class CursoRepository implements CursoRepositoryInterface
{
    private $model;

    public function __construct(Curso $model)
    {
        $this->model = $model;
    }

    public function listAllCourse()
    {
        return $this->model::pluck('curso','id_curso')->sortByDesc('curso')->toArray();
    }

}
