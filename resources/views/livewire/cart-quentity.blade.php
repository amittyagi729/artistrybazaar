<div class="d-md-flex justify-content-between">
    <div>
       <div class="input-group container-cart-box">
        <button wire:click="decrement" type="button" class=" btn btn-default btn-number add-cart-btn"  wire:change="saveQuantity" wire:loading.attr="disabled">
            -
        </button>
    </span>
    <input type="text" style="width: 50px; border-color: #c9d1da;" class="form-control quantity cart-qty" wire:model.lazy="quantity" wire:model="quantity" wire:change="saveQuantity">
        <button wire:click="increment" type="button" class="btn btn-default btn-number add-cart-btn" wire:loading.attr="disabled" style="border-top-left-radius: 0%; border-bottom-left-radius:0px;">
            +
        </button>
    </div>
