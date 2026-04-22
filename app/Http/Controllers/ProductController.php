<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $params = $this->listParams($request);
        $query = Product::query();
        $this->useListParams($query, $params);

        $paginator = $query->paginate($params['per_page'], ['*'], 'page', $params['page']);

        return response()->json(
            self::transformPaginator($paginator, ProductResource::class));
    }
}
