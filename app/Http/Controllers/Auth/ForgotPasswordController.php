<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Mail\ForgetMail;
use App\Models\User;
use App\Models\Passwordreset;
use Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class ForgotPasswordController extends Controller
{
    public function forget(Request $request)
    {
         if ($request->method() == 'GET') {
             return view('auth.passwords.email');
        }
       
        if ($request->method() == 'POST') {

        $request->validate(['email' => 'required']);
        $email = $request->email;
        $Checkuser = User::where("email", $email)->first();
        if (isset($Checkuser) && !empty($Checkuser)) {
            
                $token = Str::random(60);

                $expirationTime = \Carbon::now()->addMinutes(10)->toDateTimeString();

                $dataCheck = Passwordreset::where(
                    "email",
                    $request->email
                )->first();
                if (!empty($dataCheck)) {
                    $dataCheck->email = $request->email;
                    $dataCheck->token = $token;
                    $dataCheck->expiration_time = $expirationTime;
                    $dataCheck->save();
                } else {
                    Passwordreset::create([
                        "email" => $email,
                        "token" => $token,
                        "expiration_time" => $expirationTime,
                    ]);
                }

                $tokenData = DB::table("password_resets")
                    ->where("email", $email)
                    ->first();
                $user = DB::table("users")
                    ->where("email", $email)
                    ->select("first_name", "email")
                    ->first();

                $link = url("/") . "/password/reset/" . $token;
                 
                try {
                    $userdata = [
                        "name" => $user->first_name,
                        "email" => $user->email,
                        "link" => $link,
                    ];
                   
                    Mail::to($user->email)->send(new ForgetMail($userdata));
                    
                    return redirect()->back()->with('success','Password reset link has been sent to your email. Please check your inbox.');
                } catch (\Exception $e) {
                    
                   return redirect()->back()->with('warning','A Network Error occurred. Please try again.');
                }
           
        } else {
            
            return redirect()->back()->with('warning','The email you have entered does not exist.');
            
        }

    }

    }
}
