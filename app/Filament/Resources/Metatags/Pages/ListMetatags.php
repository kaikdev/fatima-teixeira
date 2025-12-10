<?php

namespace App\Filament\Resources\Metatags\Pages;

use App\Filament\Resources\Metatags\MetatagsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMetatags extends ListRecords
{
    protected static string $resource = MetatagsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
