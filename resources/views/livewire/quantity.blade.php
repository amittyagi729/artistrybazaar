<div>
    <span class="font-weight-bold subp-head">QUANTITY</span>
    <div class="input-group" style=" width: fit-content; margin-bottom:20px;   ">
            <button wire:click="decrement" type="button" class=" btn btn-default btn-number add-cart-btn"  wire:change="saveQuantity" wire:loading.attr="disabled"
            style="border-top-right-radius: 0%; border-bottom-right-radius:0px;">
                -
            </button>
        <input type="text" min="{{ $minQty }}" max="{{ $maxQuantity }}"  class="form-control quantity cart-quantity" wire:model.lazy="quantity" wire:model="quantity" wire:change="saveQuantity">
            <button wire:click="increment" type="button" class="add-cart-btn btn btn-default btn-number" wire:loading.attr="disabled" style="border-top-left-radius: 0%; border-bottom-left-radius:0px;">
                +
            </button>
    </div>


     <!-- Show the price table -->
     @if($showPriceTable)
     @if(!empty($quantity) && $quantity >= $minQty)
     @php $data = $this->getTotalPrice() @endphp
     <?php $price = $data->price ?? null; $totalPrice = $quantity * $price; ?>
     <span class="text-price mb-2 mt-2">{{ config('constants.currency')}}{{ $totalPrice }}</span>
     @endif
     @endif
 </div>

</div>

