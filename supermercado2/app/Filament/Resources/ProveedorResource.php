<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProveedorResource\Pages;
use App\Filament\Resources\ProveedorResource\RelationManagers;
use App\Models\Proveedor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProveedorResource extends Resource
{
    protected static ?string $model = Proveedor::class;

    protected static ?string $modelLabel = 'Proveedor'; // Nombre singular
    protected static ?string $pluralModelLabel = 'Proveedores'; // Nombre plural

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make() // Agrupa campos en una tarjeta
                    ->schema([
                        Forms\Components\TextInput::make('nombre')
                            ->required()
                            ->maxLength(100)
                            ->unique(ignoreRecord: true),
                        
                        Forms\Components\TextInput::make('ruc')
                            ->label('RUC')
                            ->maxLength(20)
                            ->unique(ignoreRecord: true),
                        
                        Forms\Components\TextInput::make('telefono')
                            ->tel()
                            ->maxLength(20),
                            
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(100),
                            
                        Forms\Components\Textarea::make('direccion')
                            ->columnSpanFull(),
                            
                        Forms\Components\Section::make('Contacto') // Sección agrupada
                            ->schema([
                                Forms\Components\TextInput::make('contacto_nombre')
                                    ->label('Nombre del contacto')
                                    ->maxLength(100),
                                    
                                Forms\Components\TextInput::make('contacto_telefono')
                                    ->label('Teléfono del contacto')
                                    ->tel(),
                            ])->columns(2),
                            
                        Forms\Components\Toggle::make('activo')
                            ->default(true)
                            ->inline(false),
                            
                        Forms\Components\Textarea::make('notas')
                            ->label('Observaciones')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('ruc')
                    ->label('RUC')
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('telefono')
                    ->searchable(),
                    
                Tables\Columns\IconColumn::make('activo')
                    ->boolean()
                    ->label('Activo'),
                    
                // Tables\Columns\TextColumn::make('productos_count')
                //     ->counts('productos')
                //     ->label('Productos')
                //     ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('activo')
                    ->options([
                        '1' => 'Activos',
                        '0' => 'Inactivos',
                    ]),
                    
                Tables\Filters\TrashedFilter::make(), // Filtro para soft deletes
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(), // Para soft deletes
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
            ]);
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
            'index' => Pages\ListProveedors::route('/'),
            'create' => Pages\CreateProveedor::route('/create'),
            'edit' => Pages\EditProveedor::route('/{record}/edit'),
        ];
    }
}
