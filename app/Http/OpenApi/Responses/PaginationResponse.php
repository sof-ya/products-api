<?php

namespace App\Http\OpenApi\Responses;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'PaginationResponse',
    type: 'object',
    description: 'Paginated response wrapper',
    properties: [
        new OA\Property(
            property: 'data',
            type:' array',
            description:'List of items',
            items: new OA\Items()
        ),
        new OA\Property(
            property: 'current_page', 
            type: 'integer',
            example: 1
        ),
        new OA\Property(
            property: 'from', 
            type: 'integer',
            example: 1
        ),
        new OA\Property(
            property: 'last_page', 
            type: 'integer',
            example: 5
        ), 
        new OA\Property(
            property: 'links', 
            type: 'array',
            items: new OA\Items(
                properties: [
                    new OA\Property(property: 'url', type: 'string', nullable: true),
                    new OA\Property(property: 'label', type: 'string'),
                    new OA\Property(property: 'active', type: 'boolean'),
                    new OA\Property(property: 'page', type: 'integer', nullable: true)
                ]
            )
        ),
        new OA\Property(property: 'next_page_url', type: 'string', nullable: true),
        new OA\Property(property: 'prev_page_url', type: 'string', nullable: true),
        new OA\Property(property: 'path', type: 'string', nullable: true),
        new OA\Property(property: 'per_page', type: 'integer', example: 5),
        new OA\Property(property: 'to', type: 'integer', example: 5),
        new OA\Property(property: 'total', type: 'integer', example: 20),
    ]
)]

class PaginationResponse 
{

}