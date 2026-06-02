<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FoodAndBeverage;
use Illuminate\Http\Request;

class FoodAndBeverageController extends Controller
{
    /**
     * GET /api/resto/F&B
     * List all food & beverage items. Optionally filter by restaurant_id.
     */
    public function index(Request $request)
    {
        $query = FoodAndBeverage::with('restaurant:id,name');

        if ($request->has('restaurant_id')) {
            $query->where('restaurant_id', $request->restaurant_id);
        }

        $items = $query->get();

        return response()->json([
            'status' => 'success',
            'count' => $items->count(),
            'data' => $items,
        ], 200);
    }

    /**
     * POST /api/resto/F&B
     * Create a new food & beverage item.
     */
    public function store(Request $request)
    {
        $request->validate([
            'restaurant_id' => 'required|integer|exists:restaurants,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'nullable|string|max:100',
        ]);

        $item = FoodAndBeverage::create([
            'restaurant_id' => $request->restaurant_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Food & Beverage item created successfully',
            'data' => $item,
        ], 201);
    }

    /**
     * PUT /api/resto/F&B
     * Update an existing food & beverage item. Expects 'id' in request body.
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:food_and_beverages,id',
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric|min:0',
            'category' => 'nullable|string|max:100',
            'is_available' => 'sometimes|boolean',
        ]);

        $item = FoodAndBeverage::findOrFail($request->id);

        $item->update($request->only([
            'name', 'description', 'price', 'category', 'is_available',
        ]));

        return response()->json([
            'status' => 'success',
            'message' => 'Food & Beverage item updated successfully',
            'data' => $item->fresh(),
        ], 200);
    }

    /**
     * DELETE /api/resto/F&B
     * Delete a food & beverage item. Expects 'id' in request body.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:food_and_beverages,id',
        ]);

        $item = FoodAndBeverage::findOrFail($request->id);
        $item->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Food & Beverage item deleted successfully',
        ], 200);
    }
}
