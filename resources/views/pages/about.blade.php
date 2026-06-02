@extends('layouts.app')

@section('title', 'About Us — FoodieSpot')
@section('meta_description', 'Learn about FoodieSpot — connecting food lovers with the best restaurants and delivering joy to your doorstep.')

@section('content')

<div class="pt-28 pb-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header --}}
        <div class="text-center mb-16">
            <span class="text-xs font-semibold text-brand-500 uppercase tracking-widest">Our Story</span>
            <h1 class="text-4xl sm:text-5xl font-black font-display text-gray-900 dark:text-white mt-3 mb-6">About FoodieSpot</h1>
            <p class="text-lg text-gray-500 dark:text-gray-400 max-w-2xl mx-auto">
                Connecting food lovers with the finest restaurants. We believe every meal should be an experience worth savoring.
            </p>
        </div>

        {{-- Mission Card --}}
        <div class="bg-white dark:bg-navy-800 rounded-3xl shadow-xl p-8 sm:p-12 mb-8 border border-gray-100 dark:border-gray-700/50">
            <h2 class="text-2xl font-bold font-display gradient-text mb-6">Our Mission</h2>
            <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                FoodieSpot was born from a simple idea: everyone deserves access to great food. We connect passionate restaurant owners with hungry food lovers, creating a seamless bridge between kitchens and dining tables across the city.
            </p>
            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                Whether you're craving a hearty meal, a refreshing beverage, or discovering a new favorite restaurant — FoodieSpot makes it effortless. Our platform empowers restaurant owners to showcase their menus and reach new customers, while giving food lovers an intuitive way to explore, order, and enjoy.
            </p>
        </div>

        {{-- Features Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
            <div class="bg-white dark:bg-navy-800 rounded-2xl shadow-lg p-8 border border-gray-100 dark:border-gray-700/50 card-hover">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-brand-400 to-brand-600 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">For Restaurants</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed">Register your restaurant, manage your menu, and reach thousands of potential customers.</p>
            </div>
            <div class="bg-white dark:bg-navy-800 rounded-2xl shadow-lg p-8 border border-gray-100 dark:border-gray-700/50 card-hover">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">For Food Lovers</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed">Browse restaurants, explore menus, and place delivery orders — all from the comfort of your home.</p>
            </div>
            <div class="bg-white dark:bg-navy-800 rounded-2xl shadow-lg p-8 border border-gray-100 dark:border-gray-700/50 card-hover">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-violet-400 to-violet-600 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Fast Delivery</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed">From order to doorstep — our delivery system ensures your food arrives fresh and on time.</p>
            </div>
            <div class="bg-white dark:bg-navy-800 rounded-2xl shadow-lg p-8 border border-gray-100 dark:border-gray-700/50 card-hover">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Secure & Reliable</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed">Your data and transactions are protected with enterprise-grade security.</p>
            </div>
        </div>
    </div>
</div>

@endsection