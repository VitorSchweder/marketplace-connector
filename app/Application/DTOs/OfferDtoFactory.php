<?php

namespace App\Application\DTOs;

class OfferDTOFactory
{
    /**
     * @param array $details Dados gerais da oferta
     * @param array $images Imagens da oferta
     * @param array $prices Preços e estoque
     * @return OfferDTO
     */
    public static function fromMarketplaceResponse(
        array $details,
        array $images,
        array $prices
    ): OfferDTO {
        return new OfferDTO(
            reference: $details['id'],
            title: $details['title'],
            description: $details['description'],
            status: $details['status'],
            stock: $prices['stock'] ?? 0,
            images: $images,
            prices: $prices
        );
    }
}