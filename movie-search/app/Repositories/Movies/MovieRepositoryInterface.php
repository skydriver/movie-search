<?php

namespace App\Repositories\Movies;

interface MovieRepositoryInterface
{
	public function getVideoProviderIds(array $videoProviderIds);
	public function insertNewMovies(array movies);
	public function updateMovieTrailer(int $id, string $movieTrailerUrl);
	public function find(int $id);
}