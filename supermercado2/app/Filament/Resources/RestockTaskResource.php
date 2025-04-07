<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RestockTaskResource\Pages;
use App\Filament\Resources\RestockTaskResource\RelationManagers;
use App\Models\RestockTask;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RestockTaskResource extends Resource
{
    protected static ?string $model = RestockTask::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('stock_alert_id')
                ->relationship('stockAlert', 'id')
                ->required(),
            Forms\Components\Select::make('assigned_to')
                ->relationship('assignee', 'name')
                ->required(),
            Forms\Components\Select::make('assigned_by')
                ->relationship('assigner', 'name')
                ->nullable()
                ->hiddenOn('edit'),
            Forms\Components\TextInput::make('quantity_required')
                ->numeric()
                ->required(),
            Forms\Components\Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'in_progress' => 'In Progress',
                    'completed' => 'Completed',
                    'cancelled' => 'Cancelled'
                ])
                ->required(),
            Forms\Components\DateTimePicker::make('completed_at')
                ->nullable()
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('stockAlert.product.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('assignee.name'),
                Tables\Columns\TextColumn::make('quantity_required'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'gray',
                        'in_progress' => 'warning',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('completed_at')
                    ->dateTime(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('complete')
                    ->visible(fn (RestockTask $record) => $record->status !== 'completed')
                    ->action(function (RestockTask $record) {
                        $record->update([
                            'status' => 'completed',
                            'completed_at' => now()
                        ]);
                    })
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRestockTasks::route('/'),
            'create' => Pages\CreateRestockTask::route('/create'),
            'edit' => Pages\EditRestockTask::route('/{record}/edit'),
        ];
    }
}