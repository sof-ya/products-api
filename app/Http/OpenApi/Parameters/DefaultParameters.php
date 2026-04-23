<?php

namespace App\Http\OpenApi\Parameters;

use OpenApi\Attributes as OA;

#[OA\Parameter(
    parameter: 'page',
    name: 'page',
    in: 'query',
    required: false,
    description: 'Page number',
    schema: new OA\Schema(type: 'integer', default: 1)
)]
#[OA\Parameter(
    parameter: 'per_page',
    name: 'per_page',
    in: 'query',
    required: false,
    description: 'Count of elements on page',
    schema: new OA\Schema(type: 'integer', default: 10)
)]
#[OA\Parameter(
    parameter: 'q',
    name: 'q',
    in: 'query',
    required: false,
    description: 'Substing for searching',
    schema: new OA\Schema(type: 'string', maxLength: 255)
)]
#[OA\Parameter(
    parameter: 'sort',
    name: 'sort',
    in: 'query',
    required: false,
    description: 'Type of sorting',
    schema: new OA\Schema(type: 'string', enum: ['price_asc', 'price_desc', 'rating_desc', 'newest'])
)]

class DefaultParameters 
{
    
}