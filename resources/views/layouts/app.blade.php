<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'FoodieSpot — Discover the finest restaurants and food & beverages near you. Order delivery in minutes.')">
    <title>@yield('title', 'FoodieSpot — Restaurant & Food Delivery')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'brand': {
                            50:  '#fff7ed',
                            100: '#ffedd5',
                            200: '#fed7aa',
                            300: '#fdba74',
                            400: '#fb923c',
                            500: '#f97316',
                            600: '#ea580c',
                            700: '#c2410c',
                            800: '#9a3412',
                            900: '#7c2d12',
                        },
                        'navy': {
                            700: '#1e293b',
                            800: '#0f172a',
                            900: '#020617',
                        },
                    },
                    fontFamily: {
                        'display': ['Outfit', 'sans-serif'],
                        'body': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Outfit:wght@400;500;600;700;800;900&display=swap');

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #fafaf9;
            overflow-x: hidden;
        }

        .font-display { font-family: 'Outfit', sans-serif; }

        /* Hero section */
        .hero-section {
            background-image: url("{{ asset('images/hero-food.png') }}");
            background-size: cover;
            background-position: center;
            min-height: 85vh;
            position: relative;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(15,23,42,0.82) 0%, rgba(124,45,18,0.55) 100%);
        }

        /* Glassmorphism card */
        .glass-card {
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,0.12);
        }

        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #fb923c, #f97316, #ea580c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Smooth scroll */
        html { scroll-behavior: smooth; }

        /* Animated underline on nav links */
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #fb923c, #ea580c);
            border-radius: 4px;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }

        /* Card hover lift */
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        }

        /* Pulse glow on CTA button */
        .btn-glow {
            position: relative;
            overflow: hidden;
        }
        .btn-glow::before {
            content: '';
            position: absolute;
            inset: -2px;
            background: linear-gradient(135deg, #fb923c, #ea580c, #fb923c);
            border-radius: inherit;
            z-index: -1;
            filter: blur(8px);
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        .btn-glow:hover::before {
            opacity: 0.6;
        }

        /* Fade-in animation */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.7s ease-out forwards;
        }
        .animate-delay-100 { animation-delay: 0.1s; }
        .animate-delay-200 { animation-delay: 0.2s; }
        .animate-delay-300 { animation-delay: 0.3s; }
        .animate-delay-400 { animation-delay: 0.4s; }
    </style>
</head>
<body class="{{ auth()->check() && auth()->user()->dark_mode ? 'dark bg-navy-900 text-gray-100' : 'bg-stone-50 text-gray-900' }}">

    {{-- Flash Messages --}}
    @if (session('success'))
        <div id="flash-message" class="fixed top-5 right-5 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white px-6 py-4 rounded-2xl shadow-2xl z-50 flex items-center gap-3 border border-emerald-400/30 animate-fade-in-up">
            <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <div>
                <h4 class="font-bold text-sm">Success!</h4>
                <p class="text-sm text-emerald-100">{{ session('success') }}</p>
            </div>
            <button onclick="document.getElementById('flash-message').remove()" class="ml-4 text-emerald-200 hover:text-white">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <script>setTimeout(function() { const f = document.getElementById('flash-message'); if(f){ f.style.opacity='0'; f.style.transition='opacity 0.5s'; setTimeout(()=>f.remove(),500); } }, 4000);</script>
    @endif

    @if (session('logout'))
        <div id="flash-message-red" class="fixed top-5 right-5 bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-4 rounded-2xl shadow-2xl z-50 flex items-center gap-3 border border-red-400/30 animate-fade-in-up">
            <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            </div>
            <div>
                <h4 class="font-bold text-sm">Logged Out</h4>
                <p class="text-sm text-red-100">{{ session('logout') }}</p>
            </div>
            <button onclick="document.getElementById('flash-message-red').remove()" class="ml-4 text-red-200 hover:text-white">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <script>setTimeout(function() { const f = document.getElementById('flash-message-red'); if(f){ f.style.opacity='0'; f.style.transition='opacity 0.5s'; setTimeout(()=>f.remove(),500); } }, 4000);</script>
    @endif

    {{-- Navigation --}}
    <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" id="main-header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex justify-between items-center py-4">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-brand-400 to-brand-600 flex items-center justify-center shadow-lg group-hover:shadow-brand-400/40 transition-shadow duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold font-display tracking-tight text-white" id="logo-text">FoodieSpot</span>
                </a>

                {{-- Desktop Nav --}}
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="nav-link text-sm font-medium text-white/80 hover:text-white transition" id="nav-home">Home</a>
                    <a href="{{ route('restaurants.index') }}" class="nav-link text-sm font-medium text-white/80 hover:text-white transition" id="nav-explore">Explore</a>
                    <a href="{{ route('about') }}" class="nav-link text-sm font-medium text-white/80 hover:text-white transition" id="nav-about">About</a>

                    @guest
                        <a href="{{ route('login') }}" class="text-sm font-medium text-white/80 hover:text-white transition" id="nav-login">Log In</a>
                        <a href="{{ route('register') }}" class="px-5 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-brand-500 to-brand-600 rounded-xl shadow-lg hover:shadow-brand-500/30 transition-all duration-300 hover:scale-105" id="nav-register">
                            Get Started
                        </a>
                    @endguest

                    @auth
                        <div class="relative group">
                            <button type="button" class="flex items-center gap-2 text-sm focus:outline-none" id="user-menu-btn">
                                <div class="h-9 w-9 rounded-full bg-gradient-to-br from-brand-400 to-brand-600 flex items-center justify-center text-white font-bold text-sm uppercase shadow-md ring-2 ring-white/20">
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                </div>
                                <span class="hidden lg:block font-medium text-white/90">{{ auth()->user()->name }}</span>
                                <svg class="w-4 h-4 text-white/60 group-hover:text-white transition transform group-hover:rotate-180 duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>

                            <div class="absolute right-0 mt-3 w-56 bg-white dark:bg-navy-800 rounded-2xl shadow-2xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 border border-gray-100 dark:border-gray-700" id="user-dropdown">
                                <div class="px-4 py-3 border-b border-gray-100 dark:border-gray-700">
                                    <p class="text-xs text-gray-400">Signed in as</p>
                                    <p class="text-sm font-semibold text-gray-900 dark:text-white truncate">{{ auth()->user()->email }}</p>
                                </div>
                                <a href="{{ route('profile.show') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-brand-50 dark:hover:bg-navy-700 transition" id="dropdown-profile">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    Profile
                                </a>
                                <a href="{{ route('profile.settings') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-brand-50 dark:hover:bg-navy-700 transition" id="dropdown-settings">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    Settings
                                </a>
                                <div class="border-t border-gray-100 dark:border-gray-700 my-1"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-3 w-full px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 transition" id="dropdown-logout">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                        Log Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>

                {{-- Mobile menu button --}}
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-white/80 hover:text-white focus:outline-none p-2 rounded-lg hover:bg-white/10 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    </button>
                </div>
            </nav>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="hidden md:hidden bg-navy-800/95 backdrop-blur-lg border-t border-white/10">
            <div class="px-4 py-4 space-y-2">
                <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl text-sm font-medium text-white/80 hover:text-white hover:bg-white/10 transition">Home</a>
                <a href="{{ route('restaurants.index') }}" class="block px-4 py-3 rounded-xl text-sm font-medium text-white/80 hover:text-white hover:bg-white/10 transition">Explore Restaurants</a>
                <a href="{{ route('about') }}" class="block px-4 py-3 rounded-xl text-sm font-medium text-white/80 hover:text-white hover:bg-white/10 transition">About</a>

                @guest
                    <a href="{{ route('login') }}" class="block px-4 py-3 rounded-xl text-sm font-medium text-white/80 hover:text-white hover:bg-white/10 transition">Log In</a>
                    <a href="{{ route('register') }}" class="block px-4 py-3 rounded-xl text-sm font-medium text-white bg-gradient-to-r from-brand-500 to-brand-600 text-center mt-2">Get Started</a>
                @endguest

                @auth
                    <a href="{{ route('profile.show') }}" class="block px-4 py-3 rounded-xl text-sm font-medium text-white/80 hover:text-white hover:bg-white/10 transition">My Profile</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-3 rounded-xl text-sm font-medium text-red-400 hover:text-red-300 hover:bg-white/10 transition">Log Out</button>
                    </form>
                @endauth
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-navy-900 text-white mt-20 border-t border-white/5">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-brand-400 to-brand-600 flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold font-display">FoodieSpot</span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">Discover the finest restaurants and food & beverages. Order delivery, explore menus, and savor every bite.</p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-300 uppercase tracking-wider mb-4">Quick Links</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-brand-400 text-sm transition">Home</a></li>
                        <li><a href="{{ route('restaurants.index') }}" class="text-gray-400 hover:text-brand-400 text-sm transition">Restaurants</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-brand-400 text-sm transition">About Us</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-300 uppercase tracking-wider mb-4">Contact</h3>
                    <ul class="space-y-3 text-gray-400 text-sm">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            hello@foodiespot.com
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Jakarta, Indonesia
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-white/10 mt-12 pt-8 text-center">
                <p class="text-gray-500 text-sm">&copy; {{ date('Y') }} FoodieSpot. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Mobile menu toggle
            const btn = document.getElementById('mobile-menu-button');
            const menu = document.getElementById('mobile-menu');
            if (btn && menu) {
                btn.addEventListener('click', () => menu.classList.toggle('hidden'));
            }

            // Sticky header scroll effect
            const header = document.getElementById('main-header');
            const logoText = document.getElementById('logo-text');
            let lastScroll = 0;

            window.addEventListener('scroll', () => {
                const scroll = window.scrollY;
                if (scroll > 60) {
                    header.classList.add('bg-navy-800/95', 'backdrop-blur-lg', 'shadow-2xl');
                    header.style.borderBottom = '1px solid rgba(255,255,255,0.05)';
                } else {
                    header.classList.remove('bg-navy-800/95', 'backdrop-blur-lg', 'shadow-2xl');
                    header.style.borderBottom = 'none';
                }
                lastScroll = scroll;
            });
        });
    </script>
</body>
</html>