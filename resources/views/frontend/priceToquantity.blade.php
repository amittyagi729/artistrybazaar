<?php $prices = pricetoquantity($product->id);
   if(isset($prices) && !empty($prices)){  
   ?>
<ol class="price-singlep list-unstyled d-flex">
   <div class="d-flex product-cart-container justify-content-between">
   <?php  $k = 0;
    foreach ($prices as $key => $val) { 
          $formattedPrice1[$key] =$val->price;
      ?>
   <li class="checkPrice{{$val->id}}">
      <span>
         @if($k == 0)
      {{$val->min_qty}} -  {{$val->max_qty}} {{$val->qty_text}}
      @else
      {{$val->min_qty-1}}+
      @endif
      </span>
      <?php $formattedPrice = rtrim($val->price, '.00');?>
      <p class="mb-1">@money($val->price) <span class="pieces-text">/{{$val->qty_text ?? "unit"}} </span></p>
   </li>
   <?php $k++;  } ?> 
   <input type="hidden" value="<?php if(count($formattedPrice1) > 0){   echo max($formattedPrice1); }  ?>" id="priceqty">
</div>
</ol>
<?php }