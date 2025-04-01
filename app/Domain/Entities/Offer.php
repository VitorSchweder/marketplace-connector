<?php

namespace App\Domain\Entities;

class Offer
{
    public function __construct(
        public string $id,
        public string $title,
        public string $description,
        public string $status,
        public int $stock,
        public array $images = [],
        public array $prices = []
    ) {}
}