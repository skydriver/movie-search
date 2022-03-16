<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Repositories\Movies\MovieRepositoryInterface;

class HandleMovieDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected MovieRepositoryInterface $repository;
    protected array $results;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(MovieRepositoryInterface $repository, array $results)
    {
        $this->repository = $repository;
        $this->results = $results;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // get all video_provider_ids to exclude for inserting
        // filter our results, remove all the movies from the results 
        // insert the new movies
        // search for trailers and update trailers
    }

    private function extractVideoProviderIds()
    {
        $videoProviderIds = [];
        foreach($this->results as $result)
        {
            $videoProviderIds[] = $result->id;
        }

        return $videoProviderIds;
    }

    private function excludeExistingMovies(array $videoProviderIds)
    {
        $newResults = [];
        foreach($this->results as $result)
        {
            if (false === array_search($result->id, $videoProviderIds))
            {
                $newResults = [$result];
            }
        }

        return $newResults;
    }

    private function insertNewMovies(array $movies)
    {
        $this->repository->insertNewMovies($movies);
    }
}
