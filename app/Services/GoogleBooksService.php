<?php

namespace App\Services;

use GuzzleHttp\Client;

class GoogleBooksService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://www.googleapis.com/books/v1/',
        ]);
        $this->apiKey = config('services.google.books_api_key');
    }

    public function searchBooks($query)
    {
        $response = $this->client->get('volumes', [
            'query' => [
                'q' => $query,
                'key' => $this->apiKey,
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}