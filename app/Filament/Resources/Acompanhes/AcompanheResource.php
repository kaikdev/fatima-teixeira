<?php

namespace App\Filament\Resources\Acompanhes;

use App\Filament\Resources\Acompanhes\Pages\CreateAcompanhe;
use App\Filament\Resources\Acompanhes\Pages\EditAcompanhe;
use App\Filament\Resources\Acompanhes\Pages\ListAcompanhes;
use App\Filament\Resources\Acompanhes\Schemas\AcompanheForm;
use App\Filament\Resources\Acompanhes\Tables\AcompanhesTable;
use App\Models\Acompanhe;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class AcompanheResource extends Resource
{
    protected static ?string $model = Acompanhe::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $recordTitleAttribute = 'acompanhe';

    protected static ?string $pluralModelLabel = 'Acompanhe';

    public static function form(Schema $schema): Schema
    {
        return AcompanheForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AcompanhesTable::configure($table);
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
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
            'index' => ListAcompanhes::route('/'),
            'create' => CreateAcompanhe::route('/create'),
            'edit' => EditAcompanhe::route('/{record}/edit'),
        ];
    }
}
