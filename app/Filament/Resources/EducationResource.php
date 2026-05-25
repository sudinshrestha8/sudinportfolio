<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EducationResource\Pages;
use App\Models\Education;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EducationResource extends Resource
{
    protected static ?string $model = Education::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-academic-cap';

    protected static string | \UnitEnum | null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 6;

    protected static ?string $pluralModelLabel = 'Education';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('institution')
                    ->required()
                    ->maxLength(255),
                TextInput::make('degree')
                    ->required()
                    ->maxLength(255),
                TextInput::make('field')
                    ->required()
                    ->maxLength(255),
                TextInput::make('start_year')
                    ->numeric()
                    ->required()
                    ->minValue(1950)
                    ->maxValue(2030),
                TextInput::make('end_year')
                    ->numeric()
                    ->minValue(1950)
                    ->maxValue(2030)
                    ->placeholder('Present'),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('institution')->searchable()->sortable(),
                TextColumn::make('degree'),
                TextColumn::make('field'),
                TextColumn::make('start_year')->sortable(),
                TextColumn::make('end_year')->placeholder('Present'),
            ])
            ->defaultSort('start_year', 'desc')
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEducation::route('/'),
            'create' => Pages\CreateEducation::route('/create'),
            'edit' => Pages\EditEducation::route('/{record}/edit'),
        ];
    }
}
