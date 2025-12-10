<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EditProfile extends BaseEditProfile
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user')
                    ->required()
                    ->label('Usuário')
                    ->maxLength(255),
                TextInput::make('name')
                    ->required()
                    ->label('Nome')
                    ->maxLength(50),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
            ]);
    }
}
