<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserProfileController extends Controller
{
    /**
     * Profile Dashboard — shows user info and activity stats.
     */
    public function show()
    {
        $user = Auth::user();

        return view('profile.show', compact('user'));
    }

    /**
     * Account Settings page.
     */
    public function settings()
    {
        $user = Auth::user();

        return view('profile.settings', compact('user'));
    }

    /**
     * Update Preferences (e.g., dark mode).
     */
    public function updatePreferences(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'dark_mode' => 'nullable|in:1',
        ]);

        $user->dark_mode = isset($validated['dark_mode']) && $validated['dark_mode'] == '1';
        $user->save();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'dark_mode' => (bool)$user->dark_mode]);
        }

        return redirect()->back()->with('success', 'Preferences updated.');
    }

    /**
     * Update Profile (name, email).
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'user' => $user]);
        }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Change Password.
     */
    public function changePassword(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->password = Hash::make($validated['password']);
        $user->save();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->back()->with('success', 'Password changed successfully.');
    }

    /**
     * Delete Account (requires password confirmation).
     */
    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'password' => 'required|current_password',
        ]);

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Your account has been deleted successfully.');
    }
}