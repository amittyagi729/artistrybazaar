<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Price;
use Illuminate\Support\Benchmark;

class Quantity extends Component
{
    public $productId;
    public $quantity;
    public $maxQuantity;
    public $minQty;
    public $price; 
    public $initialQuantity; 
    public $totalAmount; 
    public $showPriceTable = false;

    public function mount($productId, $maxQuantity, $initialQuantity, $minQty)
    {
        $this->productId = $productId;
        $this->maxQuantity = $maxQuantity;
        $this->minQty = $minQty;
        $this->quantity = $initialQuantity;
    }

    public function increment()
    {
        // sleep(5);
        if ($this->quantity < $this->maxQuantity) {
            $this->quantity++;
            $this->returnProduct();
            $this->showPriceTable = true;
        } else {
            $this->emit('showErrorMessage', 'Quantity is above max value!');
            $this->quantity = $this->maxQuantity;
            $this->showPriceTable = false;
        }
    }

    public function decrement()
    {
        $this->validate([
            'quantity' => 'numeric|min:' . $this->minQty,
        ]);
        if ($this->quantity > $this->minQty) {
            $this->quantity--;
            $this->returnProduct();
            $this->showPriceTable = true;
        } else {
            $this->emit('showErrorMessage', 'Quantity is below min value!');
            $this->quantity = $this->minQty;
            $this->showPriceTable = false;
        }
    }

    public function saveQuantity()
    {
          if ($this->quantity < $this->minQty) {
            $this->showPriceTable = false;
            $this->quantity = $this->minQty;
        $this->emit('showErrorMessage', 'Quantity is below min value!');
        }elseif($this->quantity > $this->maxQuantity){
            $this->showPriceTable = false;
            $this->quantity = $this->maxQuantity;
            $this->emit('showErrorMessage', 'Quantity is Above max value!');
        } else {
            $this->showPriceTable = true;
            $this->validate([
                'quantity' => 'numeric|min:' . $this->minQty,
            ]);
            $this->returnProduct();
        }
    }

    private function getTotalPrice()
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

    public function returnProduct()
    {
        // Call the getTotalPrice() method to get $product
        $product = $this->getTotalPrice();
        $quantity = $this->quantity;

        // Emit a Livewire event with the $product as payload
         $this->emit('productSelected', [
        'product' => $product,
        'quantity' => $quantity,
    ]);
    }

    public function render()
    {
        return view('livewire.quantity');
    }
}
