<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $primaryKey = 'id_tipo';

    protected $table = 'tipo';
    protected $fillable = [
        'tipo',
    ];
    public $timestamps = false;


    public function cards() {
        return $this->hasMany(Card::class);
    }
}
