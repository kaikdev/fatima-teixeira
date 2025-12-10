<?php

namespace App\Filament\Resources\Metatags;

use App\Filament\Resources\Metatags\Pages\CreateMetatags;
use App\Filament\Resources\Metatags\Pages\EditMetatags;
use App\Filament\Resources\Metatags\Pages\ListMetatags;
use App\Filament\Resources\Metatags\Schemas\MetatagsForm;
use App\Filament\Resources\Metatags\Tables\MetatagsTable;
use App\Models\Metatags;
use UnitEnum;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MetatagsResource extends Resource
{

    protected static ?string $model = Metatags::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-globe-alt';

    protected static ?string $recordTitleAttribute = 'metatags';

    protected static string | UnitEnum | null $navigationGroup = 'Configurações site';

    public static function form(Schema $schema): Schema
    {
        return MetatagsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MetatagsTable::configure($table);
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
            'index' => ListMetatags::route('/'),
            'edit' => EditMetatags::route('/{record}/edit'),
            // 'create' => CreateMetatags::route('/create'),
        ];
    }
}
