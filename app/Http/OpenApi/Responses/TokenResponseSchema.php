<?php

namespace App\Http\OpenApi\Responses;

use OpenApi\Attributes as OA;

#[OA\Schema(
            schema: "TokenResponse",
            type: "object",
            description: "JWT token response"
    )]

class TokenResponseSchema
{

    #[OA\Property(
                property: "access_token",
                type: "string",
                example: "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9..."
        )]
    public string $access_token;

    #[OA\Property(
                property: "token_type",
                type: "string",
                example: "bearer"
        )]
    public string $token_type;

    #[OA\Property(
                property: "expires_in",
                type: "integer",
                example: 3600
        )]
    public int $expires_in;
}