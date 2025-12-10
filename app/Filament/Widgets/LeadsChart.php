<?php

namespace App\Filament\Widgets;

use App\Models\Leads;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class LeadsChart extends ChartWidget
{
    protected ?string $heading = 'Leads por mês';

    protected static ?int $sort = 1;

    protected function getData(): array
    {
        // Agrupar leads por mês (usando a coluna created_at)
        $leadsPorMes = Leads::select(
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
            $dados[] = $leadsPorMes[$i] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Leads recebidos',
                    'data' => $dados,
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => 'rgba(59,130,246,0.2)',
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
