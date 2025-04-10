<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductoResource\Pages;
use App\Filament\Resources\ProductoResource\RelationManagers;
use App\Models\Producto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductoResource extends Resource
{
    protected static ?string $model = Producto::class;

    protected static ?string $navigationIcon = 'heroicon-o-swatch';

    protected static ?string $modelLabel = 'Producto';

    protected static ?string $navigationGroup = 'Inventario';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                    
                Forms\Components\Textarea::make('descripcion')
                    ->columnSpanFull(),
                    
                Forms\Components\TextInput::make('precio')
                    ->numeric()
                    ->required()
                    ->prefix('$')
                    ->minValue(0),
                    
                Forms\Components\TextInput::make('stock')
                    ->numeric()
                    ->required()
                    ->minValue(0),
                    
                Forms\Components\FileUpload::make('imagen')
                    ->directory('productos')
                    ->image()
                    ->columnSpanFull(),
                    
                Forms\Components\TextInput::make('categoria')
                    ->maxLength(255),
                    
                Forms\Components\TextInput::make('stock_minimo')
                    ->numeric()
                    ->required()
                    ->minValue(0)
                    ->default(10),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\ImageColumn::make('imagen')
                //     ->label('Imagen')
                //     ->circular(),
                    
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('precio')
                    ->money('USD')
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('stock')
                    ->numeric()
                    ->sortable()
                    ->color(function ($record) {
                        if ($record->stock <= $record->stock_minimo) {
                            return 'danger';
                        }
                        return null;
                    }),
                    
                Tables\Columns\TextColumn::make('categoria')
                    ->searchable()
                    ->badge(),
                    
                Tables\Columns\TextColumn::make('stock_minimo')
                    ->toggleable(isToggledHiddenByDefault: true),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('categoria')
                    ->options(
                        Producto::query()->whereNotNull('categoria')->pluck('categoria', 'categoria')->unique()
                    )
                    ->searchable(),
                
                Tables\Filters\Filter::make('stock_bajo')
                    ->label('Stock bajo')
                    ->query(fn (Builder $query) => $query->whereColumn('stock', '<=', 'stock_minimo'))
                    ->toggle(),
                
                Tables\Filters\Filter::make('rango_precios')
                    ->form([
                        Forms\Components\TextInput::make('min')
                            ->numeric()
                            ->placeholder('Mínimo'),
                        Forms\Components\TextInput::make('max')
                            ->numeric()
                            ->placeholder('Máximo'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['min'] ?? null,
                                fn (Builder $query, $min): Builder => $query->where('precio', '>=', $min)
                            )
                            ->when(
                                $data['max'] ?? null,
                                fn (Builder $query, $max): Builder => $query->where('precio', '<=', $max)
                            );
                    }),
                    
                Tables\Filters\Filter::make('sin_stock')
                    ->label('Agotados')
                    ->query(fn (Builder $query) => $query->where('stock', 0))
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->defaultSort('stock', 'asc');
    }

    // public static function getRelations(): array
    // {
    //     return [
    //         RelationManagers\ProveedorRelationManager::class,
    //     ];
    // }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductos::route('/'),
            'create' => Pages\CreateProducto::route('/create'),
            'edit' => Pages\EditProducto::route('/{record}/edit'),
        ];
    }
}