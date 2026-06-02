@extends('layouts.app')

@section('title', 'My Profile — FoodieSpot')

@section('content')
<div class="pt-28 pb-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-navy-800 shadow-xl rounded-3xl overflow-hidden border border-gray-100 dark:border-gray-700/50">

            {{-- Cover --}}
            <div class="h-36 bg-gradient-to-r from-brand-500 via-brand-600 to-brand-700 relative"></div>

            <div class="px-8 pb-8">
                {{-- Avatar --}}
                <div class="relative -mt-16 mb-6">
                    <div class="h-32 w-32 rounded-3xl bg-white dark:bg-navy-800 p-1.5 mx-auto sm:mx-0 shadow-xl">
                        <div class="h-full w-full rounded-2xl bg-gradient-to-br from-brand-400 to-brand-600 flex items-center justify-center text-5xl text-white font-black font-display">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                    </div>
                </div>

                <div class="sm:flex sm:items-end sm:justify-between">
                    <div>
                        <h1 class="text-3xl font-black font-display text-gray-900 dark:text-white">{{ $user->name }}</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $user->email }}</p>
                        <p class="mt-2 text-xs text-gray-400 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Member since {{ $user->created_at->format('M d, Y') }}
                        </p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <a href="{{ route('profile.settings') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-100 dark:bg-navy-700 border border-gray-200 dark:border-gray-600 rounded-xl font-semibold text-xs text-gray-700 dark:text-white uppercase tracking-wider hover:bg-gray-200 dark:hover:bg-navy-600 transition" id="edit-profile-btn">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Settings
                        </a>
                    </div>
                </div>

                {{-- Activity --}}
                <div class="mt-10 border-t border-gray-100 dark:border-gray-700/50 pt-8">
                    <h3 class="text-lg font-bold font-display text-gray-900 dark:text-white mb-6">My Activity</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-gray-50 dark:bg-navy-900 rounded-2xl p-6 border border-gray-100 dark:border-gray-700/50">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 rounded-xl bg-brand-100 dark:bg-brand-900/30 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/></svg>
                                </div>
                                <div>
                                    <p class="text-2xl font-black font-display text-gray-900 dark:text-white">{{ $user->restaurants->count() }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Restaurants</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 dark:bg-navy-900 rounded-2xl p-6 border border-gray-100 dark:border-gray-700/50">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 rounded-xl bg-emerald-100 dark:bg-emerald-900/30 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                </div>
                                <div>
                                    <p class="text-2xl font-black font-display text-gray-900 dark:text-white">{{ $user->deliveries->count() }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Deliveries</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection