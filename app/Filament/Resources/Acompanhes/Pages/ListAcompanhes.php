<?php

namespace App\Filament\Resources\Acompanhes\Pages;

use App\Filament\Resources\Acompanhes\AcompanheResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAcompanhes extends ListRecords
{
    protected static string $resource = AcompanheResource::class;

    protected static ?string $title = 'Acompanhe';
    
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
