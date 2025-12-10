<?php

namespace App\Filament\Resources\Acompanhes\Pages;

use App\Filament\Resources\Acompanhes\AcompanheResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAcompanhe extends CreateRecord
{
    protected static string $resource = AcompanheResource::class;

    protected static ?string $title = 'Acompanhe';
    
}
