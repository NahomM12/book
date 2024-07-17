<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Services\GoogleBooksService;
use Illuminate\Http\Request;

class GoogleBooksController extends Controller
{
    protected $googleBooksService;

    public function __construct(GoogleBooksService $googleBooksService)
    {
        $this->googleBooksService = $googleBooksService;
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = [];
        
        if ($query) {
            $results = $this->googleBooksService->searchBooks($query);
            
            // Process results to include download link if available
            if (isset($results['items'])) {
                foreach ($results['items'] as &$book) {
                    $book['downloadLink'] = $this->getDownloadLink($book);
                }
            }
        }
    
        return view('google-books.search', compact('results', 'query'));
    }
    
    private function getDownloadLink($book)
    {
        // Check if the book has a downloadable format
        if (isset($book['accessInfo']['epub']['isAvailable']) && $book['accessInfo']['epub']['isAvailable']) {
            return $book['accessInfo']['epub']['acsTokenLink'] ?? null;
        }
        if (isset($book['accessInfo']['pdf']['isAvailable']) && $book['accessInfo']['pdf']['isAvailable']) {
            return $book['accessInfo']['pdf']['acsTokenLink'] ?? null;
        }
        return null;
    }
}