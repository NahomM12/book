<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;

class SearchBook extends Component
{
    public $search = '';
    public $books = [];

    public function mount()
    {
        $this->books = Book::all();
    }

    public function render()
    {
        return view('livewire.search-book');
    }

    public function updatedSearch()
    {
        if (empty($this->search)) {
            $this->books = Book::all();
        } else {
            $this->books = Book::where('title', 'like', '%' . $this->search . '%')
                                ->orWhere('author', 'like', '%' . $this->search . '%')
                                ->orderBy('title')
                                ->get();
        }
    }
}