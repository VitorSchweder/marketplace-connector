<?php

namespace App\Infrastructure\Integrations;

use App\Domain\Interfaces\HubClientInterface;
use Illuminate\Support\Facades\Http;

class HubClient implements HubClientInterface
{
    public function sendOffer(array $payload): void
    {
        Http::post(config('app.base_url_integration').'/hub/create-offer', $payload);
    }
}