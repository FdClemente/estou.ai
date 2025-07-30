<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkillResource\Pages;
use App\Models\Skill;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

/**
 * SkillResource
 *
 * Manages the list of skills or technologies. Each skill has names and
 * descriptions in both languages and an optional icon. Icons can be defined
 * using CSS classes (e.g. heroicons or font-awesome) or by uploading an
 * image through other means and referencing its path.
 */
class SkillResource extends Resource
{
    protected static ?string $model = Skill::class;
    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';
    protected static ?string $navigationGroup = 'Site';
    protected static ?int $navigationSort = 3;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name_pt')
                    ->label('Nome (PT)')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name_en')
                    ->label('Name (EN)')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description_pt')
                    ->label('Descrição (PT)')
                    ->rows(3),
                Forms\Components\Textarea::make('description_en')
                    ->label('Description (EN)')
                    ->rows(3),
                Forms\Components\TextInput::make('icon')
                    ->label('Ícone (CSS class)')
                    ->helperText('Opcional: classe CSS para o ícone, ex: fa fa-code')
                    ->maxLength(255),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name_pt')->label('Nome (PT)')->sortable(),
                Tables\Columns\TextColumn::make('name_en')->label('Name (EN)')->sortable(),
                Tables\Columns\TextColumn::make('icon')->label('Icon'),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->label('Updated'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkDeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSkills::route('/'),
        ];
    }
}