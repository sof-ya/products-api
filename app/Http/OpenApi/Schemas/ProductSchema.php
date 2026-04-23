<?php

namespace App\Http\OpenApi\Schemas;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'ProductResource',
    type: 'object',
    description: ' Product resource schema',
    properties: [
        new OA\Property(property: 'id', type: 'integer', minimum: 1),
        new OA\Property(property: 'name', type: 'string', example: 'IPhone 15 Pro Max'),
        new OA\Property(property: 'price', type: 'float', minimum: 1),
        new OA\Property(property: 'category', ref: '#/components/schemas/CategoryResource'),
        new OA\Property(property: 'in_stock', type: 'boolean'),
        new OA\Property(property: 'rating', type: 'float', minimum: 1.00, maximum: 5.00),
        new OA\Property(property: 'created_at', type: 'string', format: 'date-time', example: '2026-04-23T09:20:07.000000Z'),
        new OA\Property(property: 'updated_at', type: 'string', format: 'date-time', example: '2026-04-23T09:20:07.000000Z')   
    ]
)]

class ProductSchema {}