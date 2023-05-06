<?php

namespace App\Repositories;

use App\Models\Card;
use App\Repositories\Contracts\CardRepositoryInterface;

class CardRepository implements CardRepositoryInterface
{
    private $model;

    public function __construct(Card $model)
    {
        $this->model = $model;
    }

    public function allCards(): array
    {
        return $this->model::with('tipo', 'materiais', 'professores', 'curso', 'status')->get()->groupBy('status.status')->sortByDesc('dt_registro')->toArray();
    }
    public function getCardById(int $idCard): Card
    {
        return $this->model::with('tipo', 'materiais', 'professores', 'curso', 'status')->where('card.id_card', $idCard)->firstOrFail();
    }

    public function getCards(array $data): array
    {
        $results = $this->model::query()->with('tipo', 'materiais', 'professores', 'curso', 'status');
        if ($data['cursos'])
            $results = $results->whereIn('id_curso', $data['cursos']);
        if ($data['aulas'])
            $results = $results->whereIn('num_aula', $data['aulas']);
        if ($data['professor']) {
            $professor = $data['professor'];
            $results = $results->whereHas('professores', function ($query) use ($professor) {
                $results = $query->where('nome', 'like', "%$professor%");
            });
        }
        $order = $data['order'];
        switch ($data['orderBy']) {
            case 'num_aula':
            case 'ano':
                $results->orderBy($data['orderBy'], $data['order']);
                break;
            case 'curso':
                $results = $results->whereHas('curso', function ($query) use ($order) {
                    $results = $query->orderBy('curso', $order);
                });
            case 'professor':
                $results = $results->whereHas('professores', function ($query) use ($order) {
                    $results = $query->orderBy('nome', $order);
                });
                break;
        }
        return $results->get()->groupBy('status.status')->toArray();
    }

    public function listClasses(array $courses)
    {
        if (!empty($courses)) {
            return $this->model::query()->whereIn('id_curso', $courses)->orderBy('num_aula', 'ASC')->pluck('num_aula', 'num_aula')->toArray();
        }
        return $this->model::query()->orderBy('num_aula', 'ASC')->pluck('num_aula', 'num_aula')->toArray();
    }
}
