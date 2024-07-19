<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;

class BookCarousel extends Component
{
    public $books;
    public $currentIndex = 0;
    public $autoTransitionInterval = 5000; // 5 seconds

    public function mount()
    {
        $this->books = Book::all();
        $this->startAutoTransition();
    }

    public function startAutoTransition()
    {
        $this->dispatchBrowserEvent('start-auto-transition', [
            'interval' => $this->autoTransitionInterval,
        ]);
    }

    public function nextBook()
    {
        $this->currentIndex = ($this->currentIndex + 1) % count($this->books);
        $this->startAutoTransition();
    }

    public function prevBook()
    {
        $this->currentIndex = ($this->currentIndex - 1 + count($this->books)) % count($this->books);
        $this->startAutoTransition();
    }

    public function render()
    {
        return view('livewire.book-carousel');
    }
}