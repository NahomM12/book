<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Book;
use Exception;
use Illuminate\Support\Facades\Storage;

class GenerateBookCovers extends Command
{
    protected $signature = 'books:generate-covers';
    protected $description = 'Generate cover images for books from PDF files using Ghostscript';

    public function handle()
    {
        if (!Storage::disk('public')->exists('covers')) {
            Storage::disk('public')->makeDirectory('covers');
        }

        $books = Book::whereNull('cover_path')->get();

        foreach ($books as $book) {
            $this->info("Generating cover for book: {$book->title}");

            try {
                $pdfPath = storage_path('app/public/' . $book->file_path);
                
                if (!file_exists($pdfPath)) {
                    $this->error("PDF file not found for book: {$book->title}");
                    continue;
                }

                $coverPath = 'covers/' . $book->id . '_cover.jpg';
                $fullCoverPath = storage_path('app/public/' . $coverPath);

                // Use Ghostscript to convert the first page of the PDF to an image
                $command = "\"C:\\Program Files\\gs\\gs10.03.1\\bin\\gswin64.exe\" -dNOPAUSE -dBATCH -sDEVICE=jpeg -dFirstPage=1 -dLastPage=1 -sOutputFile=$fullCoverPath -r150 $pdfPath";

                if ($returnVar !== 0 || !file_exists($fullCoverPath)) {
                    $this->error("Failed to generate cover for book: {$book->title}");
                    continue;
                }

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