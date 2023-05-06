<?php

namespace App\Repositories;

use App\Models\Card;
use App\Models\CardMovimentacao;
use App\Models\Status;
use App\Repositories\Contracts\StatusRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class StatusRepository implements StatusRepositoryInterface
{
    private $model;

    public function __construct(Status $model)
    {
        $this->model = $model;
    }

    public function getIdStatusName(String $nome)
    {
        return $this->model->where('status', $nome)->first();
    }

    public function mudarStatus(Card $card)
    {
        DB::beginTransaction();
        try {
            $id_card = $card->id_card;
            $id_status_movimentacao = $card->id_status;
            $card->save();

            $movimentacao = new CardMovimentacao();

            $movimentacao->id_status = $id_status_movimentacao;
            $movimentacao->id_card = $id_card;
            $movimentacao->save();
            DB::commit();
            $data['erro'] = false;
            $data['msg'] = 'Movido com sucesso!';
            return $data;
        } catch (Exception $e) {
            DB::rollBack();
            print $e->getLine();
            print $e->getMessage();
        }
    }

    public function getAll()
    {
        return $this->model::pluck('cor', 'status');
    }
}
