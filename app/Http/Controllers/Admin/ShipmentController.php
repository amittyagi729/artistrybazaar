<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Shippings;
use App\Models\OrderItem;
use DB;

use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function updateShipment(Request $request)
    {
        $products = $request->input("product");
        $shipping = new Shippings;
        $shipping->order_number = $request->order_number;
        $shipping->save();
        $last_id = $shipping->id;

        foreach ($products as $product){
            if(isset($product['shipping_qty']) && isset($product['product_id']) && isset($product['shipping_date'])){
            if($product['shipping_qty'] !=null && $product['product_id'] != null && $product['shipping_date'] !=null){

            DB::table('shipped_items')->insert([
                'shipping_id' => $last_id,
                'product_id' => $product['product_id'],
                'shipping_qty' => $product['shipping_qty'],
                'shipping_date' => $product['shipping_date'],
            ]);
            $orderItem = OrderItem::where('id', $product['orderItemId'])->first();
            $orderItem->shipped_qty = $product['shipping_qty'];
            $orderItem->save();

        }
        }
    }
    notify()->success('Shipment saved successfully !!!');
    return redirect()->back();
    }
}
