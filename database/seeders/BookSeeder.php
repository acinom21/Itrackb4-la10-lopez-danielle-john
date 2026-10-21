<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $classical  = Genre::create(['name' => 'Classical']);
        $mystery    = Genre::create(['name' => 'Mystery']);
        $historical = Genre::create(['name' => 'Historical']);

        Book::create(['title' => 'MMK', 'author' => 'charo santos', 'year' => 1950, 'genre_id' => $classical->id, 'is_featured' => true, 'description' => null]);
        Book::create(['title' => 'Spiderman', 'author' => 'Lhorenz', 'year' => 2011, 'genre_id' => $mystery->id, 'is_featured' => false, 'description' => null]);
        Book::create(['title' => 'The Return of the King', 'author' => 'Khaliq', 'year' => 1954, 'genre_id' => $historical->id, 'is_featured' => true, 'description' => null]);
        Book::create(['title' => 'World of Warcraft', 'author' => 'Lenard', 'year' => 2000, 'genre_id' => $historical->id, 'is_featured' => false, 'description' => null]);
        Book::create(['title' => 'The Hobbit', 'author' => 'Justin', 'year' => 1954, 'genre_id' => $classical->id, 'is_featured' => false, 'description' => null]);
        Book::create(['title' => 'The World of Computers', 'author' => 'Mikko', 'year' => 2010, 'genre_id' => $mystery->id, 'is_featured' => false, 'description' => null]);
        Book::create(['title' => 'Programmer', 'author' => 'Lhorenz', 'year' => 1978, 'genre_id' => $historical->id, 'is_featured' => false, 'description' => null]);
        Book::create(['title' => 'magpakailan man', 'author' => 'jessica sojo', 'year' => 2014, 'genre_id' => $classical->id, 'is_featured' => false, 'description' => null]);
    }
}
