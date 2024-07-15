@extends('backend.layouts.backend')

@section('content')
<x-layout>
   <head>
    <title>Edit {{ $book->title }}</title>
   </head>

    <h1>Edit Book</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" required>
        </div>
        <div>
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description">{{ old('description', $book->description) }}</textarea>
        </div>
        <div>
            <label for="published_year">Published Year:</label>
            <input type="number" id="published_year" name="published_year" value="{{ old('published_year', $book->published_year) }}" required>
        </div>
        <button type="submit">Update Book</button>
    </form>
    <a href="{{ route('books.index') }}">Back to Books</a>
</x-layout>
@endsection