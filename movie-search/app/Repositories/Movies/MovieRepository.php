<?php

namespace App\Repositories\Movies;

use App\Model\Movie;

class MovieRepository implements MovieRepositoryInterface
{
	public function getVideoProviderIds(array $videoProviderIds)
	{
		return Movie::whereIn('video_provider_id', $videoProviderIds);
	}

	public function insertNewMovies(array movies)
	{
		return Movie::insert($data);
	}

	public function updateMovieTrailer(int $id, string $movieTrailerUrl)
	{
		return Movie::whereId($id)->update([
			'trailer_url' => $movieTrailerUrl
		]);
	}

	public function find(int $id)
	{
		return Movie::find($id);
	}
}