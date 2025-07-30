<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BiographyResource\Pages;
use App\Models\Biography;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

/**
 * BiographyResource
 *
 * Allows administrators to manage the biography in both languages. Generally
 * there will be a single record but additional rows are permitted. The
 * biography content is stored as text areas to accommodate multi‑paragraph
 * content.
 */
class BiographyResource extends Resource
{
    protected static ?string $model = Biography::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationGroup = 'Site';
    protected static ?int $navigationSort = 2;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('biography_pt')
                    ->label('Biografia (PT)')
                    ->required()
                    ->rows(8),
                Forms\Components\Textarea::make('biography_en')
                    ->label('Biography (EN)')
                    ->required()
                    ->rows(8),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('biography_pt')->label('Biografia (PT)')->limit(50),
                Tables\Columns\TextColumn::make('biography_en')->label('Biography (EN)')->limit(50),
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
            'index' => Pages\ManageBiographies::route('/'),
        ];
    }
}