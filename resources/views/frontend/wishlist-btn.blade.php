<div class="">
	<?php $wishlist = getproduct_wishlist($product->id);   ?> 
	<a href="javascript:void(0)" class="like addWish" data-product="{{$product->id}}">
	   <i class="<?php if(isset($wishlist) && !empty($wishlist)){ echo "fas fa-heart wishlist-icon activelike"; } else { echo "far fa-heart wishlist-icon"; } ?>" style="color:#df678b;" id="wishlist"></i>
	</a>
</div>