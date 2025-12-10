<?php

namespace App\Filament\Resources\Leads;

use App\Filament\Resources\Leads\Pages\ListLeads;
use App\Filament\Resources\Leads\Pages\ViewLeads;
use App\Filament\Resources\Leads\Schemas\LeadsForm;
use App\Filament\Resources\Leads\Tables\LeadsTable;
use App\Filament\Resources\Leads\Schemas\LeadsInfolist;
use App\Models\Leads;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Actions\ExportAction;
use App\Filament\Exports\LeadsExporter;
use Filament\Actions\Exports\Enums\ExportFormat;

class LeadsResource extends Resource
{
    protected static ?string $model = Leads::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-users';

    protected static ?string $recordTitleAttribute = 'leads';

    public static function form(Schema $schema): Schema
    {
        return LeadsForm::configure($schema);
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function infolist(Schema $schema): Schema
    {
        return LeadsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LeadsTable::configure($table)
        ->headerActions([
            ExportAction::make()
                ->exporter(LeadsExporter::class)
                ->formats([
                    ExportFormat::Xlsx,
                ]),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLeads::route('/'),
            'view' => ViewLeads::route('/{record}'),
        ];
    }
}
