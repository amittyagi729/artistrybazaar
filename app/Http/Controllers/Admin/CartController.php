<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->input('f');
        if($filter){
            $cart = Cart::where('type', 'c')->orderBy('user_id')->latest()->whereDate('created_at', '=', $filter)->paginate(25);
            $usercart = Cart::where('type', 'c')->where('user_id', '!=' , null)->latest('created_at')->whereDate('created_at', '=', $filter)->paginate(25);
            $deletedUserCart = Cart::onlyTrashed()
            ->where('type', 'c')
            ->whereNotNull('user_id')
            ->whereDate('created_at', '=', $filter)
            ->latest('created_at')
            ->paginate(25);
        }else{
            $cart = Cart::where('type', 'c')->where('user_id', '=' , null)->orderBy('user_id')->latest()->paginate(25);
            $usercart = Cart::where('type', 'c')
            ->whereNotNull('user_id')
            ->latest('created_at')
            ->paginate(25);

            $deletedUserCart = Cart::onlyTrashed()
    ->where('type', 'c')
    ->whereNotNull('user_id')
    ->latest('created_at')
    ->paginate(25);

        

        }
        return view('admin.cart.index',['carts' => $cart, 'usercart' => $usercart, 'deletedUserCart' => $deletedUserCart]);
    }
    public function wishlist(Request $request)
    {
        $filter = $request->input('f');
        if($filter){
            $wishlist = Cart::where('type', 'w')->orderBy('user_id')->latest()->whereDate('created_at', '=', $filter)->paginate(25);
        }else{
        $wishlist = Cart::where('type', 'w')->orderBy('user_id')->latest()->paginate(25);
        }
        return view('admin.cart.wishlist',['carts' => $wishlist]);
    }


}