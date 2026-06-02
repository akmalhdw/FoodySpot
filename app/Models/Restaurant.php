<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'address',
        'phone',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * The user (owner) of this restaurant.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Food & beverage items belonging to this restaurant.
     */
    public function foodAndBeverages()
    {
        return $this->hasMany(FoodAndBeverage::class);
    }

    /**
     * Delivery orders for this restaurant.
     */
    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
}
