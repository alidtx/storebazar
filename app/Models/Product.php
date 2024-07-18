<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    // protected $with = ['productDetails', 'productImages',  'attributeValues', 'sellerDetails', 'productCategory'];

    protected $fillable = ['category_id', 'url_key', 'prod_sku', 'seller_id', 'quantity', 'min_order_quantity', 'price', 'status', 'is_homepage'];

    public function productDetails()
    {
        return $this->hasOne(ProductDetail::class, 'product_id', 'id');
    }

    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function productCategory()
    {
        return $this->hasOne(ProductCategory::class, 'product_id', 'id');
    }

    public function attributeValues()
    {
        return $this->hasMany(AttributeValues::class, 'product_id', 'id');
    }

    public function categoryDetails()
    {
        return $this->hasMany(CategoryDetails::class, 'category_id', 'id');
    }

    public function sellerDetails(): BelongsTo
    {
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }

    public function delete()
    {
        // delete all related Data
        $this->productDetails()->delete();
        $this->productImages()->delete();
        return parent::delete();
    }
}
