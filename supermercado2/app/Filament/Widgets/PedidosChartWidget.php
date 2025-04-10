<?php

namespace App\Filament\Widgets;

use App\Models\Pedido;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class PedidosChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Distribución de Pedidos';
    protected static ?int $sort = 2; // Orden 1 (primero)
    protected int | string | array $columnSpan = 1; // O 'full' para ancho completo
    protected function getData(): array
    {
        $data = Pedido::select('estatus', DB::raw('count(*) as total'))
            ->groupBy('estatus')
            ->pluck('total', 'estatus');
            
        return [
            'labels' => $data->keys()->map(fn ($status) => ucfirst($status)),
            'datasets' => [
                [
                    'data' => $data->values(),
                    'backgroundColor' => ['#FF6384', '#36A2EB', '#FFCE56'],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
