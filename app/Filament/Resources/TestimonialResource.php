<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

/**
 * TestimonialResource
 *
 * Manages client testimonials. Each testimonial includes the client's name,
 * position, comments in Portuguese and English, and an optional image.
 */
class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Site';
    protected static ?int $navigationSort = 5;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('position')
                    ->label('Cargo/Empresa')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\Textarea::make('comment_pt')
                    ->label('Comentário (PT)')
                    ->required()
                    ->rows(4),
                Forms\Components\Textarea::make('comment_en')
                    ->label('Comment (EN)')
                    ->required()
                    ->rows(4),
                Forms\Components\FileUpload::make('image')
                    ->label('Foto')
                    ->image()
                    ->directory('testimonials')
                    ->nullable(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name')->label('Nome')->sortable(),
                Tables\Columns\TextColumn::make('position')->label('Cargo'),
                Tables\Columns\TextColumn::make('comment_pt')->label('Comentário (PT)')->limit(50),
                Tables\Columns\TextColumn::make('comment_en')->label('Comment (EN)')->limit(50),
                Tables\Columns\ImageColumn::make('image')->disk('public')->directory('testimonials')->label('Foto'),
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
            'index' => Pages\ManageTestimonials::route('/'),
        ];
    }
}