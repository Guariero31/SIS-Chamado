<?php

namespace App\Enum;

use Filament\Support\Contracts\HasLabel;

enum Status: string implements HasLabel
{
    case ABERTO = 'aberto';
    case EM_ANDAMENTO = 'em_andamento';
    case AGUARDANDO_RETORNO = 'aguardando_retorno';
    case FECHADO = 'fechado';
    case CANCELADO = 'cancelado';

    public function getLabel(): string
    {
        return match ($this) {
            self::ABERTO => 'Aberto',
            self::EM_ANDAMENTO => 'Em Andamento',
            self::AGUARDANDO_RETORNO => 'Aguardando Retorno',
            self::FECHADO => 'Fechado',
            self::CANCELADO => 'Cancelado',
        };
    }
}

