<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Genre;

class BookController extends Controller
{
    public function index(Request $request)
    {
        // TEMPORARY (Part F): tanggalin pagkatapos ng screenshot 7
        DB::enableQueryLog();

        $genre = $request->query('genre');   // genre ID na
        $year  = $request->query('year');

        
        $query = Book::with('genre');

        if ($genre) {
            $query = $query->where('genre_id', $genre);
        }

        if ($year) {
            $query = $query->where('year', $year);
        }

        $books = $query->get();

        return view('books.index', [
            'books' => $books,
            'genre' => $genre,
            'year'  => $year,
        ]);
    }

    public function create()
    {
        return view('books.create', [
            'genres' => Genre::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'    => 'required|string|max:255',
            'author'   => 'required|string|max:255',
            'year'     => 'required|numeric|digits:4',
            'genre_id' => 'required|exists:genres,id',
        ]);

      Book::create($validated + ['is_featured' => false]);

$total = Book::count();

return redirect()->route('books.index')
    ->with('success', "Book added successfully. You now have {$total} books.");
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('books.show', ['book' => $book]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function feature()
    {
        return view('books.feature', ['book' => Book::findOrFail(1)]);
    }

    public function redirectOldFilter(?string $genre = null)
    {
        return redirect()->route('books.index', $genre ? ['genre' => $genre] : []);
    }
}