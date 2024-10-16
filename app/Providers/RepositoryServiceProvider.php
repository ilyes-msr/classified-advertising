<?php

namespace App\Providers;

use App\Repositories\Ads\AdInterface;
use App\Repositories\Ads\AdRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            AdInterface::class,
            AdRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
