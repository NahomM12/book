@extends('backend.layouts.backend')
@section('title','add book')
@section('content')

<x-layout>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create Book</title>
</head>

    <h1>Create New Book</h1>
    
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>
        <div>
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="{{ old('author') }}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </div>
        <div>
            <label for="published_year">Published Year:</label>
            <input type="number" id="published_year" name="published_year" value="{{ old('published_year') }}" required>
        </div>
        <button type="submit">Create Book</button>
    </form>
</x-layout>
@endsection