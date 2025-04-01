<?php

namespace App\Domain\Interfaces;

interface MarketplaceClientInterface
{
    public function getOffers(int $page): array;
    public function getOfferDetails(string $reference): array;
    public function getOfferImages(string $reference): array;
    public function getOfferPrices(string $reference): array;
}