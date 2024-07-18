<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsDetails extends Model
{

    protected $fillable = ['cms_id','title', 'sub_title', 'content','language_id'];
    
    use HasFactory;
}