@extends('backend.layouts.backend')

@section('content')
<x-layout>
    <h1>{{ $book->title }}</h1>
    <p><strong>Author:</strong> {{ $book->author }}</p>
    <p><strong>Published Year:</strong> {{ $book->published_year }}</p>
    <p><strong>Description:</strong> {{ $book->description }}</p>
    <div class="flex justify-end mt-4">
        @if($book->file_path)
        <a href="{{ route('books.download', $book) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
            Download Book
        </a>
        @endif
        <a href="{{ route('books.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Back to Books
        </a>
    </div>
</x-layout>
@endsection