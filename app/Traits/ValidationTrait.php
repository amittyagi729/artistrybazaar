<?php
namespace App\Traits;

use Illuminate\Support\Facades\Validator;

trait ValidationTrait{
    protected static function validateShippingTracking($request){
        return Validator::make($request->all(),[
            'shippingQty'=>'required|array',
            'shippingQty.*'=>'required',
            'shippingDate'=>'required|array',
            'shippingDate.*'=>'required',
            'productId'=>'required|array',
            'productId.*'=>'required',
            'orderId'=>'required|array',
            'orderId.*'=>'required',
            'gtotal'=>'required',
            'price_per_piece' => 'required'
        ]);

    }
}
