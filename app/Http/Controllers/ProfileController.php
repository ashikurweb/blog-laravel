<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
        return view('admin.users.user', compact('user'));
    }

    public function show( User $user )
    {
        $users = User::orderBy('id', 'asc')->paginate(6);
        return view('admin.users.show', compact('users'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the form data
        $fields = $request->validate([
            'name'      => 'nullable|max:255',
            'email'     => 'nullable|max:255|email|unique:users,email,' . $user->id,
            'current_password' => 'nullable',
            'new_password' => 'nullable|min:4',
            'new_password_confirmation' => 'nullable|same:new_password',
            'profile_image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,webp|max:9000'
        ]);

        // Profile image update
        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            $user->profile_image = $request->file('profile_image')->store('profile/', 'public');
            $user->save();
        }

        // Password update (only if current_password is provided)
        if ($request->filled('current_password')) {
            // Check if the current password matches
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors([
                    'current_password' => 'The current password is incorrect.'
                ]);
            }

            // Validate and update the new password if provided
            if ($request->filled('new_password') && $request->filled('new_password_confirmation')) {
                $request->validate([
                    'new_password' => 'required|min:4|confirmed',
                ]);

                // Update password
                $user->password = Hash::make($request->new_password);
            }
        }

        // Update name and email if provided
        if ($request->filled('name')) {
            $user->name = $request->name;
        }

        if ($request->filled('email')) {
            $user->email = $request->email;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }


    public function destroy (User $user)
    {
        $user = Auth::user();
        $user->delete();
        return redirect()->to('/')->with('warning', 'Account deleted successfully');
    }

}
