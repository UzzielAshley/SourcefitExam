<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Repository;
use App\Repositories\RepositoryInterface;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(Repository::class, RepositoryInterface::class);
    }
}
