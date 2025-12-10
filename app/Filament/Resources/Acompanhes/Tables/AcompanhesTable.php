<?php

namespace App\Filament\Resources\Acompanhes\Tables;

use App\Models\Acompanhe;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Illuminate\Support\Carbon;

class AcompanhesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->reorderable('order')
            ->columns([
                TextColumn::make('title')
                ->searchable()
                ->label('Título'),

                TextColumn::make('author')
                ->searchable()
                ->label('Autor'),

                TextColumn::make('created_at')
                ->searchable()
                ->dateTime('d/m/Y H:i')
                ->label('Publicado em'),

                TextColumn::make('status')
                ->searchable()
                ->badge()
                ->color(fn ($state) => match ($state) {
                    'disabled' => 'danger',
                    'now' => 'success',
                    'schedule' => 'warning',
                })
                ->formatStateUsing(function ($state, $record) {
                    $state = trim($state, '"'); // remove aspas se houver

                    return match ($state) {
                        'disabled' => 'Desabilitado',
                        'now' => 'Publicado',
                        'schedule' => 'Agendado para ' . Carbon::parse($record->scheduled_at)
                            ->format('d/m/Y H:i'),
                        default => $state,
                    };
                })
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                ->icon('heroicon-o-pencil')
                ->color('primary'),
                Action::make('delete')
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->requiresConfirmation()
                ->action(fn (Acompanhe $record) => $record->delete())
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                    ->icon('heroicon-o-trash')
                    ->color('danger'),
                ]),
            ]);
    }
}
