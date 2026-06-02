<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_id',
        'food_and_beverage_id',
        'quantity',
        'price',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'quantity' => 'integer',
    ];

    /**
     * The delivery order this item belongs to.
     */
    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

    /**
     * The food/beverage item.
     */
    public function foodAndBeverage()
    {
        return $this->belongsTo(FoodAndBeverage::class);
    }
}
