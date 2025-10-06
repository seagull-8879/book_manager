<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fiction = Category::where('name', 'Fiction')->first();
        $nonFiction = Category::where('name', 'Non-Fiction')->first();
        $science = Category::where('name', 'Science')->first();
        $history = Category::where('name', 'History')->first();
        $biography = Category::where('name', 'Biography')->first();
        $fantasy = Category::where('name', 'Fantasy')->first();

        Book::create(['title' => 'To Kill a Mockingbird', 'category_id' => $fiction->id]);
        Book::create(['title' => '1984', 'category_id' => $nonFiction->id]);
        Book::create(['title'=> 'The Great Gatsby',  'category_id' => $history->id]);
        Book::create(['title'=> 'The Hobbit',  'category_id' => $fantasy->id]);
        Book::create(['title'=> 'The Science Book',  'category_id' => $science->id]);
        Book::create(['title'=> 'Steve Jobs',  'category_id' => $biography->id]);

    }
}
