<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Passwordreset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ResetPasswordController extends Controller
{
   
    public function resetPassword($token){

        $currentDatetime = now()->toDateTimeString();
        $tokenData = DB::table('password_resets')->where('token', $token)->first();
        if ($currentDatetime >= $tokenData->expiration_time) {
            return redirect('/')->with('warning','Password reset link has been expired. Please try again.');
        }

        return view('auth.passwords.reset', compact('token'));

    }

    public function update(Request $request)
        {

            $validator = $request->validate([
                'password' => 'required|confirmed',
                'password_confirmation' => 'required'
            ]);
                $request->validate(['password' => 'required','token' => 'required']);
                $password = $request->password;

                $tokenData = DB::table('password_resets')->where('token', $request->token)->first();

                if (!$tokenData) { 
                      return redirect()->back()->with('warning','A Network Error occurred. Please try again.');
                    }
                    $currentDatetime = now()->toDateTimeString();
                    if ($currentDatetime >= $tokenData->expiration_time) {
                        return redirect()->back()->with('warning','Password reset link has been expired. Please try again.');
                    }

                    $user = User::where('email', $tokenData->email)->first();
                    if (!empty($user)){
                            $user->password = Hash::make($password);
                            $user->update(); 
                             return redirect('/')->with('success','Password Changed Successfully');

                     } else {
                        
                        return redirect()->back()->with('warning','A Network Error occurred. Please try again.');
                    }

        }
}
