<?php $prices = pricetoquantity($product->id);
   if(isset($prices) && !empty($prices)){  
   ?>
      <?php  foreach ($prices as $key => $val) { 
                  $formattedPrice[$key] =$val->price;
                  $qty[$key] =$val->min_qty;
                  $qty_texts[$key] =$val->qty_text;
                  $singleprice = $val->price ?? null;
                  $singleqty_text = $val->qty_text;
         }  ?>

    <?php if(count($prices)>=2){  ?> 
     <p class="mb-1">@money(min($formattedPrice)) - @money(max($formattedPrice))</p>
     <p class="text-left"><?php echo $product->quantity; ?> <?php if(isset($qty_texts[0]) && !empty($qty_texts[0])){ echo $qty_texts[0]; } ?></p>
    <?php } elseif(count($prices)<1) { ?>
     @if(isset($singleprice))
       <p class="mb-1">@money($singleprice)</p>
       @endif
       <p class="text-left"><?php echo $quantity= !empty($product->quantity) ? $product->quantity : false; ?> <?php echo $singleqty_text= !empty($singleqty_text) ? $singleqty_text : false; ?></p>
     <?php } ?>

<?php } ?>