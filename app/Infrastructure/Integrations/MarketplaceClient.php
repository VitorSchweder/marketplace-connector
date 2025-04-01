<?php

namespace App\Infrastructure\Integrations;

use App\Domain\Interfaces\MarketplaceClientInterface;
use Illuminate\Support\Facades\Http;

class MarketplaceClient implements MarketplaceClientInterface
{
    public function getOffers(int $page): array
    {
        $response = Http::get(config('app.base_url_integration')."/offers?page={$page}")->json();

        return $response['data'] ?? [];
    }

    public function getOfferDetails(string $reference): array
    {
        $response = Http::get(config('app.base_url_integration')."/offers/{$reference}")->json();

        return $response['data'] ?? [];
    }

    public function getOfferImages(string $reference): array
    {
        $response = Http::get(config('app.base_url_integration')."/offers/{$reference}/images")->json();

        return $response['data'] ?? [];
    }

    public function getOfferPrices(string $reference): array
    {
        $response = Http::get(config('app.base_url_integration')."/offers/{$reference}/prices")->json();

        return $response['data'] ?? [];
    }
}
