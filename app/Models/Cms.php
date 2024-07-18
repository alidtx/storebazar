<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cms extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cmsDetails(): HasMany
    {
        return $this->hasMany(CmsDetails::class, 'cms_id', 'id');
    }

    public function delete()
    {
        // delete all related Data
        $this->cmsDetails()->delete();
        return parent::delete();
    }
}