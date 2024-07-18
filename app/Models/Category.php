<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'url_key',
        'image',

    ];

    protected $with = ['categoryDetail', 'categoryAttribute', 'products'];

    public function categoryDetail(): HasMany
    {
        return $this->hasMany(CategoryDetails::class, 'category_id', 'id');
    }

    public function categoryAttribute(): HasMany
    {
        return $this->hasMany(CategoryAttribute::class, 'category_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function delete()
    {
        // delete all related Data
        $this->categoryDetail()->delete();
        $this->categoryAttribute()->delete();
        return parent::delete();
    }
}
