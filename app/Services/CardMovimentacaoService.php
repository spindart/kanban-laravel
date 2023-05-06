<?php

namespace App\Services;

use App\Models\Card;
use App\Repositories\CardMovimentacaoRepository;

class CardMovimentacaoService
{
    protected $repository;

    public function __construct(CardMovimentacaoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function voltarUltimaMovimentacaoCard(Card $card)
    {
        return $this->repository->voltarUltimaMovimentacaoCard($card);
    }
    public function ultimaMovimentacaoCard(Card $card)
    {
        return $this->repository->ultimaMovimentacaoCard($card);
    }
}
