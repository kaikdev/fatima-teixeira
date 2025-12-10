<?php

namespace App\Filament\Widgets;

use App\Models\Contato;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ContactsChart extends ChartWidget
{
    protected ?string $heading = 'Contatos por mês';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        // Agrupar leads por mês (usando a coluna created_at)
        $contactsPorMes = Contato::select(
                DB::raw('MONTH(created_at) as mes'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('mes')
            ->orderBy('mes')
            ->pluck('total', 'mes')
            ->toArray();

        // Garante que todos os meses estejam no gráfico
        $labels = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
        $dados = [];

        for ($i = 1; $i <= 12; $i++) {
            $dados[] = $contactsPorMes[$i] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Contatos recebidos',
                    'data' => $dados,
                    'borderColor' => '#e04343',
                    'backgroundColor' => '#e04343',
                    'pointBackgroundColor' => '#e04343',
                    'tension' => 0.4, // linha suavizada
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
