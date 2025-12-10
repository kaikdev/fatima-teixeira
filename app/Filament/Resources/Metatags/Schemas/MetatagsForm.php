<?php

namespace App\Filament\Resources\Metatags\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Repeater\TableColumn;
use App\Models\Metatags;

class MetatagsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('route_name')
                    ->options(function () {
                        $allRoutes = Metatags::getAllRoutes();
                        $usedRoutes = Metatags::pluck('route_name')->toArray();

                        return collect($allRoutes)
                            ->reject(fn($label, $key) => in_array($key, $usedRoutes))
                            ->toArray();
                    })
                    ->native(false)
                    ->label('Rota')
                    ->required()
                    ->columnSpanFull(),
                    
                Textarea::make('description')
                    ->rows(4)
                    ->required()
                    ->label('Description')
                    ->minLength(0)
                    ->maxLength(160)
                    ->columnSpanFull(),
            ]);
    }
}
