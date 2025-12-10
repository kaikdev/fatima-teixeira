<?php

namespace App\Filament\Resources\Cursos\Pages;

use App\Filament\Resources\Cursos\CursosResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCursos extends EditRecord
{
    protected static string $resource = CursosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
