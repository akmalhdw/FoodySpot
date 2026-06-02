@extends('layouts.app')

@section('title', 'Settings — FoodieSpot')

@section('content')
<div class="pt-28 pb-20">
    <div class="max-w-3xl mx-auto px-4">
        <h1 class="text-3xl font-black font-display text-gray-900 dark:text-white mb-8">Account Settings</h1>

        {{-- Personal Information --}}
        <div class="bg-white dark:bg-navy-800 shadow-lg rounded-3xl p-8 mb-6 border border-gray-100 dark:border-gray-700/50">
            <h2 class="text-xl font-bold font-display text-gray-900 dark:text-white mb-6">Personal Information</h2>
            <form method="POST" action="{{ route('profile.update') }}" id="profile-form">
                @csrf
                <div class="grid grid-cols-1 gap-5">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Full Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}"
                               class="w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-xl shadow-sm bg-gray-50 dark:bg-navy-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
                               class="w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-xl shadow-sm bg-gray-50 dark:bg-navy-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="w-36 py-2.5 bg-gradient-to-r from-brand-500 to-brand-600 text-white font-semibold rounded-xl shadow hover:shadow-brand-500/30 transition-all duration-300 hover:scale-105" id="save-profile-btn">
                        Save
                    </button>
                </div>
            </form>
        </div>

        {{-- Preferences --}}
        <div id="preferences" class="bg-white dark:bg-navy-800 shadow-lg rounded-3xl p-8 mb-6 border border-gray-100 dark:border-gray-700/50">
            <h2 class="text-xl font-bold font-display text-gray-900 dark:text-white mb-6">Preferences</h2>
            <form id="preferences-form" method="POST" action="{{ route('profile.preferences.update') }}">
                @csrf
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-semibold text-gray-800 dark:text-white">Dark Mode</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Enable dark theme across the site.</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <label for="dark_mode_toggle" class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="dark_mode_toggle" name="dark_mode" value="1" class="sr-only" {{ $user->dark_mode ? 'checked' : '' }}>
                            <div class="w-12 h-6 bg-gray-200 dark:bg-gray-600 rounded-full shadow-inner transition-colors"></div>
                            <div class="dot absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-transform duration-200 shadow"></div>
                        </label>
                        <button type="submit" class="px-4 py-2 bg-gradient-to-r from-brand-500 to-brand-600 text-white text-sm font-semibold rounded-xl shadow hover:shadow-brand-500/30 transition-all duration-300" id="save-prefs-btn">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>

        {{-- Change Password --}}
        <div class="bg-white dark:bg-navy-800 shadow-lg rounded-3xl p-8 mb-6 border border-gray-100 dark:border-gray-700/50">
            <h2 class="text-xl font-bold font-display text-gray-900 dark:text-white mb-6">Change Password</h2>
            <form method="POST" action="{{ route('profile.password.update') }}" id="password-form">
                @csrf
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Current Password</label>
                        <input id="current_password" name="current_password" type="password" required
                               class="w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-xl shadow-sm bg-gray-50 dark:bg-navy-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition">
                        @error('current_password')
                            <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">New Password</label>
                        <input id="password" name="password" type="password" required
                               class="w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-xl shadow-sm bg-gray-50 dark:bg-navy-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition">
                        @error('password')
                            <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Confirm New Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                               class="w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-xl shadow-sm bg-gray-50 dark:bg-navy-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition">
                    </div>
                    <button type="submit" class="w-44 py-2.5 bg-gradient-to-r from-brand-500 to-brand-600 text-white font-semibold rounded-xl shadow hover:shadow-brand-500/30 transition-all duration-300 hover:scale-105" id="change-pwd-btn">
                        Change Password
                    </button>
                </div>
            </form>
        </div>

        {{-- Delete Account --}}
        <div class="bg-white dark:bg-navy-800 shadow-lg rounded-3xl p-8 border-l-4 border-red-500 border border-gray-100 dark:border-gray-700/50">
            <h2 class="text-xl font-bold font-display text-gray-900 dark:text-white mb-2">Danger Zone</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Permanently delete your account and all associated data. This action cannot be undone.</p>
            <button type="button" id="delete-account-btn" class="px-5 py-2.5 bg-red-600 text-white text-sm font-semibold rounded-xl shadow hover:bg-red-700 transition-all duration-300 hover:scale-105">
                Delete My Account
            </button>
        </div>
    </div>
</div>

{{-- Delete Modal --}}
<div id="delete-modal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50">
    <div class="bg-white dark:bg-navy-800 rounded-3xl p-8 max-w-md w-full mx-4 shadow-2xl border border-gray-100 dark:border-gray-700/50">
        <div class="w-12 h-12 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center mx-auto mb-4">
            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
        </div>
        <h3 class="text-xl font-bold text-center text-gray-900 dark:text-white mb-2">Delete Account?</h3>
        <p class="text-gray-500 dark:text-gray-400 text-sm text-center mb-6">This is permanent. All your restaurants and data will be deleted forever.</p>

        <form id="delete-form" method="POST" action="{{ route('profile.delete-account') }}">
            @csrf
            <div class="mb-5">
                <label for="delete_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Confirm your password</label>
                <input type="password" id="delete_password" name="password" required
                       class="w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-xl bg-gray-50 dark:bg-navy-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-red-500 transition">
                @error('password')
                    <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex gap-3">
                <button type="button" id="cancel-delete-btn" class="flex-1 py-2.5 bg-gray-100 dark:bg-navy-700 text-gray-700 dark:text-white font-semibold rounded-xl hover:bg-gray-200 dark:hover:bg-navy-600 transition">Cancel</button>
                <button type="submit" class="flex-1 py-2.5 bg-red-600 text-white font-semibold rounded-xl hover:bg-red-700 transition">Delete</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Dark mode toggle
    const checkbox = document.getElementById('dark_mode_toggle');
    const dot = document.querySelector('#dark_mode_toggle + div + .dot') || document.querySelector('.dot');

    function setDotPosition() {
        if (!dot) return;
        dot.style.transform = checkbox.checked ? 'translateX(1.5rem)' : 'translateX(0)';
    }

    setDotPosition();

    checkbox && checkbox.addEventListener('change', function () {
        setDotPosition();
        if (checkbox.checked) {
            document.body.classList.add('dark', 'bg-navy-900', 'text-gray-100');
        } else {
            document.body.classList.remove('dark', 'bg-navy-900', 'text-gray-100');
        }

        const form = document.getElementById('preferences-form');
        const token = document.querySelector('input[name=_token]').value;
        const data = new FormData();
        if (checkbox.checked) data.append('dark_mode', '1');
        fetch(form.action, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': token, 'X-Requested-With': 'XMLHttpRequest' },
            body: data
        }).then(r => r.json()).catch(err => console.error(err));
    });

    // Delete modal
    const deleteBtn = document.getElementById('delete-account-btn');
    const deleteModal = document.getElementById('delete-modal');
    const cancelBtn = document.getElementById('cancel-delete-btn');

    deleteBtn && deleteBtn.addEventListener('click', () => deleteModal.classList.remove('hidden'));
    cancelBtn && cancelBtn.addEventListener('click', () => {
        deleteModal.classList.add('hidden');
        document.getElementById('delete_password').value = '';
    });
    deleteModal && deleteModal.addEventListener('click', function(e) {
        if (e.target === deleteModal) {
            deleteModal.classList.add('hidden');
            document.getElementById('delete_password').value = '';
        }
    });
});
</script>
@endsection