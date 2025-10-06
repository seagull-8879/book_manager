<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

// --------- BOOKS CRUD ---------
Route::get('/books', fn() => Book::with('category')->get());

Route::get('/books/{id}', function($id) {
    return Book::with('category')->find($id);
});

Route::post('/books', function(Request $request) {
    return Book::create([
        'title' => $request->title,
        'category_id' => $request->category_id
    ]);
});

Route::put('/books/{id}', function(Request $request, $id) {
    $b = Book::find($id);
    $b->title = $request->title;
    $b->category_id = $request->category_id;
    $b->save();
    return $b;
});

Route::delete('/books/{id}', function($id) {
    return Book::destroy($id);
});

// --------- CATEGORIES CRUD ---------
Route::get('/categories', fn() => Category::all());

Route::get('/categories/{id}', function($id) {
    return Category::find($id);
});

Route::post('/categories', function(Request $request) {
    return Category::create([
        'name' => $request->name
    ]);
});

Route::put('/categories/{id}', function(Request $request, $id) {
    $c = Category::find($id);
    $c->name = $request->name;
    $c->save();
    return $c;
});

Route::delete('/categories/{id}', function($id) {
    return Category::destroy($id);
});

// --------- SIMPLE HOME PAGE ---------
Route::get('/', function() {
    return "Welcome to Books & Categories API!";
});