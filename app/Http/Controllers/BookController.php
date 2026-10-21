<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $genre = $request->query('genre', '');
        $year  = $request->query('year', '');

        $all = Book::all();

        $books = $all
            ->when($genre !== '', fn ($list) => $list->where('genre', $genre))
            ->when($year !== '', fn ($list) => $list->where('year', $year))
            ->values();

        return view('books.index', [
            'books'  => $books,
            'genre'  => $genre,
            'year'   => $year,
            'genres' => $all->pluck('genre')->unique()->sort()->values(),
            'years'  => $all->pluck('year')->unique()->sort()->values(),
        ]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|numeric|digits:4',
            'genre' => 'required|in:Classical,Mystery,Historical',
        ]);

        Book::create($validated + ['is_featured' => false]);

        return redirect()->route('books.index')->with('success', 'Book added successfully.');
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