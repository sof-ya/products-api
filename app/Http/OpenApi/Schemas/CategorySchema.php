<?php

namespace App\Http\OpenApi\Schemas;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'CategoryResource',
    type: 'object',
    description: ' Category resource schema',
    properties: [
        new OA\Property(property: 'id', type: 'integer', minimum: 1),
        new OA\Property(property: 'name', type: 'string', example: 'Смартфоны'),
        new OA\Property(property: 'created_at', type: 'string', format: 'date-time', example: '2026-04-23T09:20:07.000000Z'),
        new OA\Property(property: 'updated_at', type: 'string', format: 'date-time', example: '2026-04-23T09:20:07.000000Z')   
    ]
)]

class CategorySchema {}