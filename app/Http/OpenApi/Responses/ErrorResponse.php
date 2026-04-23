<?php

namespace App\Http\OpenApi\Responses;

use OpenApi\Attributes as OA;

#[OA\Response(
    response: 'ErrorResponse',
    description: 'Common error responce',
    content: new OA\JsonContent(ref: '#/components/schemas/ErrorResponseSchema')
)]
#[OA\Schema(
    schema: 'ErrorResponseSchema',
    required: ['message'],
    type: 'object',
    properties: [
        new OA\Property(
            property: 'message',
            type:' string',
            example: 'Error occurred'
        )
    ]
)]

class ErrorResponse 
{

}