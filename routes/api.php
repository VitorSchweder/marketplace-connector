<?php

use App\Infrastructure\Http\Controllers\ImportOffersController;

Route::post('/import-offers', [ImportOffersController::class, 'import']);