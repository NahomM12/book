@extends('backend.layouts.backend')
@section('title','index')
@section('content')

    
    <a href="{{ route('books.create') }}">Create New Book</a>
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Search Books</h1>
    <livewire:search-book/>
</div>
    @include('backend.layouts.table')

    @if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
    @endif
@endsection


<!--<x-layout>
<head>
    <title>Books</title>
</head>

    <h1>Books</h1>
    <a href="{{ route('books.create') }}">Create New Book</a>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Published Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->published_year }}</td>
                <td>
                    <a href="{{ route('books.show', $book->id) }}">View</a>
                    <a href="{{ route('books.edit', $book->id) }}">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@if(session('success'))
<div style="color: green;">
    {{session('success')}}
</div>
@endif
</x-layout>-->