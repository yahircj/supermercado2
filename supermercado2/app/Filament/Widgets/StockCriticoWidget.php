<?php

namespace App\Filament\Widgets;

use App\Models\Producto;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;

class StockCriticoWidget extends TableWidget
{
    protected int | string | array $columnSpan = 1; // O 'full' para ancho completo
    protected static ?int $sort = 3; // Orden 1 (primero)

    protected function getTableQuery(): Builder
    {
        return Producto::query()
            ->whereColumn('stock', '<=', 'stock_minimo')
            ->orderByRaw('stock - stock_minimo');
    }

    protected function getTableColumns(): array
    {
        return [
            // Tables\Columns\ImageColumn::make('imagen')
            //     ->label('')
            //     ->circular(),
                
            Tables\Columns\TextColumn::make('nombre')
                ->searchable()
                ->weight('bold'),
                
            Tables\Columns\TextColumn::make('stock')
                ->color(fn ($record) => $record->stock == 0 ? 'danger' : 'warning'),
                
            Tables\Columns\TextColumn::make('stock_minimo')
                ->label('Mínimo'),
        ];
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false; // Desactiva paginación para ver todos los críticos
    }
}

