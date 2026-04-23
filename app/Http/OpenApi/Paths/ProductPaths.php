<?php

namespace App\Http\OpenApi\Paths;

use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class ProductPaths 
{
    private const TAGS = ['Products'];

    #[OA\Get(
        path: "/api/products",
        operationId:"productIndex",
        tags: self::TAGS,
        summary: "Get list of products",
        security: [["bearerAuth" => []]],
        parameters: [
            new OA\Parameter(ref: '#/components/parameters/page'),
            new OA\Parameter(ref: '#/components/parameters/per_page'),
            new OA\Parameter(ref: '#/components/parameters/q'),
            new OA\Parameter(ref: '#/components/parameters/sort'),
            new OA\Parameter(ref: '#/components/parameters/price_from'),
            new OA\Parameter(ref: '#/components/parameters/price_to'),
            new OA\Parameter(ref: '#/components/parameters/category_id'),
            new OA\Parameter(ref: '#/components/parameters/in_stock'),
            new OA\Parameter(ref: '#/components/parameters/rating_from')
        ],
        responses: [
            new OA\Response(
                response: JsonResponse::HTTP_OK,
                description: 'Paginated list of products',
                content: new OA\JsonContent(
                    allOf: [
                        new OA\Schema(ref: '#/components/schemas/PaginationResponse'),
                        new OA\Schema(
                        properties: [
                            new OA\Property(
                                property: 'data',
                                type: 'array',
                                items: new OA\Items(ref: '#/components/schemas/ProductResource')
                            )
                        ]
                    )]
                )
            ), 
            new OA\Response(
                '#/components/responses/ValidationErrorsResponse',
                JsonResponse::HTTP_UNPROCESSABLE_ENTITY
            ),
            new OA\Response(
                '#/components/responses/ErrorResponse',
                JsonResponse::HTTP_UNAUTHORIZED
            )
        ]
    )]

    public static function index() : void {
        
    }
}