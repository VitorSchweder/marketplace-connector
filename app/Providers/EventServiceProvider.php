<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Infrastructure\Events\OffersImportRequested;
use App\Infrastructure\Listeners\DispatchImportOffersJob;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        OffersImportRequested::class => [
            DispatchImportOffersJob::class,
        ],
    ];
}
