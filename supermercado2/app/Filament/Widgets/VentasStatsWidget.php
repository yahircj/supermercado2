<?php

namespace App\Filament\Widgets;

use App\Models\Pedido;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class VentasStatsWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 2; // O 'full' para ancho completo
    protected static ?int $sort = 1; // Orden 1 (primero)
    protected function getStats(): array
    {
        return [
            Stat::make('Pedidos Hoy', Pedido::whereDate('created_at', today())->count())
                ->description('+' . Pedido::whereDate('created_at', today())->where('estatus', 'Entregado')->count() . ' entregados')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
                
            Stat::make('Ventas Mensuales', '$' . Pedido::whereMonth('created_at', now())->sum('total'))
                ->description(now()->format('F Y'))
                ->color('primary'),
                
            Stat::make('Pedidos Pendientes', Pedido::where('estatus', 'Procesando')->count())
                ->description('Por atender')
                ->color('warning')
                ->url(route('filament.admin.resources.pedidos.index')),
        ];
    }

    protected function getColumns(): int
    {
        return 3; // Muestra las stats en 3 columnas
    }
}
