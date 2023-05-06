<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CardMovimentacao extends Model
{
    const CREATED_AT = 'dt_registro';
    const UPDATED_AT = null;
    protected $primaryKey = 'id_card_movimentacao';

    protected $table = 'card_movimentacao';
    protected $fillable = [
        'id_card','id_status'
    ];


    public function card() {
        return $this->belongsTo(Card::class);
    }
    public function status() {
        return $this->belongsTo(Status::class);
    }

}
