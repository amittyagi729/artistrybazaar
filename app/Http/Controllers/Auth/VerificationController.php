<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verifyAccount($token)
    {
        $verifyUser = User::where('remember_token', $token)->first();
  
        if(!is_null($verifyUser) ){
            
            if(!$verifyUser->email_verified_at) {
                $verifyUser->email_verified_at = now();
                $verifyUser->save();
                return redirect('/')->with('success', "Your e-mail is verified. You can now login.");
            } else {
                return redirect('/')->with('warning', "Your e-mail is already verified. You can now login.");
            }
        }
    }
}
