@extends('backend.layouts.backend')
@section('title','add book')
@section('content')
    <h1>Create New Book</h1>
    @if ($errors->any())
        <div class="mb-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif
    <livewire:book-manager/>
@endsection
