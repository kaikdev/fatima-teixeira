<?php

namespace App\Filament\Resources\Contatos\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Support\Enums\IconPosition;
use Filament\Support\Icons\Heroicon;

class ContatoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('Nome')
                    ->icon(Heroicon::ClipboardDocumentList)
                    ->iconPosition(IconPosition::Before)
                    ->copyable()
                    ->copyMessage('Copiado com sucesso!')
                    ->copyMessageDuration(1500)
                    ->placeholder('-'),

                TextEntry::make('last_name')
                    ->label('Sobrenome')
                    ->icon(Heroicon::ClipboardDocumentList)
                    ->iconPosition(IconPosition::Before)
                    ->copyable()
                    ->copyMessage('Copiado com sucesso!')
                    ->copyMessageDuration(1500)
                    ->placeholder('-'),

                TextEntry::make('phone')
                    ->label('Telefone')
                    ->icon(Heroicon::ClipboardDocumentList)
                    ->iconPosition(IconPosition::Before)
                    ->copyable()
                    ->copyMessage('Copiado com sucesso!')
                    ->copyMessageDuration(1500)
                    ->placeholder('-'),

                TextEntry::make('email')
                    ->label('E-mail')
                    ->icon(Heroicon::ClipboardDocumentList)
                    ->iconPosition(IconPosition::Before)
                    ->copyable()
                    ->copyMessage('Copiado com sucesso!')
                    ->copyMessageDuration(1500)
                    ->placeholder('-'),

                TextEntry::make('message')
                    ->placeholder('-')
                    ->label('Mensagem')
                    ->icon(Heroicon::ClipboardDocumentList)
                    ->iconPosition(IconPosition::Before)
                    ->copyable()
                    ->copyMessage('Copiado com sucesso!')
                    ->copyMessageDuration(1500)
                    ->formatStateUsing(fn ($state) => nl2br(e($state)))
                    ->html()
                    ->columnSpanFull(),

                TextEntry::make('created_at')
                ->label('Enviado em')
                ->formatStateUsing(fn ($state) => $state?->format('d/m/Y H:i'))
                ->placeholder('-'),

                TextEntry::make('status')
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
                    ->label('Status')
                    ->placeholder('-'),

                ]);

    }
}
