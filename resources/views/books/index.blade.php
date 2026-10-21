@extends('layouts.app')

@section('title', 'Book Recommendations')

@section('content')

    <h2 class="mb-3">List of Recommendations</h2>
    <p class="text-muted">
    Total books: <strong>{{ $books->count() }}</strong>
</p>
<a href="{{ route('books.create') }}" class="btn btn-sm btn-secondary">Add Book</a>
    <div class="mb-3">
        @if (!$genre && !$year)
            <span class="badge bg-secondary">Showing all books</span>
        @else
            <span class="badge bg-primary">
                {{ $genre ? "genre id {$genre}" : 'any genre' }},
                {{ $year ? "year {$year}" : 'any year' }}
            </span>
            <a href="{{ route('books.index') }}" class="btn btn-sm btn-outline-secondary ms-2">Clear Filter</a>
        @endif
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Genre</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                   <td>
    <a href="{{ route('books.index', array_filter(['genre' => $book->genre_id, 'year' => $year])) }}">
        {{ $book->genre->name }}
    </a>
</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>
                        {{ $book->year }}
                        @if ($book->year >= 2000)
                            <span class="badge bg-primary">Classic</span>
                        @else
                            <span class="badge bg-primary">Oldies</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('books.index', array_filter(['genre' => $book->genre_id, 'year' => $year])) }}">
                            {{ $book->genre->name }}
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No Books Available</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection