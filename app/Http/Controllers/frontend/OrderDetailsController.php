<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

use App\Models\Orders;
use App\Models\PaymentReminder;
use App\Models\ShipmentTracking;

class OrderDetailsController extends Controller
{
    public function index($ordernum)
    {
        $order = Orders::where('order_number', $ordernum)->active()->first();
        return view('frontend.orderDetails', ['order' => $order, 'ordernum' => $ordernum]);
    }

    public function trackPayment($uuid, PaymentReminder $payment){

        $payment->where('uuid',$uuid)->update(['is_open'=>true]);
        $details = $payment
                    ->with([
                        'order',
                        'order.shippingAddress',
                        'order.billingAddress',
                        'user:id,first_name,last_name,email'
                        ])
                    ->where('uuid',$uuid)
                    ->first();


        if(!$details) return abort(404);
        if($details->payment_status == true)  return redirect()->route('ab_reminder_payment_complete',[$uuid]);

        $shippingDetails = ShipmentTracking::whereIn('id', $details->related_shipping_ids??[])
                            ->with(['product'])
                            ->get() ?? [];


        return view('checkout.paymentReminder',compact(['details','shippingDetails']));
    }

    public function abReminderPaymentComplete($uuid, PaymentReminder $payment){
        $details = $payment
                    ->with([
                        'order',
                        'order.shippingAddress',
                        'order.billingAddress',
                        'user:id,first_name,last_name,email'
                        ])
                    ->where('uuid',$uuid)
                    ->where('payment_status',true)
                    ->first();

        if(!$details) return abort(404);

        $shippingDetails = ShipmentTracking::whereIn('id', $details->related_shipping_ids??[])
        ->with(['product'])
        ->get() ?? [];

        return view('pages.payment-thank',compact('details','shippingDetails'));
    }

}
