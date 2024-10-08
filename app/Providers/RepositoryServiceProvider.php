<?php

namespace App\Providers;

use App\Interfaces\BookingInterface;
use App\Interfaces\NotificationInterface;
use App\Interfaces\UserInterface;
use App\Interfaces\VehicleInterface;
use App\Interfaces\Views\DashboardInterface;
use App\Repositories\BookingRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\UserRepository;
use App\Repositories\VehicleRepository;
use App\Repositories\Views\DashboardRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(VehicleInterface::class, VehicleRepository::class);
        $this->app->bind(BookingInterface::class, BookingRepository::class);
        $this->app->bind(NotificationInterface::class, NotificationRepository::class);
        $this->app->bind(DashboardInterface::class, DashboardRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
