@extends('layouts.app')

@section('title', 'Book Recommendations')

@section('content')
<table class="table table-striped table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th>Genre</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($books as $book)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $book['title'] }}</td>
                <td>{{ $book['author'] }}</td>
                <td>
                    {{ $book['year'] }}
                    @if ($book['year'] >= 2000)
                        <span class="badge bg-primary">Classic</span>
                    @else
                        <span class="badge bg-secondary">Oldies</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('books.index', array_filter(['genre' => $book['genre'], 'year' => $year])) }}"
                       class="badge bg-info text-dark text-decoration-none">
                        {{ $book['genre'] }}
                    </a>
                </td>
                <td>
                    <a href="{{ route('books.show', ['book' => $book['id']]) }}" class="btn btn-sm btn-outline-primary">
                        View
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-muted py-4">No Books Available</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection