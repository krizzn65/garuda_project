<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\AirportRepositoryinterface;
use App\Repositories\AiportRepository;
use App\Interfaces\AirlinesRepositoryinterface;
use App\Repositories\AirlineRepository;
use App\Interfaces\FlightRepositoryinterface;
use App\Repositories\FlightRepository;
use App\Interfaces\TransactionRepositoryinterface;
use App\Repositories\TransactionRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AirportRepositoryinterface::class, AiportRepository::class);
        $this->app->bind(AirlineRepositoryinterface::class, AirlineRepository::class);
        $this->app->bind(FlightRepositoryinterface::class, FlightRepository::class);
        $this->app->bind(TransactionRepositoryinterface::class, TransactionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
