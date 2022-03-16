<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MovieHTTPClient\MovieHTTPClientInterface;
use App\Services\MovieHTTPClient\TheMovieDB;
use App\Repositories\Movies\MovieRepositoryInterface;
use App\Repositories\Movies\MovieRepository;
use App\Jobs\HandleMovieDataJob;

class MovieController extends Controller
{
    private MovieHTTPClientInterface $movieClient;
    private MovieRepositoryInterface $movieRepository;

    public function __construct(TheMovieDB $movieClient, MovieRepository $movieRepository)
    {
        $this->movieClient = $movieClient;
        $this->movieRepository = $movieRepository;
    }

    public function search(Request $request)
    {
        $results = $this->movieClient->search($request->get('name'), ($request->get('page') ?? 1));
        HandleMovieDataJob::dispatch($this->movieRepository, $results);
        return response()->json($results);
    }

    public function details(Request $request, int $id)
    {
        return response->json($this->movieRepository->find($id));
        // return response()->json($this->movieClient->details($id));
    }
}
