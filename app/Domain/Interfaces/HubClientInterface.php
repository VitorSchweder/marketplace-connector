<?php

namespace App\Domain\Interfaces;

interface HubClientInterface
{
    public function sendOffer(array $payload): void;
}