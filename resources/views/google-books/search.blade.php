@extends('backend.layouts.backend')
@section('title', 'Google Books Search')
@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Google Books Search</h1>
    
    <form action="{{ route('google-books.search') }}" method="GET" class="mb-4">
        <input type="text" name="query" value="{{ $query ?? '' }}" placeholder="Search for books..." class="px-2 py-1 border rounded-l-md">
        <button type="submit" class="px-3 py-1 bg-blue-500 text-white rounded-r-md">Search</button>
    </form>

    @if(isset($results['items']))
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($results['items'] as $book)
                <div class="border p-4 rounded-md">
                    <h2 class="text-xl font-bold">{{ $book['volumeInfo']['title'] ?? 'N/A' }}</h2>
                    <p>Author(s): {{ implode(', ', $book['volumeInfo']['authors'] ?? ['N/A']) }}</p>
                    <p>Published: {{ $book['volumeInfo']['publishedDate'] ?? 'N/A' }}</p>
                    @if($book['downloadLink'])
                        <a href="{{ $book['downloadLink'] }}" class="mt-2 inline-block px-4 py-2 bg-green-500 text-white rounded-md" target="_blank">Download</a>
                    @else
                        <p class="mt-2 text-gray-500">No download available</p>
                    @endif
                </div>
            @endforeach
        </div>
    @elseif($query)
        <p>No results found.</p>
    @endif
</div>
@endsection