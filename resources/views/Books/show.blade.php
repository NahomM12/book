@extends('backend.layouts.backend')

@section('content')
<x-layout>
    <h1>{{ $book->title }}</h1>
    <p><strong>Author:</strong> {{ $book->author }}</p>
    <p><strong>Published Year:</strong> {{ $book->published_year }}</p>
    <p><strong>Description:</strong> {{ $book->description }}</p>
    <a href="{{ route('books.index') }}">Back to Books</a>

</x-layout>
@endsection