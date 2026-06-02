<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * GET /api/resto
     * List all restaurants.
     */
    public function index()
    {
        $restaurants = Restaurant::with('user:id,name')->get();

        return response()->json([
            'status' => 'success',
            'count' => $restaurants->count(),
            'data' => $restaurants,
        ], 200);
    }

    /**
     * GET /api/resto/desc
     * List all restaurants sorted by newest first (descending by created_at).
     */
    public function indexDesc()
    {
        $restaurants = Restaurant::with('user:id,name')
            ->orderByDesc('created_at')
            ->get();

        return response()->json([
            'status' => 'success',
            'count' => $restaurants->count(),
            'data' => $restaurants,
        ], 200);
    }

    /**
     * POST /api/resto
     * Create a new restaurant.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
        ]);

        $restaurant = Restaurant::create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Restaurant created successfully',
            'data' => $restaurant,
        ], 201);
    }

    /**
     * PUT /api/resto
     * Update an existing restaurant. Expects 'id' in request body.
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:restaurants,id',
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'is_active' => 'sometimes|boolean',
        ]);

        $restaurant = Restaurant::findOrFail($request->id);

        $restaurant->update($request->only([
            'name', 'description', 'address', 'phone', 'is_active',
        ]));

        return response()->json([
            'status' => 'success',
            'message' => 'Restaurant updated successfully',
            'data' => $restaurant->fresh(),
        ], 200);
    }

    /**
     * DELETE /api/resto
     * Delete a restaurant. Expects 'id' in request body.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:restaurants,id',
        ]);

        $restaurant = Restaurant::findOrFail($request->id);
        $restaurant->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Restaurant deleted successfully',
        ], 200);
    }
}
