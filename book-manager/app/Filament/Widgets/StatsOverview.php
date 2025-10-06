<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getCards(): array
    {
        return [
            Stat::make('Total Books', Book::count()),
            Stat::make('Total Categories', Category::count()),
        ];
    }
}
