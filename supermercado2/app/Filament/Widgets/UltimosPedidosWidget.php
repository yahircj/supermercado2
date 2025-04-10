<?php

namespace App\Filament\Widgets;

use App\Models\Pedido;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables;

class UltimosPedidosWidget extends TableWidget
{
    protected int | string | array $columnSpan = 2; // O 'full' para ancho completo
    protected static ?int $sort = 4; // Orden 1 (primero)

    protected function getTableQuery(): Builder
    {
        return Pedido::with('cliente')
            ->latest()
            ->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('cliente.nombre')
                ->label('Cliente'),
                
            Tables\Columns\TextColumn::make('total')
                ->money('USD'),
                
            Tables\Columns\BadgeColumn::make('estatus')
                ->colors([
                    'warning' => 'Procesando',
                    'info' => 'Enviado',
                    'success' => 'Entregado',
                ]),
        ];
    }
}
