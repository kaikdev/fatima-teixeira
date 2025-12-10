<?php

namespace App\Filament\Exports;

use App\Models\Contato;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class ContatoExporter extends Exporter
{
    protected static ?string $model = Contato::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('name')->label('Nome'),
            ExportColumn::make('last_name')->label('Sobrenome'),
            ExportColumn::make('phone')->label('Telefone'),
            ExportColumn::make('email')->label('E-mail'),
            ExportColumn::make('message')->label('Mensagem'),
            ExportColumn::make('created_at')->label('Data de envio')
            ->formatStateUsing(fn ($state) => $state?->format('d/m/Y H:i')),
        ];
    }

    public function getFileName(Export $export): string
    {
        return "contatos-{$export->getKey()}.xlsx";
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'A exportação dos seus contatos foi concluída e ' . Number::format($export->successful_rows) . ' ' . str('linha')->plural($export->successful_rows) . ' foram '. str('exportada')->plural($export->successful_rows).'.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' falha na exportação.';
        }

        return $body;
    }
}
