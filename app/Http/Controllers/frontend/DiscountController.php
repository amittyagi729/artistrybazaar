<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiscountedUser;
use Illuminate\Support\Str;
use Session;
use App\Mail\CouponMail;
use Mail;
use Illuminate\Support\Facades\Auth;
class DiscountController extends Controller
{
    public function store(Request $request)
    {
        if (empty($request->email)) {
            return response()->json(['isEmail' => false,
            'status' => 409]);
        }
        $ifExist = DiscountedUser::where('email', $request->email)->first();
        if($ifExist){
            return response()->json(['email_exists' => true,
            'email' => $request->email,
            'status' => 401]);
        }
        try {
            $couponCode = $this->generateUniqueCouponCode();
            DiscountedUser::create([
                'email' => $request->email,
                'coupon_code' => $couponCode
            ]);
        
            Mail::to($request->email)->send(new  CouponMail($couponCode, $request->email));

        } catch (\Exception $e) {
         
            return response()->json([
                'error' => $e->getMessage()]);
        }
        
        return response()->json([
            'email_exists' => false,
            'email' => $request->email,
         'status' => 200], 200);

    }

   private function generateUniqueCouponCode($length = 8) {
    $couponCode = Str::random($length);

    while (DiscountedUser::where('coupon_code', $couponCode)->exists()) {
        $couponCode = Str::random($length); 
    }

    return $couponCode;
}

    public function couponCheck(Request $request)
    {
        if (Auth::check()) {
        $coupon = DiscountedUser::where('coupon_code', $request->input('coupon'))->where('email', auth()->user()->email)->first();
        if($coupon){
            if($coupon->order_placed === 0){
                return response()->json(['status' => 'success', 'coupon' => $request->input('coupon')]);
            }else if($coupon->order_placed === 1){
                return response()->json(['status' => 'expired']);
            }
           
        }
    }else{
        $guestUserEmail = Session::get('guestUserEmail');
        $coupon = DiscountedUser::where('coupon_code', $request->input('coupon'))->where('email', $guestUserEmail)->first();
        if($coupon){
            if($coupon->order_placed === 0){
                return response()->json(['status' => 'success', 'coupon' => $request->input('coupon')]);
            }else if($coupon->order_placed === 1){
                return response()->json(['status' => 'expired']);
            }
           
        }
    }
        return response()->json(['status' => 'error']);
    }

    public function authCheck(Request $request){
        $isAuthenticated = auth()->check();
        $couponEmail = Session::get('couponEmail');
        return response()->json(['status' => $isAuthenticated ? 'success' : 'error', 'couponEmail' => $couponEmail ? 'success' : 'error']);
    }

}