<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Random\RandomException;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function forgotPassword(): View
    {
        return view('auth.passwords.email');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws RandomException
     */
    public function forgotPasswordPost(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Email is not valid.',
            'email.exists' => 'We can\'t find a user with that e-mail address.',
        ]);

        $user = User::where('email', $request->email)->firstOrFail();
        if (!$user) {
            return redirect()->back()->with('error', 'We can\'t find a user with that e-mail address.');
        }

        $otp = random_int(1000, 9999);
        $otpExpiry = Carbon::now()->addMinutes(5);

        $user->activation_code = $otp;
        $user->save();

        PasswordReset::updateOrCreate(
            ['userId' => $user->id],
            ['token' => $otp, 'reset_otp_expires_at' => $otpExpiry]
        );

        // Send otp via mail
        Mail::to($user->email)->send(new OtpMail($otp));

        return redirect()->route('password.confirm', ['id' => $user->id]);
    }

    /**
     * @param $id
     * @return View|RedirectResponse
     */
    public function confirmPassword($id): View|RedirectResponse
    {
        $user = User::where('id', $id)->firstOrFail();

        // Redirect if the password reset code is missing (password already reset)
        if (empty($user->activation_code)) {
            return redirect()->route('login');
        }

        return view('auth.passwords.confirm', [
            'id' => $id,
            'email' => $user->email,
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function confirmPasswordPost(Request $request): RedirectResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|string',
                'code.*' => 'required'
            ],
            ['code.*.required' => 'Your password reset OTP is required.']
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Convert an OTP input array into a single string
        $code = implode('', $request->code);

        $token = PasswordReset::where('userId', $request->id)
            ->where('token', $code)
            ->first();

        if (!$token) {
            return redirect()->back()->with('error', 'Invalid OTP. Please try again.');
        }

        if (Carbon::now()->greaterThan($token->reset_otp_expires_at)) {
            return redirect()->back()->with('error', 'OTP has expired. Request a new one.');
        }

        $user = User::where('id', $request->id)->firstOrFail();

        return redirect()->route('password.reset', ['id' => $user->id]);
    }

    /**
     * Resend OTP via AJAX for password reset.
     *
     * @param string $id
     * @return JsonResponse
     * @throws RandomException
     */
    public function resendResetOTP(string $id): JsonResponse
    {
        try {
            $user = User::where('id', $id)->first();

            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User not found.'
                ], 404);
            }

            // Regenerate OTP and expiry time (valid for 5 minutes)
            $otp = random_int(1000, 9999);
            $otpExpiry = Carbon::now()->addMinutes(5);

            // Update OTP on the user's table
            $user->activation_code = $otp;
            $user->save();

            // Store/update OTP in the password_resets table
            $this->updateOrCreatePasswordReset($user, $otp, $otpExpiry);

            return response()->json([
                'status' => 'success',
                'message' => 'A new OTP has been sent to your email.',
                'otpExpiry' => $otpExpiry
            ]);
        } catch (Exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }

    /**
     * @param $user
     * @param int $otp
     * @param Carbon $otpExpiry
     * @return void
     */
    private function updateOrCreatePasswordReset($user, int $otp, Carbon $otpExpiry): void
    {
        PasswordReset::updateOrCreate(
            ['userId' => $user->id],
            ['token' => $otp, 'reset_otp_expires_at' => $otpExpiry]
        );

        // Send otp via mail
        Mail::to($user->email)->send(new OtpMail($otp));
    }
}
