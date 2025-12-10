<?php

namespace App\Filament\Resources\Contatos;

use App\Filament\Exports\ContatoExporter;
use App\Filament\Resources\Contatos\Pages\ListContatos;
use App\Filament\Resources\Contatos\Pages\ViewContato;
use App\Filament\Resources\Contatos\Schemas\ContatoForm;
use App\Filament\Resources\Contatos\Schemas\ContatoInfolist;
use App\Filament\Resources\Contatos\Tables\ContatosTable;
use App\Models\Contato;
use BackedEnum;
use Filament\Actions\ExportAction;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ContatoResource extends Resource
{
    protected static ?string $model = Contato::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-phone';

    protected static ?string $recordTitleAttribute = 'contato';

    public static function form(Schema $schema): Schema
    {
        return ContatoForm::configure($schema);
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function infolist(Schema $schema): Schema
    {
        return ContatoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContatosTable::configure($table)
        ->headerActions([
            ExportAction::make()
                ->exporter(ContatoExporter::class)
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
            'index' => ListContatos::route('/'),
            'view' => ViewContato::route('/{record}'),
        ];
    }
}
