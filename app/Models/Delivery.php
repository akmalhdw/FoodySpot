<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'restaurant_id',
        'delivery_address',
        'total_amount',
        'status',
        'notes',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
    ];

    /**
     * The customer who placed this delivery order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The restaurant this delivery order is from.
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    /**
     * The line items in this delivery order.
     */
    public function items()
    {
        return $this->hasMany(DeliveryItem::class);
    }
}
