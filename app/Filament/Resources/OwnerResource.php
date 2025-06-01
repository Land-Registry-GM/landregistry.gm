<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use App\Filament\Resources\OwnerResource\Pages;
use App\Filament\Resources\OwnerResource\RelationManagers;
use App\Models\Owner;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;

class OwnerResource extends Resource
{
    protected static ?string $model = Owner::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Owner Information')
                    ->schema([
                        Forms\Components\TextInput::make('owner_name')
                            ->required()
                            ->maxLength(255),
                            
                        Forms\Components\Select::make('owner_id_type')
                            ->options([
                                'National ID' => 'National ID',
                                'Passport' => 'Passport',
                                'Driver License' => 'Driver License',
                                'Voter ID' => 'Voter ID',
                            ])
                            ->required()
                            ->native(false),
                            
                        Forms\Components\TextInput::make('owner_id_number')
                            ->required()
                            ->maxLength(100),
                            
                        Forms\Components\DatePicker::make('dob')
                            ->label('Date of Birth')
                            ->maxDate(now())
                            ->native(false),
                    ])->columns(2),
                    
                Forms\Components\Section::make('Contact Information')
                    ->schema([
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->required(),
                            
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(255),
                            
                        Forms\Components\Textarea::make('address')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('owner_name')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('owner_id_type')
                    ->label('ID Type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'National ID' => 'primary',
                        'Passport' => 'success',
                        default => 'gray',
                    }),
                    
                TextColumn::make('dob')
                    ->label('Date of Birth')
                    ->date()
                    ->sortable(),
                    
                TextColumn::make('phone')
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('owner_id_type')
                    ->options([
                        'National ID' => 'National ID',
                        'Passport' => 'Passport',
                        'Driver License' => 'Driver License',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('owner_name');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\PropertiesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOwners::route('/'),
            'create' => Pages\CreateOwner::route('/create'),
            'edit' => Pages\EditOwner::route('/{record}/edit'),
            // 'view' => Pages\ViewOwner::route('/{record}'),
        ];
    }
}