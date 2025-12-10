<?php

namespace App\Filament\Resources\Contatos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContatosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),

                TextColumn::make('last_name')
                    ->label('Sobrenome')
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('Telefone')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Enviado em')
                    ->formatStateUsing(fn ($state) => $state?->format('d/m/Y H:i'))
                    ->sortable(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'new' => 'success',
                        'read' => 'warning',
                    })
                    ->formatStateUsing(function ($state, $record) {
                        return match ($state) {
                            'new' => 'Novo',
                            'read' => 'Lido',
                            default => $state,
                        };
                    })
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
