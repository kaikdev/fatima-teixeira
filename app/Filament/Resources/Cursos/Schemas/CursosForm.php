<?php

namespace App\Filament\Resources\Cursos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CursosForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Título')
                    ->live(onBlur: true)
                    ->maxLength(150)
                    ->reactive()
                    ->suffix(fn ($state) => (strlen((string) $state) ?: 0) . '/150')
                    ->columnSpanFull()
                    ->required(),
                Textarea::make('text')
                    ->label('Texto')
                    ->rows(5)
                    ->columnSpanFull()
                    ->required(),

                FileUpload::make('gallery')
                    ->label('Galeria')
                    ->disk('public')
                    ->visibility('public')
                    ->directory('cursos/gallery')
                    ->multiple()
                    ->panelLayout('grid')
                    ->image()
                    ->uploadingMessage('Carregando arquivo...')
                    ->reorderable()
                    ->appendFiles()
                    ->columnSpanFull(),
            ]);
    }
}
