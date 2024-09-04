<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    protected $table = 'subcategorias';
    protected $fillable = [
        'nome',
        'descricao'
    ];

    public function chamados()
    {
        return $this->hasMany(Chamado::class);
    }
}
