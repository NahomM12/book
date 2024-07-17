<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GoogleBooksController;

Route::middleware('api')->group(function () {
    Route::get('/google-books', [GoogleBooksController::class, 'search'])->name('api.google-books.search');
});