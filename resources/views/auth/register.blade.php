@extends('layouts.app')

@section('title', 'Create Account — FoodieSpot')

@section('content')
<div class="min-h-screen flex items-center justify-center pt-24 pb-12 px-4">
    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-brand-400 to-brand-600 flex items-center justify-center mx-auto mb-4 shadow-lg">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
            </div>
            <h1 class="text-3xl font-black font-display text-gray-900 dark:text-white">Join FoodieSpot</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm">Create your account and start exploring</p>
        </div>

        <div class="bg-white dark:bg-navy-800 p-8 rounded-3xl shadow-xl border border-gray-100 dark:border-gray-700/50">
            <form class="space-y-5" action="{{ route('register.store') }}" method="POST" id="register-form">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Full Name</label>
                    <input type="text" id="name" name="name" required autofocus
                           class="w-full px-4 py-3 border @error('name') border-red-400 @else border-gray-200 dark:border-gray-600 @enderror rounded-xl shadow-sm bg-gray-50 dark:bg-navy-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition"
                           value="{{ old('name') }}">
                    @error('name')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Email Address</label>
                    <input type="email" id="email" name="email" required
                           class="w-full px-4 py-3 border @error('email') border-red-400 @else border-gray-200 dark:border-gray-600 @enderror rounded-xl shadow-sm bg-gray-50 dark:bg-navy-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition"
                           value="{{ old('email') }}">
                    @error('email')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Password</label>
                    <input type="password" id="password" name="password" required
                           class="w-full px-4 py-3 border @error('password') border-red-400 @else border-gray-200 dark:border-gray-600 @enderror rounded-xl shadow-sm bg-gray-50 dark:bg-navy-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition">
                    @error('password')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                           class="w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-xl shadow-sm bg-gray-50 dark:bg-navy-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition">
                </div>

                <button type="submit" class="w-full py-3.5 text-white font-bold bg-gradient-to-r from-brand-500 to-brand-600 rounded-xl shadow-lg hover:shadow-brand-500/30 transition-all duration-300 hover:scale-[1.02]" id="register-submit">
                    Create Account
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-semibold text-brand-500 hover:text-brand-600 transition">Sign in</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection