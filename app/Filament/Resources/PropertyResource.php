<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Filament\Resources\PropertyResource\RelationManagers;
use App\Models\Property;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Section::make('Basic Information')
            ->collapsible()
                ->schema([
                    TextInput::make('parcel_id')
                        ->label('Parcel ID')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(50),
                        
                    Fieldset::make('Address')
                        ->schema([
                            TextInput::make('street')
                                ->required()
                                ->maxLength(255),
                                
                            TextInput::make('city')
                                ->required()
                                ->maxLength(100),
                                
                            TextInput::make('state')
                                ->required()
                                ->maxLength(100),
                                
                            TextInput::make('postal_code')
                                ->required()
                                ->maxLength(20),
                                
                            Select::make('ownership_type')
                                ->label('Ownership Type')
                                ->options([
                                    'Freehold' => 'Freehold',
                                    'Leasehold' => 'Leasehold',
                                    'Customary' => 'Customary',
                                    'Joint' => 'Joint Ownership',
                                    'Corporate' => 'Corporate Ownership',
                        ])
                        ->required()
                        ->default('Freehold'),
                        ])->columns(2),
                ]),
                
            Section::make('Geographical Data')
                ->collapsible()
                ->schema([
                    Fieldset::make('Coordinates')
                ->schema([
                    TextInput::make('centroid_lat')
                        ->label('Centroid Latitude')
                        ->numeric()
                        ->required()
                        ->minValue(-90)
                        ->maxValue(90)
                        ->step(0.0000001)
                        ->inputMode('decimal'),
                        
                    TextInput::make('centroid_lng')
                        ->label('Centroid Longitude')
                        ->numeric()
                        ->required()
                        ->minValue(-180)
                        ->maxValue(180)
                        ->step(0.0000001)
                        ->inputMode('decimal'),
                ])->columns(2),
                
            Repeater::make('boundary_coordinates')
                ->label('Boundary Coordinates')
                ->schema([
                    TextInput::make('lat')
                        ->label('Latitude')
                        ->numeric()
                        ->required()
                        ->minValue(-90)
                        ->maxValue(90)
                        ->step(0.0000001)
                        ->inputMode('decimal'),
                        
                    TextInput::make('lng')
                        ->label('Longitude')
                        ->numeric()
                        ->required()
                        ->minValue(-180)
                        ->maxValue(180)
                        ->step(0.0000001)
                        ->inputMode('decimal'),
                ])
                ->defaultItems(4)
                ->minItems(3)
                ->columnSpanFull()
                ->grid(2),
                ]),
                
            Section::make('Property Details')
            ->collapsible()
                ->schema([
                    TextInput::make('area')
                        ->numeric()
                        ->required()
                        ->suffix('sq. meters')
                        ->inputMode('decimal'),
                        
                    Select::make('land_use_type')
                        ->options([
                            'residential' => 'Residential',
                            'commercial' => 'Commercial',
                            'agricultural' => 'Agricultural',
                            'industrial' => 'Industrial',
                            'mixed_use' => 'Mixed Use',
                        ])
                        ->required(),
                        
                    Select::make('zoning')
                        ->options([
                            'R1' => 'Residential (R1)',
                            'R2' => 'Residential (R2)',
                            'C1' => 'Commercial (C1)',
                            'A1' => 'Agricultural (A1)',
                            'I1' => 'Industrial (I1)',
                        ])
                        ->required(),
                        
                    TextInput::make('survey_plan_number')
                        ->nullable()
                        ->maxLength(100),
                        
                    Textarea::make('boundary_description')
                        ->nullable()
                        ->columnSpanFull(),
                ])->columns(2),
        ]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('parcel_id'),
                TextColumn::make('street'),
                TextColumn::make('city'),
                TextColumn::make('postal_code'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'view' => Pages\ViewProperty::route('/{record}'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\OwnersRelationManager::class,
            RelationManagers\DocumentsRelationManager::class,
            RelationManagers\LegalEncumbrancesRelationManager::class,
            RelationManagers\TransactionsRelationManager::class,
            RelationManagers\TaxRecordsRelationManager::class,
            RelationManagers\SurveysRelationManager::class,
            RelationManagers\PermitsRelationManager::class,
            RelationManagers\DisputesRelationManager::class,
        ];
    }


}
