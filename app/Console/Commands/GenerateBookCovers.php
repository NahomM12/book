<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Book;
use Spatie\PdfToImage\Pdf;
use Exception;

class GenerateBookCovers extends Command
{
    protected $signature = 'books:generate-covers';
    protected $description = 'Generate cover images for books from PDF files';

    public function handle()
    {
        $books = Book::whereNull('cover_path')->get();

        foreach ($books as $book) {
            $this->info("Generating cover for book: {$book->title}");

            try {
                $pdfPath = storage_path('app/public/' . $book->file_path);
                $coverPath = 'covers/' . $book->id . '_cover.jpg';
                $fullCoverPath = storage_path('app/public/' . $coverPath);

                $pdf = new Pdf($pdfPath);
                $pdf->setPage(1)
                    ->setOutputFormat('jpg')
                    ->saveImage($fullCoverPath);

                $book->cover_path = $coverPath;
                $book->save();

                $this->info("Cover generated successfully.");
            } catch (Exception $e) {
                $this->error("Failed to generate cover: " . $e->getMessage());
            }
        }

        $this->info("Cover generation process completed.");
    }
}