<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValues extends Model
{
    use HasFactory;

   // protected $with = ['attributeValues','attributeLabels'];

    protected $fillable = [
        'attribute_id',
        'product_id',
        'value'
    ];

    public function attributeValues()
    {
        return $this->belongsTo(Attribute::class,'attribute_id','id');
    }

    public function attributeLabels()
    {
        return $this->belongsTo(Attribute::class,'attribute_id','id');
    }
}
