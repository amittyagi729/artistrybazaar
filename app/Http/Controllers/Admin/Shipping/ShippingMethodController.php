<?php

namespace App\Http\Controllers\Admin\Shipping;
use App\Http\Controllers\Controller;
use App\Models\ShippingMethods;

use Illuminate\Http\Request;

class ShippingMethodController extends Controller
{
    public function index(){
        return view('admin.shipping.shipping-methods.index');
    }

    public function create(){
        return view('admin.shipping.shipping-methods.create');
    }

    public function store(Request $request){
        try {
            $is_active = $request->is_active;
            $method = new ShippingMethods;
            $method->name = $request->name;
            $method->description = $request->description;
            $method->rate = $request->rate;
            $method->duration = $request->duration;
            $method->minimum_order_value = $request->minimum_order_value;
            $method->maximum_order_value = $request->maximum_order_value;
            $method->handling_fee = $request->handling_fee;
            $method->priority = $request->priority;
            $method->has_insurance = $request->has_insurance;
            $method->tracking_url = $request->tracking_url;
            $method->weight_limit = $request->weight_limit;
            $method->max_length = $request->max_length;
            $method->max_width = $request->max_width;
            $method->max_height = $request->max_height;
            $method->min_delivery_days = $request->min_delivery_days;
            $method->max_delivery_days = $request->max_delivery_days;
            $method->additional_fees = $request->additional_fees;
            $method->mode_of_shipment  = 1;
            $method->is_active = isset($is_active) && !empty($is_active) ? 1 : 0;
            $method->save();

            notify()->success('Shipping Method has been created successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            notify()->error('An error occurred while creating the Shipping Method.');
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
