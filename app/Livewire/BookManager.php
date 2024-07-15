<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class BookManager extends Component
{
    use WithFileUploads;

    #[Validate] 
    
    public $title, $author, $description, $published_year, $book_file;
  
    public function rules()
    {
        return [
        'title' => 'required|min:3',
        'author' => 'required',
        'description' => 'required',
        'published_year' => 'required|numeric',
        'book_file' => 'required|mimes:pdf|max:10240', // max 10MB
        ];
    }
 
    
    public function render()
    {
        return view('livewire.book-manager', [
            'books' => Book::all()
        ]);
    }

    public function createBook()
    {
        $validated = $this->validate();

        $file_path = $this->book_file->store('book_files', 'public');

        Book::create([
            $validated,
            'title' => $this->title,
            'author' => $this->author,
            'description' => $this->description,
            'published_year' => $this->published_year,
            'file_path' => $file_path,
        ]);

        $this->reset(['title', 'author', 'description', 'published_year', 'book_file']);
    }
}