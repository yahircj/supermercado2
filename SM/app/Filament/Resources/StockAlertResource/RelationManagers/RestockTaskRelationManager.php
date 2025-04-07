<?php
namespace App\Filament\Resources\StockAlertResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class RestockTaskRelationManager extends RelationManager
{
    protected static string $relationship = 'restockTask';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('assigned_to')
                    ->relationship('assignee', 'name')
                    ->required(),
                Forms\Components\TextInput::make('quantity_required')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed'
                    ])
                    ->required()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('assignee.name'),
                Tables\Columns\TextColumn::make('quantity_required'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'in_progress' => 'primary',
                        'completed' => 'success',
                    }),
            ])
            ->filters([])
            ->headerActions([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }
}