<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodAndBeverage extends Model
{
    use HasFactory;

    protected $table = 'food_and_beverages';

    protected $fillable = [
        'restaurant_id',
        'name',
        'description',
        'price',
        'category',
        'is_available',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_available' => 'boolean',
    ];

    /**
     * The restaurant this item belongs to.
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
