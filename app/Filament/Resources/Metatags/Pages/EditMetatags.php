<?php

namespace App\Filament\Resources\Metatags\Pages;

use App\Filament\Resources\Metatags\MetatagsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMetatags extends EditRecord
{
    protected static string $resource = MetatagsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
