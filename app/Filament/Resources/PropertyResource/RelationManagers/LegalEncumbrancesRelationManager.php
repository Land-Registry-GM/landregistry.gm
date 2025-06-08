<?php

namespace App\Filament\Resources\PropertyResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class LegalEncumbrancesRelationManager extends RelationManager
{
    protected static string $relationship = 'legalEncumbrances';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('encumbrance_type')
                    ->options([
                        'Mortgage' => 'Mortgage',
                        'Lien' => 'Lien',
                        'Easement' => 'Easement',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('institution')
                    ->required(),
                Forms\Components\TextInput::make('amount')
                    ->numeric()
                    ->required(),
                Forms\Components\DatePicker::make('start_date')
                    ->required(),
                Forms\Components\DatePicker::make('end_date'),
                Forms\Components\Toggle::make('is_active')
                    ->default(true),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('encumbrance_type'),
                Tables\Columns\TextColumn::make('institution'),
                Tables\Columns\TextColumn::make('amount')
                    ->money(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
