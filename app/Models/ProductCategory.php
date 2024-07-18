<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'category_product';

    // protected $with = ['categoryDetailInformation'];

    protected $fillable = ['category_id', 'product_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'category_id', 'id');
    }

    public function categoryDetailInformation(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
