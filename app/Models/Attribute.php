<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attribute extends Model
{
    use HasFactory;

    protected $with = ['attributeLabel', 'attributeOptionValues'];

    protected $fillable = [
        'code',
        'type',

    ];

    public function attributeValue(): HasMany
    {
        return $this->hasMany(AttributeValues::class, 'attribute_id', 'id');
    }

    public function attributeLabel(): HasMany
    {
        return $this->hasMany(AttributeLabel::class, 'attribute_id', 'id');
    }

    public function attributeOptionValues(): HasMany
    {
        return $this->hasMany(AttributeOption::class, 'attribute_id', 'id');
    }

    public function delete()
    {
        // delete all related Data
        $this->attributeLabel()->delete();
        $this->attributeValue()->delete();
        $this->attributeOptionValues()->delete();
        return parent::delete();
    }
}
