<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Filament\Tables\Columns\TextColumn;

class RecentBooks extends TableWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(Book::latest()->take(5))
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('category.name')->label('Category'),
                TextColumn::make('created_at')->dateTime(),
            ]);
    }
}
