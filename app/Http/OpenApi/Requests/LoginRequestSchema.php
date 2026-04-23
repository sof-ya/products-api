<?php

namespace App\Http\OpenApi\Requests;

use OpenApi\Attributes as OA;

#[OA\Schema(
            schema: "LoginRequest",
            required: ["email", "password"],
            type: "object",
            description: "Credentials for JWT authentication",
            properties: [
        new OA\Property(
                property: "email",
                type: "string",
                format: "email",
                example: "test@example.com"
        ),
        new OA\Property(
                property: "password",
                type: "string",
                format: "password",
                example: "password"
        )
            ]
    )]
class LoginRequestSchema
{
    
}