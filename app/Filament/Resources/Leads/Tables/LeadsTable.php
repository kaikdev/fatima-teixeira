<?php

namespace App\Filament\Resources\Leads\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class LeadsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('page_url')
                ->badge()
                ->label('Página de origem'),

                TextColumn::make('name')
                ->copyable()
                ->copyMessage('Copiado com sucesso!')
                ->copyMessageDuration(1500)
                ->label('Nome')
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
                        'read' => 'warning',
                        'new' => 'success',
                    })
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'new' => 'Novo',
                            'read' => 'Lido',
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
