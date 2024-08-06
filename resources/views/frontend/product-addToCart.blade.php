<form action="{{ url('cart/add-to-cart')}}" method="post" accept-charset="utf-8">
   @csrf 
   <?php //$price = $product->sale_price*$product->quantity; ?>
   <input type="hidden" name="pid" value="{{$product->id}}">
   <input type="hidden" name="name" value="{{$product->title}}">
   <!-- ************* use this default price in blade file priceTOquantity ****************---->
   <?php $minprice = minprice($product->id);
      if(isset($minprice) && !empty($minprice)){  
      
      ?>
   <input type="hidden" name="price_id" value="{{$minprice->id}}" class="price_tbl_id">
   <?php } ?>
   <input type="hidden" name="price"  class="sale_price" value="{{$minprice->id}}">
   @php $minQty = getMinQty($product->id); @endphp
   <input type="hidden" name="qty" value="{{ $minQty }}" class="qtyID">
   <input type="hidden" class="currency" name="currency12" value="<?php echo Config::get('constants.currency');?>">
   {{-- <input type="hidden" value="{{ $product->featured_image }}"  name="image"> --}}
   <button type="button" class="btn btn-warning btn-lg me-lg-1 px-3 py-1 order-nowcbtn shadow-none enquiryproduct" data-mdb-toggle="modal" data-mdb-target="#exampleModal" data-mdb-target="#staticBackdrop">Make An Enquiry</button>
   @unlessrole('admin')
   @php $result = isProductInCart($product->id); @endphp
   @if($result == 1)
   <a href="{{ url('cart') }}" class="btn btn-outline-dark btn-lg px-3 py-1 order-nowcbtn addtocart hide_addbtn" data-mdb-ripple-color="dark">Go to Cart</a>
  
   <button type="button" class="btn btn-warning btn-lg me-lg-1 px-3 py-1 order-nowcbtn shadow-none enquiryproduct" data-mdb-toggle="modal" data-mdb-target="#cartModal" data-mdb-target="#staticBackdrop">ADD</button>

   @else

  

   <button type="submit" class="btn btn-outline-dark btn-lg px-3 py-1 order-nowcbtn addtocart hide_addbtn" data-mdb-ripple-color="dark">Add to Cart</button>
@endif
@endunlessrole

</form>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content rounded-0 px-3">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Product Enquiry</h5>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form method="POST" action="{{ url('/product/sendInquiry/')}}" id="my-productform">
               @csrf
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Product Name:</label>
                  <input type="text" class="form-control rounded-0 py-2" id="recipient-productname" name="productname" value="{{ $product->title }}" readonly>
                  <input type="hidden" class="form-control"  name="url" value="{{ url()->current()}}" readonly>
               </div>
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Name <span style="color:red">*</span>:</label>
                  <input type="text" class="form-control rounded-0 py-2" id="recipient-name" name="name">
                  <span id="name-error" style="color:red;"></span>
               </div>
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Email <span style="color:red">*</span>:</label>
                  <input type="email" class="form-control rounded-0 py-2" id="recipient-email" name="email">
                  <span id="email-error" style="color:red;"></span>
               </div>
               <div class="form-group">
                  <label for="message-text" class="col-form-label">Message <span style="color:red">*</span>:</label>
                  <textarea class="form-control rounded-0" id="message-text" name="message"  rows="4" cols="50"></textarea>
                  <span id="message-error" style="color:red;"></span>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-warning Inquiry-button">Send message</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

  <!-- Add to cart Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static">
   <div class="modal-dialog cart-modal-dialog-container">
      <div class="modal-content modal-rounded">
         <div class="modal-header-container">
         <div>
         <img class="iconnuser m-4 ms-2" src="https://artistrybazaar.s3.amazonaws.com/Jaipur/AX-JPR-013/1.jpg" height="40" alt="Logo" loading="lazy">
      </div>
                  <h5 class="modal-title" id="exampleModalLabel"><div>
                     <span class="font-weight-bold subp-head checkqty123 d-block cart-main-heading">US$ 4.55 - 5.99</span>
                     <span class="font-weight-bold checkqtyPrices cart-sub-heading">Min. Order: 3 Piece</span>
                  </div></h5>
               </div>
               <button type="button" class="btn-close cart-close-btn" data-mdb-dismiss="modal" aria-label="Close"></button>
               <div class="modal-body">
            <div class="quantity-container">
               <div class="quantity-sub-container">
                  <p>Quantity</p>
                  <p>
                  <div class="input-group box-left" style=" width: fit-content;">
        <span class="input-group-btn">
            <button wire:click="decrement" type="button" class=" btn btn-default btn-number" wire:change="saveQuantity" wire:loading.attr="disabled" style="border-top-right-radius: 0%; border-bottom-right-radius:0px;">
                -
            </button>
        </span>
        <input type="text" min="25" max="10000" style="width: 50px; height: 40px; border-color: #c9d1da;" class="form-control quantity cart-quantity" wire:model.lazy="quantity" wire:model="quantity" wire:change="saveQuantity" placeholader="
        9" value="9">
        <span class="input-group-btn">
            <button wire:click="increment" type="button" class=" btn btn-default btn-number" wire:loading.attr="disabled" style="border-top-left-radius: 0%; border-bottom-left-radius:0px;">
                +
            </button>
        </span>
    </div></p>
               </div>
               <div class="quantity-sub-container">
                  <p>Unit Price</p>
                  <p style="font-weight: bold;color: #2d2d2d;">$3.94/pc</p>
               </div>
            </div>
         <div class="grey-container">
         <div class="span-text">
          Buy
          <span class="bold">1000</span>
          at <span class="bold">US$ 5.88</span> /
          Piece.
        </div>
      </div>
      <div class="shipping-text">Shipping Notes: To be negotiated</div>
      </div>
      <div class="quantity-sub-container p-4">
                  <p class="total-price-text">$3.94</p>
                  <p style="font-weight: bold;color: #2d2d2d;">
                  <button type="submit" class="btn btn-warning btn-lg me-lg-1 px-3 py-1 order-nowcbtn shadow-none enquiryproduct" data-mdb-ripple-color="dark">Add to Cart</button>

               </p>
               </div>
   </div>
</div>

  <!-- Add to cart Modal -->

<script>
    document.addEventListener('livewire:load', function() {
    // This will ignore Livewire's scripts on this section
    Livewire.on('productSelected', function(data) {
        // Handle the emitted product data in jQuery
        // For example, you can access properties of the product object and use them as needed
        var product = data.product;
        var quantity = data.quantity;
         $('.qtyID').val(quantity);
         $('.sale_price').val(product.price);
         $('.price_tbl_id').val(product.id);
    });
   });
</script>