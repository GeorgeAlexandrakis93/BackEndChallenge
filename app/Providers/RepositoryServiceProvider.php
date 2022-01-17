<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\VoyageRepository;
use App\Interfaces\VoyageRepositoryInterface;
use App\Repositories\VesselRepository;
use App\Interfaces\VesselRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    public function register()
    {
        $this->app->bind(VesselRepositoryInterface::class, VesselRepository::class);
        $this->app->bind(VoyageRepositoryInterface::class, VoyageRepository::class);
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
