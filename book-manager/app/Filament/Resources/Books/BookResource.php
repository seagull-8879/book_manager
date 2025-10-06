<?php

namespace App\Filament\Resources\Books;

use App\Filament\Resources\Books\Pages;
use App\Models\Book;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;
    

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\TextInput::make('title')->required(),
            Forms\Components\Select::make('category_id')
                ->relationship('category', 'name')
                ->required(),
            Forms\Components\DatePicker::make('published_date')
                ->label('Published Date'),
            Forms\Components\FileUpload::make('cover_image')
                ->label('cover_image')
                ->directory('book-covers')
                ->image(),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('title'),
            Tables\Columns\TextColumn::make('category.name')->label('Category'),
            Tables\Columns\TextColumn::make('published_date')->date()->label('Published Date'),
            Tables\Columns\TextColumn::make('category.name')->label('Category')->sortable(),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('category')
                ->relationship('category', 'name'),
            Tables\Filters\Filter::make('recent')
                ->label('Recently Published')
                ->query(fn ($query) => $query->where('publish_date', '>=', now()->subYear())),
        ])
        ->defaultSort('publish_date', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}