<?php

namespace App\Providers;

use App\Repositories\BookStore\BookStoreRepository;
use App\Repositories\BookStore\BookStoreRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BookStoreRepositoryInterface::class, BookStoreRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
