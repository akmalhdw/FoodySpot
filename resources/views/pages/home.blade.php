@extends('layouts.app')

@section('title', 'FoodieSpot — Discover Restaurants & Food Delivery')

@section('content')

{{-- Hero Section --}}
<section class="hero-section relative flex items-center justify-center">
    <div class="hero-overlay"></div>
    <div class="relative z-10 max-w-5xl mx-auto px-4 text-center">
        <div class="opacity-0 animate-fade-in-up">
            <span class="inline-block px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-brand-300 text-xs font-semibold uppercase tracking-widest mb-6">
                🍽️ Your Culinary Adventure Starts Here
            </span>
        </div>
        <h1 class="text-5xl sm:text-7xl lg:text-8xl font-black font-display text-white leading-[0.95] mb-6 opacity-0 animate-fade-in-up animate-delay-100">
            Discover.
            <span class="block gradient-text">Taste.</span>
            <span class="block text-white">Deliver.</span>
        </h1>
        <p class="text-lg sm:text-xl text-white/70 max-w-2xl mx-auto mb-10 opacity-0 animate-fade-in-up animate-delay-200">
            Explore the finest restaurants near you. Browse menus, order your favorite food & beverages, and enjoy doorstep delivery in minutes.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center opacity-0 animate-fade-in-up animate-delay-300">
            <a href="{{ route('restaurants.index') }}"
               class="btn-glow px-8 py-4 text-base font-bold text-white bg-gradient-to-r from-brand-500 to-brand-600 rounded-2xl shadow-2xl uppercase tracking-wide transition-all duration-300 hover:scale-105 hover:shadow-brand-500/40"
               id="hero-explore-btn">
                Explore Restaurants
            </a>
            @guest
            <a href="{{ route('register') }}"
               class="px-8 py-4 text-base font-bold text-white bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl hover:bg-white/20 transition-all duration-300"
               id="hero-signup-btn">
                Create Account
            </a>
            @endguest
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 opacity-0 animate-fade-in-up animate-delay-400">
        <div class="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center">
            <div class="w-1.5 h-3 bg-white/60 rounded-full mt-2 animate-bounce"></div>
        </div>
    </div>
</section>

{{-- Stats Bar --}}
<section class="relative mt-4 z-20 max-w-5xl mx-auto px-4">
    <div class="bg-white dark:bg-navy-800 rounded-3xl shadow-2xl p-8 grid grid-cols-1 sm:grid-cols-3 gap-6 border border-gray-100 dark:border-gray-700/50">
        <div class="text-center">
            <p class="text-3xl font-black font-display gradient-text">{{ $restaurantCount ?? 0 }}+</p>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Restaurants</p>
        </div>
        <div class="text-center border-l border-r border-gray-100 dark:border-gray-700/50">
            <p class="text-3xl font-black font-display gradient-text">{{ $menuCount ?? 0 }}+</p>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Menu Items</p>
        </div>
        <div class="text-center">
            <p class="text-3xl font-black font-display gradient-text">{{ $deliveryCount ?? 0 }}+</p>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Deliveries</p>
        </div>
    </div>
</section>

{{-- Featured Restaurants --}}
<section class="max-w-7xl mx-auto py-20 px-4 sm:px-6 lg:px-8">
    <div class="flex items-end justify-between mb-10">
        <div>
            <span class="text-xs font-semibold text-brand-500 uppercase tracking-widest">Popular Places</span>
            <h2 class="text-3xl sm:text-4xl font-bold font-display text-gray-900 dark:text-white mt-2">Featured Restaurants</h2>
        </div>
        <a href="{{ route('restaurants.index') }}" class="hidden sm:flex items-center gap-2 text-sm font-semibold text-brand-500 hover:text-brand-600 transition">
            View All
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse ($featuredRestaurants as $restaurant)
            <div class="card-hover bg-white dark:bg-navy-800 rounded-3xl shadow-lg overflow-hidden border border-gray-100 dark:border-gray-700/50" id="restaurant-card-{{ $restaurant->id }}">
                <div class="h-48 bg-gradient-to-br from-brand-400 to-brand-600 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-2 h-2 rounded-full {{ $restaurant->is_active ? 'bg-emerald-400' : 'bg-gray-300' }}"></span>
                        <span class="text-xs font-medium {{ $restaurant->is_active ? 'text-emerald-600' : 'text-gray-400' }}">{{ $restaurant->is_active ? 'Open' : 'Closed' }}</span>
                    </div>
                    <h3 class="text-xl font-bold font-display text-gray-900 dark:text-white mb-2">{{ $restaurant->name }}</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 line-clamp-2">
                        {{ Str::limit($restaurant->description, 100) ?? 'A delightful dining experience awaits you.' }}
                    </p>
                    @if($restaurant->address)
                        <p class="text-xs text-gray-400 flex items-center gap-1 mb-4">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                            {{ $restaurant->address }}
                        </p>
                    @endif
                    <a href="{{ route('restaurants.show', $restaurant->id) }}"
                       class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-brand-500 to-brand-600 rounded-xl shadow hover:shadow-brand-500/30 hover:scale-105 transition-all duration-300">
                        View Menu
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-1 md:col-span-3 text-center py-16 bg-white dark:bg-navy-800 rounded-3xl shadow-lg border border-gray-100 dark:border-gray-700/50">
                <div class="w-20 h-20 rounded-full bg-brand-50 dark:bg-brand-900/20 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-300">No restaurants yet</p>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Be the first restaurant to join FoodieSpot!</p>
            </div>
        @endforelse
    </div>
</section>

{{-- How It Works --}}
<section class="bg-navy-900 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-xs font-semibold text-brand-400 uppercase tracking-widest">Simple & Easy</span>
        <h2 class="text-3xl sm:text-4xl font-bold font-display text-white mt-2 mb-16">How It Works</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="glass-card rounded-3xl p-8 text-center">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-brand-400 to-brand-600 flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Browse</h3>
                <p class="text-gray-400 text-sm leading-relaxed">Explore restaurants and browse through curated food & beverage menus.</p>
            </div>
            <div class="glass-card rounded-3xl p-8 text-center">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Order</h3>
                <p class="text-gray-400 text-sm leading-relaxed">Select your favorite items, customize your order, and checkout seamlessly.</p>
            </div>
            <div class="glass-card rounded-3xl p-8 text-center">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-violet-400 to-violet-600 flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Enjoy</h3>
                <p class="text-gray-400 text-sm leading-relaxed">Get your food delivered to your doorstep and enjoy a delightful meal.</p>
            </div>
        </div>
    </div>
</section>

@endsection