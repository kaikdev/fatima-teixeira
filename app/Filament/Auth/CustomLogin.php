<?php

namespace App\Filament\Auth;

use Filament\Auth\Pages\Login;
use Filament\Forms\Components\Checkbox;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class CustomLogin extends Login
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user')
                    ->label('Usuário')
                    ->required()
                    ->autofocus()
                    ->placeholder('Digite seu usuário'),
                TextInput::make('password')
                    ->label('Senha')
                    ->required()
                    ->password()
                    ->revealable()
                    ->placeholder('Digite sua senha'),
                Checkbox::make('remember')
                    ->label('Lembrar-me')
            ]);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'user' => $data['user'],
            'password' => $data['password'],
        ];
    }

}
