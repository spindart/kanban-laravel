<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $primaryKey = 'id_professor';

    protected $table = 'professor';
    protected $fillable = [
        'nome',
    ];
    public $timestamps = false;

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function getNomeAttribute($value)
    {
        $arr = explode(' ', $value);
        $collection = collect($arr);

        return     $this->attributes['nome'] = ucfirst($collection->shift() . ' ' . $collection->pop());
    }
}
