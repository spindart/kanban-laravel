<?php

namespace App\Repositories\Contracts;

use App\Models\Card;

interface CardMovimentacaoRepositoryInterface
{
    public function voltarUltimaMovimentacaoCard(Card $card);
    public function ultimaMovimentacaoCard(Card $card);

}
