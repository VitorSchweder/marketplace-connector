<?php

namespace App\Infrastructure\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Evento disparado ao iniciar uma importação de ofertas.
 */
class OffersImportRequested
{
    use Dispatchable, SerializesModels;

    public function __construct() {}
}