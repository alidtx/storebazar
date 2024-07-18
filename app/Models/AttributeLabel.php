<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeLabel extends Model
{
    use HasFactory;

    protected $fillable = [
        'attribute_id',
        'label',
        'language_id',

    ];

    public function attributes()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id', 'id');
    }
}
