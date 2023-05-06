<?php

namespace App\Services;

use App\Models\Card;
use App\Repositories\CardRepository;
use Carbon\Carbon;

class CardService
{
    protected $repository;
    protected $statusService;
    protected $cardMovimentacaoService;
    public function __construct(
        CardRepository $repository,
        StatusService $statusService,
        CardMovimentacaoService $cardMovimentacaoService
    ) {
        $this->repository = $repository;
        $this->statusService = $statusService;
        $this->cardMovimentacaoService = $cardMovimentacaoService;
    }

    public function all()
    {
        return $this->repository->allCards();
    }
    public function getById(int $idCard)
    {
        return $this->repository->getCardById($idCard);
    }

    public function get(array $data)
    {
        return $this->repository->getCards($data);
    }

    public function listClasses(array $courses)
    {
        return $this->repository->listClasses($courses);
    }

    public function prosseguir(array $request)
    {
        $card = $this->getById($request['idCard']);
        $prosseguir = $this->validarProsseguimento($card);
        if ($prosseguir['erro']) {
            return $prosseguir;
        }
        return $this->statusService->mudarStatus($prosseguir);
    }

    private function validarProsseguimento(Card $card)
    {
        if ($card->professores->isEmpty()) {
            $data['erro'] = true;
            $data['msg'] = 'Não é possível prosseguir pois não há nenhum professor!';
            return $data;
        }
        if ($card->status->status == 'Material Recebido') {
            return $this->validarContagemProfessores($card);
        }
        if ($card->status->status == 'Em Conferência') {
            return  $this->validarUltimaAlteracao($card);
        }
        $card->id_status = (int) $card->id_status + 1;
        return $card;
    }

    private function validarUltimaAlteracao(Card $card)
    {
        $ultimoMovimento = $this->ultimaMovimentacao($card);
        $dtRegistro = new Carbon($ultimoMovimento->dt_registro);
        $agora = Carbon::now();
        if ($agora->diffInSeconds($dtRegistro) < 60) {
            $data['erro'] = true;
            $data['msg'] = 'Não é possível prosseguir este card pois ele esta em conferência e sua ultima alteração foi realizada a menos de um mínuto!';
            return $data;
        }
        $card->id_status = $this->statusService->getIdStatusName('Conferido')->id_status;
        return $card;
    }

    private function validarContagemProfessores(Card $card)
    {
        $tmp = $card->toArray();
        if (count($tmp['professores']) > 1) {
            //obter status em conferencia
            $status  = $this->statusService->getIdStatusName('Em Conferência');
            $card->id_status = $status->id_status;
            return $card;
        }
        $status  = $this->statusService->getIdStatusName('Conferido');
        $card->id_status = $status->id_status;

        return $card;
    }

    public function voltar(array $request)
    {
        $card = $this->getById($request['idCard']);
        $ultimoMovimentoCard = $this->voltarUltimaMovimentacao($card);
        $card->id_status = $ultimoMovimentoCard->id_status;
        return $this->statusService->mudarStatus($card);
    }

    public function voltarUltimaMovimentacao(Card $card)
    {
        $ultimoMovimento =   $this->cardMovimentacaoService->voltarUltimaMovimentacaoCard($card)->toArray();
        if (count($ultimoMovimento) > 1) {
            $card->id_status  = $ultimoMovimento[1]['id_status'];
            return $card;
        }
        $card->id_status  =  $ultimoMovimento[0]['id_status'];
        return $card;
    }
    public function ultimaMovimentacao(Card $card)
    {
        $ultimoMovimento =   $this->cardMovimentacaoService->ultimaMovimentacaoCard($card);
        return $ultimoMovimento;
    }
}
