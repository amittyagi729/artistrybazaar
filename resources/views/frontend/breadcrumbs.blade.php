 <nav aria-label="breadcrumb">
     <?php
     foreach ($product->termrelation as $item) {
         $cat = getPatentcategory($item->term_taxonomy_id);
         $subcat = getSubcategoryProduct($item->term_taxonomy_id);
         if(!empty($subcat))
         {
          $subcategory = $subcat;
         }
       
         if(!empty($cat)){
           $categories = $cat;
         }
     }
     ?>
     
     <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-muted">Home</a></li>
         <?php $maincat = getcategory($categories->parent_id);
                  if(isset($maincat) && !empty($maincat)){
                     ?>
         <li class="breadcrumb-item">
             <a href="{{ url('/product-category/' . $maincat->slug) }}"
                 class="text-muted text-capitalize"><?php echo isset($maincat->name) ? $maincat->name : ''; ?></a>
         </li>
         <?php } ?>
         <li class="breadcrumb-item"><a href="{{ url('/product-category/' . $categories->slug) }}"
                 class="text-muted text-capitalize"><?php echo isset($categories->name) ? $categories->name : ''; ?></a></li>
 <li class="breadcrumb-item"><a href="{{ url('/product-category/' . $subcategory->slug) }}"
   class="text-muted text-capitalize"><?php echo isset($subcategory->name) ? $subcategory->name : ''; ?></a></li>
     </ol>
 </nav>
