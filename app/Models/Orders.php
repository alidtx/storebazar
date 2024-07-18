<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'seller_id',
        'product_id',
        'phone',
        'bidding_price',
        'payment_status',
        'order_status',
        'updated_price',
        'comment',
        'shipping_address'
    ];

    public function orderItems()
    {
        return $this->hasMany(Order_items::class,'order_id','id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function customerDetails()
    {
        return $this->belongsTo(User::class,'customer_id','id');
    }
}
