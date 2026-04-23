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
            'q' => 'nullable|string|max:255'
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
            'search' => $validated['q'] ?? null
        ];
    }

    protected function useListParams(string $repositoryClass, array $params) : Builder {
        $query = app($repositoryClass)->query();
        if($params['search']) {
            $query = app($repositoryClass)->search($params['search']);
        }        
        $query->orderBy($params['sortBy'], $params['sortDir']);

        return $query;
    }
}
