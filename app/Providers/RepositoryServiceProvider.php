<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\AirportRepositoryInterface;
use App\Repositories\AirportRepository;
use App\Interfaces\AirlinesRepositoryInterface;
use App\Repositories\AirlineRepository;
use App\Interfaces\FlightRepositoryInterface;
use App\Repositories\FlightRepository;
use App\Interfaces\TransactionRepositoryInterface;
use App\Repositories\TransactionRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AirportRepositoryInterface::class, AirportRepository::class);
        $this->app->bind(AirlinesRepositoryInterface::class, AirlineRepository::class);
        $this->app->bind(FlightRepositoryInterface::class, FlightRepository::class);
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
