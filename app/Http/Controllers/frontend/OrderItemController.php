<?php
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Log;


class OrderItemController extends Controller
{
    public function store($cart_items, $orderId)
    {

        foreach ($cart_items as $itemData) {
            $cartItem = new OrderItem();
            $cartItem->product_id = $itemData['pid'];
            $cartItem->order_id = $orderId;
            $cartItem->quantity = $itemData['quantity'];
            $cartItem->price = $itemData['price'];
            $cartItem->save();
        }
    }
}
