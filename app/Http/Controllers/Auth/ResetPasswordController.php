<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * @param $id
     * @return View|RedirectResponse
     */
    public function resetPasswordPage($id):View|RedirectResponse
    {
        $user = User::where('id', $id)->firstOrFail();

        // Redirect if the password reset code is missing (password already reset)
        if (empty($user->activation_code)) {
            return redirect()->route('login');
        }

        return view('auth.passwords.reset', [
            'id' => $id,
            'email' => $user->email,
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function resetPasswordPost(Request $request): RedirectResponse
    {
        // Validate user input
        $request->validate([
            'id' => 'required|integer|exists:users,id',
            'password' => 'required|min:8|confirmed',
        ], [
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        $user = User::where('id', $request->id)->firstOrFail();

        $updated = PasswordReset::where('userId', $user->id)
            ->where('token', $user->activation_code)
            ->delete();

        if (!$updated) {
            return redirect()->back()->with('error', 'Password reset attempt failed for userId: ' . $user->id);
        }

        $user->activation_code = null;
        $user->password = Hash::make($request->password);
        $user->save();

        Mail::to($user->email)->send(new \App\Mail\PasswordReset($user));

        // Authenticate user after successful password reset
        Auth::login($user);

        return redirect()->route('user.dashboard');
    }
}
