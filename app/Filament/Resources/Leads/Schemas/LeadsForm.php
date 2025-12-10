<?php

namespace App\Filament\Resources\Leads\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Support\Icons\Heroicon;

class LeadsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Lead recebido')
                ->description('Detalhes do lead recebido pelo site.')
                ->columns(3)
                ->schema([
                    TextInput::make('page_url')
                    ->url()
                    ->label('Página de origem')
                    ->columnSpanFull()
                    ->suffixIcon(Heroicon::GlobeAlt),

                    TextInput::make('name')
                    ->label('Nome')
                    ->required(),

                    TextInput::make('phone')
                    ->label('Telefone')
                    ->mask('(99) 99999-9999')
                    ->required(),

                    TextInput::make('email')
                    ->label('E-mail')
                    ->email()
                    ->required(),
                ])->columnSpanFull(),
            ]);
    }
}
