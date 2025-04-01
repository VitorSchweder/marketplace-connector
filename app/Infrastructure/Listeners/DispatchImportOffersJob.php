<?php

namespace App\Infrastructure\Listeners;

use App\Infrastructure\Events\OffersImportRequested;
use App\Infrastructure\Jobs\ImportOffersPageJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use App\Domain\States\InProgressState;
use App\Domain\Interfaces\ImportProcessRepositoryInterface;

/**
 * Listener que dispara o job inicial de importação paginada.
 */
class DispatchImportOffersJob implements ShouldQueue
{
    /**
     * Manipula o evento OffersImportRequested.
     *
     * @param OffersImportRequested $event
     */
    public function handle(OffersImportRequested $event)
    {
        $importProcessRepository = app(ImportProcessRepositoryInterface::class);

        $import = $importProcessRepository->createWithState((new InProgressState())->status());

        Log::info('Importação iniciada com estado: ' . $import->getStatus());

        ImportOffersPageJob::dispatch(1);
    }
}