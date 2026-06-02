<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\DeliveryItem;
use App\Models\FoodAndBeverage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    /**
     * POST /api/resto/delivery
     * Create a new delivery order with items.
     *
     * Expected JSON body:
     * {
     *   "restaurant_id": 1,
     *   "delivery_address": "123 Main St",
     *   "notes": "Ring the bell",
     *   "items": [
     *     { "food_and_beverage_id": 1, "quantity": 2 },
     *     { "food_and_beverage_id": 3, "quantity": 1 }
     *   ]
     * }
     */
    public function store(Request $request)
    {
        $request->validate([
            'restaurant_id' => 'required|integer|exists:restaurants,id',
            'delivery_address' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.food_and_beverage_id' => 'required|integer|exists:food_and_beverages,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $delivery = DB::transaction(function () use ($request) {
            // Calculate total from actual item prices
            $totalAmount = 0;
            $itemsData = [];

            foreach ($request->items as $item) {
                $fnb = FoodAndBeverage::findOrFail($item['food_and_beverage_id']);

                $lineTotal = $fnb->price * $item['quantity'];
                $totalAmount += $lineTotal;

                $itemsData[] = [
                    'food_and_beverage_id' => $fnb->id,
                    'quantity' => $item['quantity'],
                    'price' => $fnb->price,
                ];
            }

            // Create the delivery order
            $delivery = Delivery::create([
                'user_id' => $request->user()->id,
                'restaurant_id' => $request->restaurant_id,
                'delivery_address' => $request->delivery_address,
                'total_amount' => $totalAmount,
                'status' => 'pending',
                'notes' => $request->notes,
            ]);

            // Create line items
            foreach ($itemsData as $data) {
                $delivery->items()->create($data);
            }

            return $delivery;
        });

        return response()->json([
            'status' => 'success',
            'message' => 'Delivery order created successfully',
            'data' => $delivery->load('items.foodAndBeverage', 'restaurant'),
        ], 201);
    }
}
