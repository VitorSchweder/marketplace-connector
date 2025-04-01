<?php

namespace App\Application\DTOs;

class OfferDTO
{
    /**
     * @param string $reference Identificador da oferta
     * @param string $title Título da oferta
     * @param string $description Descrição
     * @param string $status Status atual da oferta
     * @param int $stock Quantidade em estoque
     * @param array $images Imagens associadas
     * @param array $prices Informações de preço
     */
    public function __construct(
        public string $reference,
        public string $title,
        public string $description,
        public string $status,
        public int $stock,
        public array $images = [],
        public array $prices = []
    ) {}
}