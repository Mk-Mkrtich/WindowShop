<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'type',
        'meta'
    ];

    const DIGITAL_PRODUCT_TYPE = 'digital';
    const PHYSICAL_PRODUCT_TYPE = 'physical';

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('price_at_order');
    }

    protected $casts = [
        'meta' => 'array',
    ];

}
