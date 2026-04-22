<?php

namespace App\Traits;

use Illuminate\Pagination\LengthAwarePaginator;

trait PaginatedResource
{
    public static function transformPaginator(LengthAwarePaginator $paginator, string $resourseClass) : LengthAwarePaginator {
        $collection = $paginator->getCollection()->map(fn($item) => new $resourseClass($item));

        return new LengthAwarePaginator(
            $collection,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'query' => request()->query()
            ]
        );
    }
}
