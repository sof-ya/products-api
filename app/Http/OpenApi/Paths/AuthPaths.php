<?php

namespace App\Http\OpenApi\Paths;

use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class AuthPaths
{
    private const TAGS = ['Authentication'];

    private const BASE_PATH = '/api/auth';

    #[OA\Post(
        path: self::BASE_PATH.'/login',
        operationId: 'authLogin',
        tags: self::TAGS,
        summary: 'Authenticate user and get JWT token',
        security: [], 
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(ref: '#/components/schemas/LoginRequest')
        ),
        responses: [
            new OA\Response(
                response: JsonResponse::HTTP_OK,
                description: 'Successful authentication',
                content: new OA\JsonContent(ref: '#/components/schemas/TokenResponse')
            ),
            new OA\Response(
                '#/components/responses/ValidationErrorsResponse',
                JsonResponse::HTTP_UNPROCESSABLE_ENTITY
            ),
            new OA\Response(
                '#/components/responses/ErrorResponse',
                JsonResponse::HTTP_UNAUTHORIZED
            ),
        ]
    )]
    public static function login(): void {}

    #[OA\Post(
        path: self::BASE_PATH.'/logout',
        operationId: 'authLogout',
        tags: self::TAGS,
        summary: 'Logout user (invalidate JWT token)',
        security: [["bearerAuth" => []]],
        responses: [
            new OA\Response(
                response: JsonResponse::HTTP_OK,
                description: 'Successfully logged out',
                content: new OA\JsonContent(properties: [new OA\Property(property: 'message', type: 'string')], type: 'object')
            ),
            new OA\Response(
                '#/components/responses/ErrorResponse',
                JsonResponse::HTTP_UNAUTHORIZED
            ),
        ]
    )]
    public static function logout(): void {}

    #[OA\Post(
        path: self::BASE_PATH.'/refresh',
        operationId: 'authRefresh',
        tags: self::TAGS,
        summary: 'Refresh JWT token',
        security: [["bearerAuth" => []]],
        responses: [
            new OA\Response(
                response: JsonResponse::HTTP_OK,
                description: 'Token refreshed',
                content: new OA\JsonContent(ref: '#/components/schemas/TokenResponse')
            ),
            new OA\Response(
                '#/components/responses/ErrorResponse',
                JsonResponse::HTTP_UNAUTHORIZED
            ),
        ]
    )]
    public static function refresh(): void {}

    #[OA\Post(
        path: self::BASE_PATH.'/me',
        operationId: 'authMe',
        tags: self::TAGS,
        summary: 'Get authenticated user',
        security: [["bearerAuth" => []]],
        responses: [
            new OA\Response(
                response: JsonResponse::HTTP_OK,
                description: 'Authenticated user',
                content: new OA\JsonContent(ref: '#/components/schemas/UserResource')
            ),
            new OA\Response(
                '#/components/responses/ErrorResponse',
                JsonResponse::HTTP_UNAUTHORIZED
            ),
        ]
    )]
    public static function me(): void {}
}
