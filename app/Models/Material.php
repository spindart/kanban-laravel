<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $primaryKey = 'id_material';
    protected $table = 'material';
    protected $fillable = [
        'material,icone',
    ];
    public $timestamps = false;

    public function cards() {
        return $this->hasMany(Card::class);
    }

}
