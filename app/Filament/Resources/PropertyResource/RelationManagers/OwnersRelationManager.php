<?php

namespace App\Filament\Resources\PropertyResource\RelationManagers;

use App\Models\Owner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class OwnersRelationManager extends RelationManager
{
    protected static string $relationship = 'owners';
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('owner_name')
                    ->required()
                    ->maxLength(255),
                    
                Forms\Components\Select::make('owner_id_type')
                    ->options([
                        'National ID' => 'National ID',
                        'Passport' => 'Passport',
                        'Driver License' => 'Driver License',
                    ])
                    ->required(),
                    
                Forms\Components\TextInput::make('owner_id_number')
                    ->required()
                    ->maxLength(100),
                    
                Forms\Components\DatePicker::make('dob')
                    ->label('Date of Birth')
                    ->required()
                    ->maxDate(now()->subYears(18))
                    ->displayFormat('d/m/Y')
                    ->native(false),
                    
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required(),
                    
                Forms\Components\TextInput::make('email')
                    ->email(),
                    
                Forms\Components\Textarea::make('address')
                    ->columnSpanFull(),
            ]);
    }

   public function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('owner_name')->searchable(),
            Tables\Columns\TextColumn::make('owner_id_type')->label('ID Type'),
            Tables\Columns\TextColumn::make('dob')->label('Date of Birth')->date(),
            Tables\Columns\TextColumn::make('phone'),
            // Tables\Columns\TextColumn::make('property.ownership_type')->label('Ownership Type'),
            Tables\Columns\IconColumn::make('pivot.is_current_owner')->label('Current Owner')->boolean(),
            Tables\Columns\TextColumn::make('pivot.acquisition_date')->label('Acquisition Date')->date(),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('current_owners')
                ->label('Owner Status')
                ->options([
                    '1' => 'Current Owners',
                    '0' => 'Previous Owners',
                ])
                ->query(function (Builder $query, array $data) {
                    if ($data['value'] !== null) {
                        $query->where('property_owner.is_current_owner', $data['value']);
                    }
                }),
        ])
        ->headerActions([
            Tables\Actions\CreateAction::make()
                ->using(function (array $data) {
                    $owner = Owner::create($data);
                    
                    $this->getOwnerRecord()->owners()->attach($owner->id, [
                        'acquisition_date' => now(),
                        'is_current_owner' => true
                    ]);
                    
                    return $owner;
                }),
                
            Tables\Actions\AttachAction::make()
                ->form([
                    Forms\Components\Select::make('recordId')  // Changed from getRecordSelect()
                        ->label('Owner')
                        ->required()
                        ->searchable()
                        ->getSearchResultsUsing(fn (string $search) => 
                            Owner::where('owner_name', 'like', "%{$search}%")
                                ->limit(50)
                                ->pluck('owner_name', 'id')),
                    
                    Forms\Components\DatePicker::make('acquisition_date')
                        ->required()
                        ->default(now()),
                        
                    Forms\Components\Toggle::make('is_current_owner')
                        ->default(true),
                ])
                ->action(function (array $data): void {
                    $this->getOwnerRecord()->owners()->attach(
                        $data['recordId'],
                        [
                            'acquisition_date' => $data['acquisition_date'],
                            'is_current_owner' => $data['is_current_owner']
                        ]
                    );
                })
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DetachAction::make(),
            // Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            // Tables\Actions\DetachBulkAction::make(),
            // Tables\Actions\DeleteBulkAction::make(),
        ]);
}
}