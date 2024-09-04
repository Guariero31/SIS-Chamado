<?php

namespace App\Filament\Resources\AtividadeChamadoResource\Pages;

use App\Filament\Resources\AtividadeChamadoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAtividadeChamado extends EditRecord
{
    protected static string $resource = AtividadeChamadoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
