@extends('layouts.app')

@section('title', $restaurant->name . ' — FoodieSpot')

@section('content')

<div class="pt-28 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-gray-400 mb-8">
            <a href="{{ route('restaurants.index') }}" class="hover:text-brand-500 transition">Restaurants</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-gray-600 dark:text-gray-300">{{ $restaurant->name }}</span>
        </nav>

        {{-- Restaurant Header --}}
        <div class="bg-white dark:bg-navy-800 rounded-3xl shadow-xl overflow-hidden border border-gray-100 dark:border-gray-700/50 mb-10">
            <div class="h-56 bg-gradient-to-br from-brand-400 via-brand-500 to-brand-700 relative flex items-center justify-center">
                <svg class="w-24 h-24 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                <div class="absolute top-6 right-6">
                    <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full text-sm font-semibold {{ $restaurant->is_active ? 'bg-emerald-500 text-white' : 'bg-gray-500 text-white' }}">
                        <span class="w-2 h-2 rounded-full {{ $restaurant->is_active ? 'bg-emerald-200 animate-pulse' : 'bg-gray-300' }}"></span>
                        {{ $restaurant->is_active ? 'Open Now' : 'Currently Closed' }}
                    </span>
                </div>
            </div>
            <div class="p-8 sm:p-10">
                <h1 class="text-3xl sm:text-4xl font-black font-display text-gray-900 dark:text-white mb-3">{{ $restaurant->name }}</h1>
                @if($restaurant->description)
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6 max-w-3xl">{{ $restaurant->description }}</p>
                @endif
                <div class="flex flex-wrap gap-6 text-sm">
                    @if($restaurant->address)
                        <div class="flex items-center gap-2 text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                            {{ $restaurant->address }}
                        </div>
                    @endif
                    @if($restaurant->phone)
                        <div class="flex items-center gap-2 text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            {{ $restaurant->phone }}
                        </div>
                    @endif
                    <div class="flex items-center gap-2 text-gray-500 dark:text-gray-400">
                        <svg class="w-4 h-4 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        {{ $menuItems->count() }} menu items
                    </div>
                </div>
            </div>
        </div>

        {{-- Menu Section --}}
        <div class="mb-6">
            <h2 class="text-2xl font-bold font-display text-gray-900 dark:text-white mb-2">Menu</h2>
            <p class="text-gray-500 dark:text-gray-400 text-sm">Food & Beverages available at this restaurant</p>
        </div>

        @if($menuItems->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($menuItems as $item)
                    <div class="card-hover bg-white dark:bg-navy-800 rounded-2xl shadow-md p-6 border border-gray-100 dark:border-gray-700/50" id="menu-item-{{ $item->id }}">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $item->name }}</h3>
                                @if($item->category)
                                    <span class="inline-block mt-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-brand-50 text-brand-600 dark:bg-brand-900/30 dark:text-brand-400">
                                        {{ ucfirst($item->category) }}
                                    </span>
                                @endif
                            </div>
                            <span class="text-lg font-black font-display gradient-text whitespace-nowrap ml-4">
                                Rp {{ number_format($item->price, 0, ',', '.') }}
                            </span>
                        </div>
                        @if($item->description)
                            <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed mb-3">{{ $item->description }}</p>
                        @endif
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full {{ $item->is_available ? 'bg-emerald-400' : 'bg-red-400' }}"></span>
                            <span class="text-xs font-medium {{ $item->is_available ? 'text-emerald-600 dark:text-emerald-400' : 'text-red-600 dark:text-red-400' }}">
                                {{ $item->is_available ? 'Available' : 'Sold Out' }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16 bg-white dark:bg-navy-800 rounded-3xl shadow-lg border border-gray-100 dark:border-gray-700/50">
                <div class="w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"/></svg>
                </div>
                <p class="text-gray-500 dark:text-gray-400 font-medium">No menu items yet</p>
                <p class="text-sm text-gray-400 mt-1">This restaurant hasn't added any items to their menu.</p>
            </div>
        @endif
    </div>
</div>

@endsection
