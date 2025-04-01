<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Interfaces\HubClientInterface;
use App\Domain\Interfaces\MarketplaceClientInterface;
use App\Infrastructure\Integrations\HubClient;
use App\Infrastructure\Integrations\MarketplaceClient;
use App\Domain\Interfaces\ImportProcessRepositoryInterface;
use App\Infrastructure\Repositories\ImportProcessRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(MarketplaceClientInterface::class, MarketplaceClient::class);
        $this->app->bind(HubClientInterface::class, HubClient::class);
        $this->app->bind(ImportProcessRepositoryInterface::class, ImportProcessRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
