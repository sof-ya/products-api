<?php

namespace App\Repositories;

use App\Models\Product;
use App\Parents\Repositories\ElasticsearchRepository;

class ProductRepository extends ElasticsearchRepository
{
    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return Product::class;
    }

    public function query()
    {
        return Product::query();
    }
}