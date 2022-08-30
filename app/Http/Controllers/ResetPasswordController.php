<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;
use App\Notifications\ResetPasswordRequest;

class ResetPasswordController extends Controller
{
    /**
     * Create token password reset.
     *
     * @param  ResetPasswordRequest $request
     * @return JsonResponse
     */
    public function sendMail(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        $passwordReset = PasswordReset::updateOrCreate([
            'email' => $user->email,
        ], [
            'token' => Str::random(60),
        ]);
        if ($passwordReset) {
            $user->notify(new ResetPasswordRequest($passwordReset->token));
        }
  
        return response()->json([
        'message' => __('message.emailreset')
        ]);
    }

    public function reset(Request $request, $token)
    {
        $params = $request->all();
        $passwordReset = PasswordReset::where('token', $token)->firstOrFail();
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();

            return response()->json([
                'message' => __('message.resettoken'),
            ], 422);
        }
        $user = User::where('email', $passwordReset->email)->firstOrFail();

        $updatePasswordUser = $user->update(['password' => Hash::make($params['password'])]);
        $passwordReset->delete();

        return response()->json([
            'status' => __('message.success')
            
        ]);
    }
}