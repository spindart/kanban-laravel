<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $primaryKey = 'id_status';

    protected $table = 'status';
    protected $fillable = [
        'status,cor',
    ];
    public $timestamps = false;

    public function cards()
    {
        return $this->belongsToMany(Card::class, "card_movimentacao", "id_status", "id_card", "id_status", "id_card");
    }

}
