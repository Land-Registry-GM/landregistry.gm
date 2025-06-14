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
use App\Models\Setting;

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
                                
                            TextInput::make('postal_code')
                                ->required()
                                ->maxLength(20),
                                
                            Select::make('region_id')
                                ->label('Region')
                                ->options(
                                    Setting::where('type', 'region')
                                        ->orderBy('sort_order')
                                        ->pluck('name', 'id')
                                )
                                ->required()
                                ->searchable()
                                ->preload()
                                ->reactive(),

                            Select::make('district_id')
                                ->label('District')
                                ->options(function (callable $get) {
                                    $regionId = $get('region_id');
                                    if (!$regionId) {
                                        return [];
                                    }
                                    return Setting::where('type', 'district')
                                        ->where('parent_id', $regionId)
                                        ->orderBy('sort_order')
                                        ->pluck('name', 'id');
                                })
                                ->required()
                                ->searchable()
                                ->preload()
                                ->reactive(),

                            Select::make('ownership_type_id')  // Changed to _id to match relation convention
                                ->label('Ownership Type')
                                ->options(
                                    Setting::where('type', 'ownership_type')
                                        ->orderBy('sort_order')
                                        ->pluck('name', 'id')
                                )
                                ->required()
                                ->default(
                                    fn () => Setting::where('type', 'land_use')
                                        ->where('name', 'Freehold')
                                        ->first()?->id
                                )
                                ->searchable()  // Added for better UX with many options
                                ->preload()     // Loads options immediately
                            ]),

                            
                        
                    
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
                        
                    Select::make('land_use_type_id')
                        ->label('Land Use Type')
                        ->options(
                            Setting::where('type', 'land_use')
                                ->orderBy('sort_order')
                                ->pluck('name', 'id')
                        )
                        ->required()
                        ->searchable()
                        ->preload(),

                    Select::make('zoning_id')  // Changed to _id to match relation convention
                        ->label('Zoning')
                        ->options(
                            Setting::where('type', 'zoning')
                                ->orderBy('sort_order')
                                ->pluck('name', 'id')
                        )
                        ->required()
                        ->searchable()
                        ->preload(),
                        
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
