<?php

namespace App\Filament\Resources\Acompanhes\Pages;

use App\Filament\Resources\Acompanhes\AcompanheResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAcompanhe extends EditRecord
{
    protected static string $resource = AcompanheResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
