@extends('layouts.app')

@section('title', $book['title'])

@section('content')

    <h2 class="mb-3">Book Details</h2>

    <div class="card mb-3 shadow-sm" style="max-width: 420px;">
        <div class="card-header bg-primary text-white">
            {{ $book['title'] }}
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <span class="badge bg-info text-dark me-1">Genre</span> {{ $book['genre'] }}
            </li>
            <li class="list-group-item">
                <span class="badge bg-secondary me-1">Author</span> {{ $book['author'] }}
            </li>
            <li class="list-group-item">
                <span class="badge bg-secondary me-1">Year</span> {{ $book['year'] }}
            </li>
        </ul>
    </div>

    <a href="{{ route('books.index') }}" class="btn btn-secondary">← Back to List</a>

@endsection