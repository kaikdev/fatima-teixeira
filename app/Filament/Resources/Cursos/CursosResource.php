<?php

namespace App\Filament\Resources\Cursos;

use App\Filament\Resources\Cursos\Pages\CreateCursos;
use App\Filament\Resources\Cursos\Pages\EditCursos;
use App\Filament\Resources\Cursos\Pages\ListCursos;
use App\Filament\Resources\Cursos\Schemas\CursosForm;
use App\Filament\Resources\Cursos\Tables\CursosTable;
use App\Models\Cursos;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CursosResource extends Resource
{
    protected static ?string $model = Cursos::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Cursos';

    public static function form(Schema $schema): Schema
    {
        return CursosForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CursosTable::configure($table);
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
            'index' => ListCursos::route('/'),
            'create' => CreateCursos::route('/create'),
            'edit' => EditCursos::route('/{record}/edit'),
        ];
    }
}
