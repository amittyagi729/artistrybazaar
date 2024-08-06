<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Price;
use App\Models\Cart;
use Auth;
use Config;

class CartQuentity extends Component
{
    public $productId;
    public $quantity;

    public function mount($productId, $quantity)
    {
        $this->productId = $productId;
        $this->quantity = $quantity;
    }

    private function getCartQuery()
    {
        if (Auth::check()) {
            // If the user is authenticated, create a query for the logged-in user
            $userId = Auth::user()->id;
            $query = Cart::where('user_id', $userId)->where('product_id', $this->productId);
        } else {
            // If the user is not authenticated, create a query for the guest session
            $sessionId = session()->get('guest_identifier');
            $query = Cart::where('session_id', $sessionId)->where('product_id', $this->productId);
        }

        return $query->update([
            'quantity' => $this->quantity,
            'price' => $this->getQtyPrice()->price,
            'price_id' => $this->getQtyPrice()->id,
        ]);
    }

    public function increment()
    {
        if ($this->quantity < $this->getMaxQty()) {

            $this->quantity++;

            $this->getCartQuery();

            $this->returnProductPrice();

            $this->emit('showSuccessMsg', "You've changed Product QUANTITY to " . $this->quantity);

        } else {

            $this->quantity = $this->getMaxQty();

            $this->getCartQuery();

            $this->returnProductPrice();

            $this->emit('showErrorMsg', "You've set Product QUANTITY to Maximun " . $this->quantity);
        }
    }

    public function decrement()
    {
        if ($this->quantity > $this->getMinQty()) {

            $this->quantity--;

            $this->getCartQuery();

            $this->returnProductPrice();

            $this->emit('showSuccessMsg', "You've changed Product QUANTITY to " . $this->quantity);

        } else {

            $this->quantity = $this->getMinQty();

            $this->getCartQuery();

            $this->returnProductPrice();

            $this->emit('showErrorMsg', "You've set Product QUANTITY to Minimum " . $this->quantity);
        }
    }

    public function saveQuantity()
    {
        if ($this->quantity < $this->getMinQty()) {

            $this->quantity = $this->getMinQty();

            $this->getCartQuery();

            $this->returnProductPrice();

            $this->emit('showErrorMsg', 'Quantity is below min value!');

        } elseif ($this->quantity > $this->getMaxQty()) {

            $this->quantity = $this->getMaxQty();

            $query = $this->getCartQuery();

            $this->getCartQuery();

            $this->returnProductPrice();

            $this->emit('showErrorMsg', 'Quantity is above max value!');

        } else {

            $this->validate([
                'quantity' => 'numeric|min:' . $this->getMinQty(),
            ]);

            $this->getCartQuery();

            $this->returnProductPrice();

            $this->emit('showSuccessMsg', "You've changed Product QUANTITY to " . $this->quantity);
        }
    }

    private function getQtyPrice()
    {
        $product = Price::where('product_id', $this->productId)
            ->where('min_qty', '<=', $this->quantity)
            ->where('max_qty', '>', $this->quantity)
            ->union(
                Price::where('product_id', $this->productId)
                    ->where('max_qty', '=', $this->quantity)
            )
            ->first();

        return $product;
    }

    public function returnProductPrice()
    {
        // Call the getTotalPrice() method to get $product
        $productPrice = $this->getQtyPrice()->price;

        $totalPrice = cartPrice();

        $currency = Config::get('constants.currency');

        // Emit a Livewire event with the $product as payload
        $this->emit('productPrice', [
            'product' => $productPrice,
            'quantity' => $this->quantity,
            'productId' => $this->productId,
            'totalPrice' => $totalPrice,
            'currency' => $currency,
        ]);
    }
    private function getMinQty()
    {
        $minQty = Price::where('product_id', $this->productId)->min('min_qty');

        return $minQty;
    }
    private function getMaxQty()
    {
        $maxQty = Price::where('product_id', $this->productId)->max('max_qty');

        return $maxQty;
    }

    public function render()
    {
        return view('livewire.cart-quentity');
    }
}