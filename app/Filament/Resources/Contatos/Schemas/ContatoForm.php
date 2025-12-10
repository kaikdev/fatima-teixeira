<?php

namespace App\Filament\Resources\Contatos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ContatoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                ->required()
                ->label('Nome'),

                TextInput::make('last_name')
                ->required()
                ->label('Sobrenome'),

                TextInput::make('phone')
                ->tel()
                ->label('Telefone')
                ->required()
                ->mask('(99) 99999-9999')
                ->default(null),

                TextInput::make('email')
                ->label('E-mail')
                ->required()
                ->email()
                ->default(null),

                Textarea::make('message')
                ->required()
                ->rows(5)
                ->default(null)
                ->label('Mensagem')
                ->columnSpanFull(),
            ]);
    }
}
