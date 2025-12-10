<?php

namespace App\Filament\Resources\Contatos\Pages;

use App\Filament\Resources\Contatos\ContatoResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use App\Models\Contato;

class ViewContato extends ViewRecord
{
    protected static string $resource = ContatoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
    
    public function mount($record): void
    {
        parent::mount($record);

        if ($this->record instanceof Contato && $this->record->status !== 'read') {
            $this->record->markAsRead();
        }
    }
}
