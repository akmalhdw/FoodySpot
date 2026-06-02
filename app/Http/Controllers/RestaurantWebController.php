<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantWebController extends Controller
{
    /**
     * Display listing of all restaurants.
     */
    public function index()
    {
        $restaurants = Restaurant::with('foodAndBeverages')
            ->orderByDesc('created_at')
            ->get();

        return view('restaurants.index', compact('restaurants'));
    }

    /**
     * Display a single restaurant with its menu.
     */
    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $menuItems = $restaurant->foodAndBeverages()
            ->orderBy('category')
            ->orderBy('name')
            ->get();

        return view('restaurants.show', compact('restaurant', 'menuItems'));
    }
}
