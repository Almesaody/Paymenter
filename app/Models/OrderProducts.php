<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderProducts extends Model
{
    use HasFactory;
    protected $table = 'order_products';
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function config()
    {
        return $this->hasMany(OrderProductsConfig::class, 'order_product_id', 'product_id');
    }

    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}