<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('Books.index', compact('books'));
    }

    public function create()
    {
        return view('Books.create');
    }
    
    public function show(Book $book)
    {
        return view('Books.show', compact('book'));
    }
    public function download(Book $book)
    {
        if(!Storage::disk('public')->exists($book->file_path)){
            abort(404);
        }
        return Storage::disk('public')->download($book->file_path, $book->title . '.pdf');
    }
    public function store(BookRequest $request)
    {
        Book::create($request->validated());
        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success','book deleted successfully');
    }
    public function edit(Book $book)
{
    return view('Books.edit', compact('book'));
}

public function update(BookRequest $request, Book $book)
{
    $book->update($request->validated());
    return redirect()->route('books.index')->with('success', 'Book updated successfully.');
}


}