<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/books/feature', [BookController::class, 'feature'])
    ->name('books.feature');

// C1: kept so old bookmarks to /books/filter/{genre} don't 404.
Route::get('/books/filter/{genre?}', [BookController::class, 'redirectOldFilter'])
    ->name('books.filter');

// Must come BEFORE the resource route, or /books/{book} (show) intercepts it
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');

Route::resource('books', BookController::class)
    ->only(['index', 'show']);

Route::get('/teachers/featured', [TeacherController::class, 'featured'])
     ->name('teachers.featured');

Route::resource('teachers', TeacherController::class)
     ->only(['index', 'show']);