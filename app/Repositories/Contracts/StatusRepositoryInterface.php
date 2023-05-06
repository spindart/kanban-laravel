<?php

namespace App\Repositories\Contracts;

use App\Models\Card;
use Illuminate\Database\Eloquent\Collection;

interface StatusRepositoryInterface
{
    public function getIdStatusName(String $nome);
    public function mudarStatus(Card $card);
    public function getALl();

}
