<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $primaryKey = 'id_card';
    protected $table = 'card';
    protected $fillable = [
        'id_tipo,id_curso,id_status,dt_registro,ano,num_aula',
    ];
    public $timestamps = false;

    public function professores()
    {
        return $this->belongsToMany(Professor::class, "card_professor", "id_card", "id_professor", "id_card", "id_professor");

    }
    public function movimentacoes()
    {
        return $this->belongsToMany(Status::class, "card_movimentacao", "id_card", "id_status", "id_card", "id_status");
    }
    public function status()
    {
        return $this->hasOne(Status::class, "id_status", "id_status");
    }
    public function materiais()
    {
        return $this->belongsToMany(Material::class, "card_material", "id_card", "id_material", "id_card", "id_material");
    }
    public function tipo()
    {
        return $this->hasOne(Tipo::class, 'id_tipo', 'id_tipo');
    }
    public function curso()
    {
        return $this->hasOne(Curso::class, 'id_curso', 'id_curso');
    }




}
