<?php

namespace App\Http\OpenApi\Parameters;

use OpenApi\Attributes as OA;

#[OA\Parameter(
    parameter: 'price_from',
    name: 'price_from',
    in: 'query',
    required: false,
    description: 'Product price from',
    schema: new OA\Schema(type: 'float', minimum: 1)
)]
#[OA\Parameter(
    parameter: 'price_to',
    name: 'price_to',
    in: 'query',
    required: false,
    description: 'Product price to',
    schema: new OA\Schema(type: 'float', minimum: 1)
)]
#[OA\Parameter(
    parameter: 'category_id',
    name: 'category_id',
    in: 'query',
    required: false,
    description: 'Choosen category id',
    schema: new OA\Schema(type: 'integer', minimum: 1)
)]
#[OA\Parameter(
    parameter: 'in_stock',
    name: 'in_stock',
    in: 'query',
    required: false,
    description: 'If product in stock',
    schema: new OA\Schema(type: 'integer', enum: [0, 1])
)]
#[OA\Parameter(
    parameter: 'rating_from',
    name: 'rating_from',
    in: 'query',
    required: false,
    description: 'Product rating from',
    schema: new OA\Schema(type: 'float', minimum: 1)
)]

class FilterParameters 
{
    
}