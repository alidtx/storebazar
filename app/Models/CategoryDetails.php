<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'language_id',

    ];

    protected $table = 'category_details';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
