<?php

namespace App\Http\OpenApi\Schemas;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'UserResource',
    type: 'object',
    description: 'User resource schema',
    properties: [
        new OA\Property(property: 'id', type: 'integer', minimum: 1),
        new OA\Property(property: 'name', type: 'string', example: 'Test User'),
        new OA\Property(property: 'email', type: 'string', example: 'test@example.com'),
        new OA\Property(property: 'email_verified_at', type: 'string', format: 'date-time', example: '2026-04-23T09:20:07.000000Z'),
        new OA\Property(property: 'created_at', type: 'string', format: 'date-time', example: '2026-04-23T09:20:07.000000Z'),
        new OA\Property(property: 'updated_at', type: 'string', format: 'date-time', example: '2026-04-23T09:20:07.000000Z')  
    ]
)]

class UserSchema {}