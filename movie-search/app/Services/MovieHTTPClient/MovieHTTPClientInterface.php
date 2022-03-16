<?php

namespace App\Services\MovieHTTPClient;

interface MovieHTTPClientInterface
{
	public function search(string $name, int $page);
	public function details(int $id);
}