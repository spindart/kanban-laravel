<?php

namespace App\Repositories\Contracts;

use App\Models\Card;

interface CardRepositoryInterface
{
    public function allCards(): Array;
    public function getCardById(int $idCard): Card;
    public function getCards(array $data): Array;
    public function listClasses(array $courses);


}
