<?php

namespace App\Services\MovieHTTPClient;

use GuzzleHttp\Client;

abstract class AbstractMovieHTTPClient
{
	protected Client $client;

	public function buildHttpClient(array $config)
	{
		$this->client = new Client([
			'base_uri' => $config['base_url'],
			'timeout'  => $config['timeout'],
		]);
	}
}