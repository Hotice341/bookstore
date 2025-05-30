<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Random\RandomException;

class UserController extends Controller
{
    // sign-up
    public function signUp()
    {
        return view('auth.register');
    }

    /**
     * @throws RandomException
     */
    public function createUser(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Generate Otp Code
        $otp = random_int(1000, 9999);
        $otpExpiry = Carbon::now()->addMinutes(5);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verification_otp' => $otp,
            'email_verification_otp_expires_at' => $otpExpiry
        ]);

        // Check if the user was successfully created
        if ($user) {
            // Send otp via mail
            Mail::to($user->email)->send(new OtpMail($user->email_verification_otp));
            return redirect()->route('verify-email', ['id' => $user->id]);
        }else{
            // If user creation fails, redirect back with an error message
            return redirect()->back()->with('error', 'Failed to create user. Please try again.');
        }
    }

    /**
     * Sign In
     * @return View
     */
    public function signIn()
    {
        return view('auth.login');
    }

    /**
     * Show Verify Email Page
     * @param $id
     * @return View|RedirectResponse
     */
    public function verifyEmail($id): View|RedirectResponse
    {
        // Get user associated with the userId
        $user = User::where('id', $id)->firstOrFail();

        // Redirect if the email is already verified
        if ($user->email_verified_at != null) {
            return redirect()->route('login');
        }

        // Send data to the view
        return view('auth.verify', [
            'id' => $id,
            'email' => $user->email
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function verifyOtp(Request $request, $id): RedirectResponse
    {
        // Validate input
        $validator = Validator::make($request->all(),
            ['code.*' => 'required'], ['code.*.required' => 'Your email verification code is required.',]
        );

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Implode the code received
        $code = implode('', $request->code);

        // Find the user by ID and OTP code
        $user = User::where('id', $id)
            ->where('email_verification_otp', $code)
            ->first();

        // Handle case where the user or OTP is invalid
        if (!$user) {
            return redirect()->back()->with('error', 'Invalid OTP. Please try again.');
        }

        // Check if OTP has expired
        if (Carbon::now()->greaterThan($user->email_verification_otp_expires_at)) {
            return redirect()->back()->with('error', 'OTP has expired. Request a new one.');
        }

        if ($user) {

            $user->email_verified_at = Carbon::now();
            $user->email_verification_otp = null;
            $user->email_verification_otp_expires_at = null;
            $user->save();

            Auth::login($user);

            return redirect()->route('home')->with('success', 'Email verified successfully!');
        }

        return redirect()->back()->with('error', 'Invalid OTP. Please try again.')->withInput();
    }

    /**
     * Resend OTP to the user.
     *
     * @param string $id The user ID.
     * @return JsonResponse
     */
    public function resendOtp(string $id): JsonResponse
    {
        try {
            // Find the user by ID
            $user = User::find($id);

            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User not found.'
                ], 404);
            }

            // Regenerate OTP and set expiry
            $otp = random_int(1000, 9999);
            $otpExpiry = Carbon::now()->addMinutes(5);

            // Update user's OTP details
            $user->update([
                'email_verification_otp' => $otp,
                'email_verification_otp_expires_at' => $otpExpiry,
            ]);

            // Send OTP via email
            Mail::to($user->email)->send(new OtpMail($otp));

            return response()->json([
                'status' => 'success',
                'message' => 'A new OTP has been sent to your email.',
                'otpExpiry' => $otpExpiry,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e,
            ], 500);
        }
    }

    /**
     * User Dashboard
     * @return View
     */
    public function user_dashboard(): View
    {
        return view('welcome');
    }
}
