<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtividadeChamado extends Model
{
    protected $fillable = ['chamado_id', 'tecnico_id', 'descricao', 'data'];

    public function chamado()
    {
        return $this->belongsTo(Chamado::class);
    }

    public function tecnico()
    {
        return $this->belongsTo(Usuario::class, 'tecnico_id');
    }
}
