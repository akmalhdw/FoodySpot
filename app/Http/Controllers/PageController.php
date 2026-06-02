<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\FoodAndBeverage;
use App\Models\Delivery;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Show the home page with featured restaurants and stats.
     */
    public function home()
    {
        $featuredRestaurants = Restaurant::with('foodAndBeverages')
            ->where('is_active', true)
            ->orderByDesc('created_at')
            ->take(3)
            ->get();

        $restaurantCount = Restaurant::count();
        $menuCount = FoodAndBeverage::count();
        $deliveryCount = Delivery::count();

        return view('pages.home', compact(
            'featuredRestaurants',
            'restaurantCount',
            'menuCount',
            'deliveryCount'
        ));
    }

    /**
     * Show the about us page.
     */
    public function about()
    {
        return view('pages.about');
    }
}