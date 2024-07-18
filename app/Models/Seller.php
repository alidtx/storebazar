<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'shop_name',
        'area',
        'shop_address',
        'tin_num',
        'trade_license'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
