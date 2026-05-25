<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Models\About;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-user';

    protected static string | \UnitEnum | null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                RichEditor::make('bio')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('profile_image')
                    ->image()
                    ->directory('about'),
                TextInput::make('years_of_experience')
                    ->numeric()
                    ->required()
                    ->minValue(0)
                    ->maxValue(50),
                TextInput::make('location')
                    ->maxLength(255),
                Select::make('availability_status')
                    ->options([
                        'available' => 'Available',
                        'busy' => 'Busy',
                        'unavailable' => 'Unavailable',
                    ])
                    ->default('available')
                    ->required(),
                FileUpload::make('resume_pdf')
                    ->label('Resume PDF')
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory('resumes'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('profile_image')->circular(),
                TextColumn::make('location'),
                TextColumn::make('years_of_experience')->suffix(' years'),
                TextColumn::make('availability_status')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'available' => 'success',
                        'busy' => 'warning',
                        'unavailable' => 'danger',
                    }),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}
