<?php

namespace App\Http\Controllers;

use App\Traits\PaginatedResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Validation\Rule;

abstract class Controller extends BaseController
{
    use PaginatedResource; 
    
    private function paginationRules() : array {
        return [
            'page' => 'integer|min:1',
            'per_page' => ['integer', Rule::in([-1, ...range(1, 1000)])]
        ];
    }

    protected function listParams(Request $request) : array {
        $rules = [
            ...$this->paginationRules(),
            'sort' => ['nullable', Rule::in(['price_asc', 'price_desc', 'rating_desc', 'newest'])],
            'q' => 'nullable|string|max:255',
            'price_from' => ['nullable', 'numeric', 'min:1'],
            'price_to' => ['nullable', 'numeric', 'min:1'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'in_stock' => ['nullable', 'boolean'],
            'rating_from' => ['nullable', 'numeric', 'min:1', 'max:5']
        ];

        $validated = $request->validate($rules);
        
        $sort = $validated['sort'] ?? null;
        
        switch ($sort) {
            case 'price_asc':
                $sortBy = 'price';
                $sortDir = 'asc';
                break;
            case 'price_desc':
                $sortBy = 'price';
                $sortDir = 'desc';
                break;
            case 'rating_desc':
                $sortBy = 'rating';
                $sortDir = 'desc';
                break;
            case 'newest':
                $sortBy = 'created_at';
                $sortDir = 'desc';
                break;
            
            default:
                $sortBy = 'created_at';
                $sortDir = 'asc';
                break;
        }

        return [
            'page' => $validated['page'] ?? 1,
            'per_page' => $validated['per_page'] ?? 10,
            'sortBy' => $sortBy,
            'sortDir' => $sortDir,
            'search' => $validated['q'] ?? null,
            'filters' => [
                'price' => [
                    '>' => $validated['price_from'] ?? null,
                    '<' => $validated['price_to'] ?? null,
                ],
                'category_id' => [
                    '=' => $validated['category_id'] ?? null
                ],
                'in_stock' => [
                    '=' => $validated['in_stock'] ?? null
                ],
                'rating' => [
                    '>' => $validated['rating_from'] ?? null
                ]
            ]
        ];
    }

    protected function useListParams(string $repositoryClass, array $params) : Builder {
        $query = app($repositoryClass)->query();
        if($params['search']) {
            $query = app($repositoryClass)->search($params['search']);
        }
        foreach ($params['filters'] as $columnName => $filters) {
            foreach ($filters as $operation => $value) {
                if($value != null) {
                    $query->where($columnName, $operation, $value);
                }
            }
        }
        $query->orderBy($params['sortBy'], $params['sortDir']);

        return $query;
    }
}
