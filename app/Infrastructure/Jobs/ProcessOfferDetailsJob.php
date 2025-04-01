<?php

namespace App\Infrastructure\Jobs;

use App\Domain\Interfaces\MarketplaceClientInterface;
use App\Domain\Interfaces\HubClientInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use App\Application\DTOs\OfferDTOFactory;

/**
 * Job que processa os detalhes de uma oferta e envia ao HUB.
 */
class ProcessOfferDetailsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var string */
    public string $reference;

    /**
     * @param string $reference Referência da oferta
     */
    public function __construct(string $reference)
    {
        $this->reference = $reference;
    }

    /**
     * Executa o job para processar e enviar uma oferta.
     *
     * @param MarketplaceClientInterface $marketplace
     * @param HubClientInterface $hub
     */
    public function handle(MarketplaceClientInterface $marketplace, HubClientInterface $hub)
    {
        $details = $marketplace->getOfferDetails($this->reference);
        $images = $marketplace->getOfferImages($this->reference);
        $prices = $marketplace->getOfferPrices($this->reference);
                
        $offerDTO = OfferDTOFactory::fromMarketplaceResponse($details, $images, $prices);

        $hub->sendOffer([
            'title' => $offerDTO->title,
            'description' => $offerDTO->description,
            'status' => $offerDTO->status,
            'stock' => $offerDTO->stock,
        ]);

        Log::info("Oferta enviada ao HUB: {$this->reference}");
    }
}