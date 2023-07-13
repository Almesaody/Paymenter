<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupons extends Model {
    use HasFactory;
    protected $table = 'coupons';
    protected $fillable = [
        'code',
        'type',
        'value',
        'max_uses',
        'uses',
        'start_date',
        'end_date',
        'status',
        'products',
    ];

    protected $casts = [
        'products' => 'array',
    ];

    public function getDiscount($subtotal)
    {
        if ($this->type === 'percent') {
            return $subtotal * $this->value / 100;
        } else {
            return $this->value;
        }
    }
}