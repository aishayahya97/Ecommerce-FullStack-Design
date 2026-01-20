<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Show edit profile page
    public function edit()
    {
        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }

    // Update profile
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'user_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'name' => $request->name,
        ];

        // Handle profile image upload
        if ($request->hasFile('user_img')) {
            // Delete old image if exists
            if ($user->user_img && Storage::disk('public')->exists($user->user_img)) {
                Storage::disk('public')->delete($user->user_img);
            }

            // Store new image
            $path = $request->file('user_img')->store('users', 'public');
            $data['user_img'] = $path;
        }

        $user->update($data);

        return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully.');
    }

public function changePasswordForm() {
    $user = auth()->user();
    return view('admin.profile.change-password', compact('user'));
}

public function updatePassword(Request $request) {
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:6|confirmed',
    ]);

    $user = auth()->user();

    if(!\Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Current password is incorrect.']);
    }

    $user->password = bcrypt($request->new_password);
    $user->save();

    return redirect()->route('admin.profile.edit')->with('success', 'Password updated successfully.');
}
}
