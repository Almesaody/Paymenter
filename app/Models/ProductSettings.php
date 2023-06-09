<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSettings extends Model
{
    use HasFactory;
    protected $table = 'product_settings';
    protected $fillable = [
        'product_id',
        'name',
        'value',
        'extension',
    ];

    public function getExtension()
    {
        return $this->belongsTo(Extensions::class, 'extension');
    }
}
