<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'price',
        'category_id',
        'in_stock',
        'raiting'
    ];

    public function toElasticsearchDocumentArray(): array
    {
        return $this->toArray();
    }

    public function getSearchableFields(): array
    {
        return [
            'name'
        ];
    }

    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
