<?php

namespace App\Infrastructure\Jobs;

use App\Domain\Interfaces\MarketplaceClientInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use App\Domain\States\CompletedState;
use App\Domain\Interfaces\ImportProcessRepositoryInterface;

/**
 * Job responsável por importar uma página de ofertas do marketplace.
 */
class ImportOffersPageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @param int $page Número da página a ser importada
     */
    public function __construct(
        public int $page
    ) {}

     /**
     * Executa o job para a página informada.
     *
     * @param MarketplaceClientInterface $client
     */
    public function handle(MarketplaceClientInterface $client)
    {
        $offers = $client->getOffers($this->page);

        foreach ($offers['offers'] as $key => $reference) {
            ProcessOfferDetailsJob::dispatch($reference);
        }

        if (!empty($offers['next'])) {
            ImportOffersPageJob::dispatch($this->page + 1);
        } else {
            $importProcessRepository = app(ImportProcessRepositoryInterface::class);

            $import = $importProcessRepository->createWithState((new CompletedState())->status());

            Log::info('Importação finalizada. Estado atual: ' . $import->getStatus());
        }
    }
}