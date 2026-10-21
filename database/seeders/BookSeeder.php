<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'Noli Me Tangere',
            'author' => 'Jose Rizal',
            'copies' => 4,
            'is_available' => true,
            'isbn' => null,
        ]);
        Book::create([
    'title' => 'El Filibusterismo',
    'author' => 'Jose Rizal',
    'copies' => 3,
    'is_available' => true,
    'isbn' => '9789710800001',
]);

    Book::create([
        'title' => 'Ibong Adarna',
        'author' => 'Anonymous',
        'copies' => 2,
        'is_available' => false,
        'isbn' => null,
    ]);

    Book::create([
        'title' => 'Florante at Laura',
        'author' => 'Francisco Balagtas',
        'copies' => 5,
        'is_available' => true,
        'isbn' => null,
    ]);

    Book::create([
        'title' => 'Dekada 70',
        'author' => 'Lualhati Bautista',
        'copies' => 1,
        'is_available' => true,
        'isbn' => '9789710800002',
    ]);
        
    }
}