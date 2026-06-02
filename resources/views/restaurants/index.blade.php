@extends('layouts.app')

@section('title', 'Explore Restaurants — FoodieSpot')

@section('content')

<div class="pt-28 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Page Header --}}
        <div class="mb-12">
            <span class="text-xs font-semibold text-brand-500 uppercase tracking-widest">Explore</span>
            <h1 class="text-4xl sm:text-5xl font-black font-display text-gray-900 dark:text-white mt-2 mb-4">Restaurants</h1>
            <p class="text-gray-500 dark:text-gray-400 max-w-xl">Discover amazing restaurants and browse their food & beverage menus.</p>
        </div>

        {{-- Restaurant Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($restaurants as $restaurant)
                <div class="card-hover bg-white dark:bg-navy-800 rounded-3xl shadow-lg overflow-hidden border border-gray-100 dark:border-gray-700/50" id="restaurant-card-{{ $restaurant->id }}">
                    <div class="h-44 bg-gradient-to-br from-brand-400 to-brand-600 relative flex items-center justify-center">
                        <svg class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        {{-- Status Badge --}}
                        <div class="absolute top-4 right-4">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold {{ $restaurant->is_active ? 'bg-emerald-500 text-white' : 'bg-gray-500 text-white' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $restaurant->is_active ? 'bg-emerald-200' : 'bg-gray-300' }}"></span>
                                {{ $restaurant->is_active ? 'Open' : 'Closed' }}
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold font-display text-gray-900 dark:text-white mb-2">{{ $restaurant->name }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-3 line-clamp-2">
                            {{ Str::limit($restaurant->description, 100) ?? 'A delightful dining experience.' }}
                        </p>
                        @if($restaurant->address)
                            <p class="text-xs text-gray-400 flex items-center gap-1.5 mb-2">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                {{ $restaurant->address }}
                            </p>
                        @endif
                        @if($restaurant->phone)
                            <p class="text-xs text-gray-400 flex items-center gap-1.5 mb-4">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                {{ $restaurant->phone }}
                            </p>
                        @endif
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-400">{{ $restaurant->foodAndBeverages->count() }} menu items</span>
                            <a href="{{ route('restaurants.show', $restaurant->id) }}"
                               class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold text-white bg-gradient-to-r from-brand-500 to-brand-600 rounded-xl hover:shadow-brand-500/30 hover:scale-105 transition-all duration-300">
                                View Menu
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20 bg-white dark:bg-navy-800 rounded-3xl shadow-lg border border-gray-100 dark:border-gray-700/50">
                    <div class="w-20 h-20 rounded-full bg-brand-50 dark:bg-brand-900/20 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-700 dark:text-gray-300 mb-2">No restaurants found</h3>
                    <p class="text-gray-500 dark:text-gray-400">Check back soon for new listings!</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
