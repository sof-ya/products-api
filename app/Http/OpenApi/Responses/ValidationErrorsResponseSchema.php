<?php

namespace App\Http\OpenApi\Responses;

use OpenApi\Attributes as OA;

#[OA\Response(
    response: 'ValidationErrorsResponse',
    description: 'Validation errors',
    content: new OA\JsonContent(ref: '#/components/schemas/ValidationErrorsResponseSchema')
)]
#[OA\Schema(
    schema: 'ValidationErrorsResponseSchema',
    required: ['message', 'errors'],
    type: 'object',
    properties: [
        new OA\Property(
            property: 'message',
            type:' string',
            example: 'The selected sort is invalid.'
        ),
        new OA\Property(
            property: 'errors',
            type:' object',
            example: [
                "sort" => ["The selected sort is invalid."]
            ]
        )
    ]
)]

class ValidationErrorsResponseSchema 
{

}