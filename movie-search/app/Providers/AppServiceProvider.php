<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MovieHTTPClient\TheMovieDB;

use App\Repositories\Movies\MovieRepositoryInterface;
use App\Repositories\Movies\MovieRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TheMovieDB::class, function ($app) {
            return new TheMovieDB(config('httpmovieclient')['the_movie_db']);
        });

        // $this->app->singleton(SomeOtherMovieDB::class, function ($app) {
        //     return new SomeOtherMovieDB(config('httpmovieclient')['some_other_movie_db']);
        // });

        $this->app->bind(MovieRepositoryInterface::class, MovieRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
