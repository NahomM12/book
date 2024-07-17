@extends('backend.layouts.backend')
@section('title','index')
@section('content')

<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Books</h1>
    <a href="{{ route('books.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Create New Book</a>
    <a href="{{ route('api.google-books.search') }}">Search Google Books</a>   
    <livewire:search-book/>
</div>

@if(session('success'))
<div style="color: green;">
    {{ session('success') }}
</div>
@endif
@endsection