<?php

namespace App\Repositories;

use App\Models\Card;
use App\Models\CardMovimentacao;
use App\Repositories\Contracts\CardMovimentacaoRepositoryInterface;

class CardMovimentacaoRepository implements CardMovimentacaoRepositoryInterface
{
    private $model;

    public function __construct(CardMovimentacao $model)
    {
        $this->model = $model;
    }

    public function voltarUltimaMovimentacaoCard(Card $card)
    {
        return $this->model::where('id_card', $card->id_card)->orderBy('id_card_movimentacao', 'desc')->take(2)->get();
    }
    public function ultimaMovimentacaoCard(Card $card)
    {
        return $this->model::where('id_card', $card->id_card)->orderBy('id_card_movimentacao', 'desc')->first();
    }
}
