<?php
namespace App\Infrastructure\Http\Controllers;

use App\Infrastructure\Events\OffersImportRequested;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ImportOffersController
{
    /**
     * Recebe solicitação de importação e dispara o evento.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function import(Request $request)
    {
        Log::info('Solicitação de importação recebida.');

        OffersImportRequested::dispatch();

        return response()->json(['message' => 'Importação iniciada.'], 200);
    }
}