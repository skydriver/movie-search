<?php

namespace App\Services\MovieHTTPClient;

use App\Helpers\MovieTrailerExtractors\YouTubeExtractor;

class TheMovieDB extends AbstractMovieHTTPClient implements MovieHTTPClientInterface
{
    private string $apiKey;

    public function __construct(array $config)
    {
        $this->buildHttpClient($config);
        $this->apiKey = $config['api_key'];
    }

    public function search(string $name, int $page)
    {
        $queryString = sprintf('search/movie?api_key=%s&query=%s&page=%d', $this->apiKey, $name, $page);

        $results = json_decode($this->client->get($queryString)->getBody(), true);

        return $results;
    }

    public function details(int $id)
    {
        // This basically is not needed, results for single movie can be retreived from our DB/Cache/Other Storage

        $queryString = sprintf('movie/%s?api_key=%s', $id, $this->apiKey);

        return json_decode($this->client->get($queryString)->getBody(), true);
    }
}
