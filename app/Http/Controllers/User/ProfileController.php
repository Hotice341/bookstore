<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\PasswordReset;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * @return View
     */
    public function user_profile(): View
    {
        $user = User::with('profile')->find(Auth::id());
        return view('profile.user_profile', ['user' => $user]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function user_profile_edit(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        // Update a user's name
        $user->update(['name' => $request->name]);

        // Prepare profile data
        $data = $request->only('phone', 'address', 'bio');

        // Handle profile image upload
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            if ($user->profile && $user->profile->profile_picture && file_exists
                (public_path('profile/' . $user->profile->profile_picture))) {
                unlink(public_path('profile/'. $user->profile->profile_picture));
            }

            // Save a new image
            $file->move(public_path('profile/'), $filename);
            $data['profile_picture'] = $filename;
        }

        UserProfile::updateOrCreate(
            ['user_id' => $user->id],
            $data
        );

        return back()->with('success', 'Your profile information has been updated successfully.');
    }

    /**
     * @return RedirectResponse
     */
    public function user_profile_delete(): RedirectResponse
    {
        $user = User::with('profile')->find(Auth::id());

        // Delete the profile picture if it exists
        if ($user->profile && $user->profile->profile_picture && file_exists(public_path('profile/' . $user->profile->profile_picture))) {
            unlink(public_path('profile/' . $user->profile->profile_picture));
        }

        // Set the profile image to null in the database
        if ($user->profile) {
            $user->profile->update([
                'profile_picture' => null
            ]);
        }

        // Redirect back with a success message
        return redirect()->back()
            ->with('success', 'Profile picture removed successfully.');
    }

    public function user_profile_password(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Verify the current password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'The current password is incorrect.')->withInput();
        }

        // Update the user's password
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        // Send Email
        Mail::to($user->email)->send(new PasswordReset($user));

        return redirect()->back()->with('success', 'Your password has been updated successfully.');
    }
}
