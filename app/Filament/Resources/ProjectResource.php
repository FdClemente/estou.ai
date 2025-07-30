<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;

/**
 * ProjectResource
 *
 * Manages portfolio projects. Each project includes titles, descriptions,
 * dates, technologies, an image and an optional external link. The slug
 * ensures unique identifiers for potential detail pages.
 */
class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Site';
    protected static ?int $navigationSort = 4;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title_pt')
                    ->label('Título (PT)')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title_en')
                    ->label('Title (EN)')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->columnSpanFull()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Forms\Components\Textarea::make('description_pt')
                    ->label('Descrição (PT)')
                    ->required()
                    ->rows(5),
                Forms\Components\Textarea::make('description_en')
                    ->label('Description (EN)')
                    ->required()
                    ->rows(5),
                Forms\Components\DatePicker::make('date')
                    ->label('Data')
                    ->nullable(),
                Forms\Components\TextInput::make('technologies')
                    ->label('Tecnologias')
                    ->helperText('Lista separada por vírgulas das tecnologias utilizadas')
                    ->nullable(),
                Forms\Components\SpatieMediaLibraryFileUpload::make('image'),

                Forms\Components\TextInput::make('link')
                    ->label('Link')
                    ->url()
                    ->nullable(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('title_pt')->label('Título (PT)')->sortable(),
                Tables\Columns\TextColumn::make('title_en')->label('Title (EN)')->sortable(),
                Tables\Columns\SpatieMediaLibraryImageColumn::make('image'),
                Tables\Columns\TextColumn::make('date')->date()->label('Data')->sortable(),
                Tables\Columns\TextColumn::make('technologies')->label('Tecnologias')->limit(30),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->label('Updated'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageProjects::route('/'),
        ];
    }
}
