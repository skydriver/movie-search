<?php

namespace App\Providers;

use App\Services\MovieHTTPClient\TheMovieDB;
use Illuminate\Support\ServiceProvider;

class MovieHTTPClientServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(TheMovieDB::class, function ($app) {
            return new TheMovieDB(config('httpmovieclient')['the_movie_db']);
        });

        // $this->app->singleton(SomeOtherMovieDB::class, function ($app) {
        //     return new SomeOtherMovieDB(config('httpmovieclient')['some_other_movie_db']);
        // });
    }

    public function boot()
    {
        //
    }
}
