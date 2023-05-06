<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $primaryKey = 'id_curso';

    protected $table = 'curso';
    protected $fillable = [
        'curso',
    ];
    public $timestamps = false;

    public function cards() {
        return $this->hasMany(Card::class);
    }

}
