<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;

class SearchBook extends Component
{
    public $search = '';
    public $results = [];

    public function render()
    {
        return view('livewire.search-book');
    }

    public function searchBooks()
    {
        $this->results = Book::where('title', 'like', '%' . $this->search . '%')
                             ->orderBy('title')
                             ->get();
    }
}