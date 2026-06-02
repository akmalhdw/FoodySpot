@extends('layouts.app')

@section('title', 'Log In — FoodieSpot')

@section('content')
<div class="min-h-screen flex items-center justify-center pt-24 pb-12 px-4">
    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-brand-400 to-brand-600 flex items-center justify-center mx-auto mb-4 shadow-lg">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <h1 class="text-3xl font-black font-display text-gray-900 dark:text-white">Welcome Back</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm">Sign in to your FoodieSpot account</p>
        </div>

        <div class="bg-white dark:bg-navy-800 p-8 rounded-3xl shadow-xl border border-gray-100 dark:border-gray-700/50">
            <form class="space-y-5" action="{{ route('login.store') }}" method="POST" id="login-form">
                @csrf

                @error('email')
                    <div class="flex items-center gap-2 px-4 py-3 rounded-xl bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800">
                        <svg class="w-4 h-4 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <p class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</p>
                    </div>
                @enderror

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Email Address</label>
                    <input type="email" id="email" name="email" required autofocus
                           class="w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-xl shadow-sm bg-gray-50 dark:bg-navy-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition"
                           placeholder="you@example.com" value="{{ old('email') }}">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Password</label>
                    <input type="password" id="password" name="password" required
                           class="w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-xl shadow-sm bg-gray-50 dark:bg-navy-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition">
                </div>

                <button type="submit" class="w-full py-3.5 text-white font-bold bg-gradient-to-r from-brand-500 to-brand-600 rounded-xl shadow-lg hover:shadow-brand-500/30 transition-all duration-300 hover:scale-[1.02]" id="login-submit">
                    Sign In
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-semibold text-brand-500 hover:text-brand-600 transition">Create one</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection