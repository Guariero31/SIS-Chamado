<?php

namespace App\Enum;

use Filament\Support\Contracts\HasLabel;

enum TipoUsuario: string implements HasLabel
{
    case CLIENTE = 'cliente';
    case TECNICO = 'tecnico';
    case ADMIN = 'admin';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::CLIENTE => 'Cliente',
            self::TECNICO => 'Tecnico',
            self::ADMIN => 'Administrador',
        };
    }
}

