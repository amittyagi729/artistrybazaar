<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Orders;

class UserDashboardController extends Controller
{
    public function dashboard(){

        if(Auth::user()){
            $user =Auth::user();
            $userId = $user->id;
            $orders =  Orders::where('user_id', $userId)->get();
            return view('frontend.my-account',['orders'=>$orders, 'user'=>$user]);

        }else{
            return redirect()->back();
        }
    }
}
