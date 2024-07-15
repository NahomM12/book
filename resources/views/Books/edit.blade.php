@extends('backend.layouts.backend')
@section('title','update')
@section('content')

     <h1>Books</h1>
    <a href="{{ route('books.create') }}">Create New Book</a>

    @include('backend.layouts.formstyle')

   
@endsection
