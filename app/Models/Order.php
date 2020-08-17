<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $guarded = [];
    protected $casts = [
        'order_details' => 'array',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'resto_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
