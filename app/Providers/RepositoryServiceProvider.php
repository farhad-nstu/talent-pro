<?php

namespace App\Providers;

use App\Http\Services\ShortenUrlService;
use App\Repositories\ShortenUrlRepositoryInterface;
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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ShortenUrlRepositoryInterface::class, ShortenUrlService::class);
    }
}
