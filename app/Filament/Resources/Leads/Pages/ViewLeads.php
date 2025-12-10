<?php

namespace App\Filament\Resources\Leads\Pages;

use App\Filament\Resources\Leads\LeadsResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use App\Models\Leads;

class ViewLeads extends ViewRecord
{
    protected static string $resource = LeadsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }

    public function mount($record): void
    {
        parent::mount($record);

        if ($this->record instanceof Leads && $this->record->status !== 'read') {
            $this->record->markAsRead();
        }
    }
}
