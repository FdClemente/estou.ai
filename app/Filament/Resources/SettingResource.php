<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Resources\Pages\ManageRecords;
use Filament\Tables;

/**
 * SettingResource
 *
 * Exposes a Filament interface for editing global configuration such as the
 * tagline. Only one row is expected but additional rows are not prohibited.
 */
class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'Site';
    protected static ?int $navigationSort = 1;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tagline_pt')
                    ->label('Tagline (PT)')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tagline_en')
                    ->label('Tagline (EN)')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('tagline_pt')->label('Tagline (PT)')->limit(50)->sortable(),
                Tables\Columns\TextColumn::make('tagline_en')->label('Tagline (EN)')->limit(50)->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->label('Updated'),
            ])
            ->filters([
                // no filters needed
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
            'index' => Pages\ManageSettings::route('/'),
        ];
    }
}