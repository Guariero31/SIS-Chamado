<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    protected $fillable = [
        'usuario_id',
        'tecnico_id',
        'subcategoria_id',
        'descricao',
        'prioridade',
        'status',
        'data_abertura',
        'data_atualizacao',
        'data_conclusa',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function tecnico()
    {
        return $this->belongsTo(Usuario::class, 'tecnico_id');
    }

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }

    public function atividades()
    {
        return $this->hasMany(AtividadesChamado::class);
    }
}
