<?php

namespace App\Services;

use App\Models\Card;
use App\Repositories\StatusRepository;

class StatusService
{
    protected $repository;

    public function __construct(StatusRepository $repository)
    {
        $this->repository = $repository;
    }

    public function ordernarArray($statusList)
    {
        $data = [];
        if (isset($statusList['Demanda'])) {
            $data['Demanda'] = $statusList['Demanda'];
        } else {
            $data['Demanda'] = false;
        }
        if (isset($statusList['Material Recebido'])) {
            $data['Material Recebido'] = $statusList['Material Recebido'];
        } else {
            $data['Material Recebido'] = false;
        }
        if (isset($statusList['Em Conferência'])) {
            $data['Em Conferência'] = $statusList['Em Conferência'];
        } else {
            $data['Em Conferência'] = false;
        }
        if (isset($statusList['Conferido'])) {
            $data['Conferido'] = $statusList['Conferido'];
        } else {
            $data['Conferido'] = false;
        }
        return $data;
    }




    public function getIdStatusName(String $nome)
    {
        return $this->repository->getIdStatusName($nome);
    }

    public function mudarStatus(Card $card)
    {
        return $this->repository->mudarStatus($card);
    }

    public function getAll()
    {
        return $this->repository->getALl();
    }
}
