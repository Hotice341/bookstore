<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Random\RandomException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @return RedirectResponse
     * @throws RandomException
     */
    public function authenticated(): RedirectResponse
    {
        $user = Auth::user();

        if ($user->active == 0) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Your account has been banned, contact the administrator.');
        }

        if (in_array($user->role_as, [1, 2, 3])){
            return redirect('admin/dashboard')->with('success', 'You have successfully logged in');
        }elseif(Auth::user()->role_as == 0){

            $user = Auth::user();

            if ($user->email_verified_at == NULL){
                $otp = random_int(1000, 9999);

                $user->update(['email_verification_otp' => $otp]);

                // Send otp via mail
                Mail::to($user->email)->send(new OtpMail($user->email_verification_otp));
                Auth::logout();
                return redirect()->route('verify-email', ['id' => $user->id])->with('error', 'Please verify your email address');
            }else{
                return redirect('user/dashboard')->with('success', 'You have successfully logged in');
            }
        }else{
            return redirect('login')->with('error', 'Please enter valid role');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('throttle:5,1')->only('login');
        $this->middleware('auth')->only('logout');
    }
}
