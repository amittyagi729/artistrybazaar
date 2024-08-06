@foreach ($products as $product)
    <div class="col-6 col-lg-3 col-md-4 mb-4 ab-single-product">
        <div class="sing-le-p mb-4">
            <div
                class="img-div  position-relative d-flex align-items-center justify-content-center mb-2 overflow-hidden">
                <a href="{{ route('product.show', [@$product->slug]) }}" target="_blank" class="product-img-container">
                    <img width="230" height="230" src="{{ pImagesUrl() . @$product->featuredImage->product_image }}"
                        alt="{{ $product->title }}" loading="lazy">
                    <img width="230" height="230" class="ab-lazy-load"
                        src="{{ optional($product->nonFeaturedImage)->product_image ? pImagesUrl() . $product->nonFeaturedImage->product_image : pImagesUrl() . @$product->featuredImage->product_image }}"
                        alt="{{ $product->title }}">
                </a>
                <div class="product-wish-list">
                    @include('frontend.wishlist-btn')
                </div>
                <div class="product-add-to-cart w-100 text-center">
                    {{-- @include('frontend.addToCart') --}}
                    <a target="_blank" href="{{ url('/product/' . $product->slug) }}"
                        class="btn shadow-none btn-lg enquiryproduct px-3 py-1 order-nowcbtn add-cart-cfm  view_addbtn"
                        data-mdb-ripple-color="dark">View Details </a>
                </div>
            </div>
            {{-- <span class="category-p">{{@$maincat->name}}</span> --}}
            <a href="{{ route('product.show', [@$product->slug]) }}">
                <h2 class="h2">{{ $product->title }}</h2>
            </a>
            @php
                $data = @getReviewDetails($product->upc);
                $rating = $data['rating'] ?? 0;
                $reviewCount = $data['reviewCount'] ?? 'N/A';

                // Calculate the number of full, half, and empty stars
                $fullStars = floor($rating);
                $halfStar = $rating - $fullStars >= 0.5 ? 1 : 0;
                $emptyStars = 5 - $fullStars - $halfStar;
            @endphp

            <div style="display: flex; align-items: center;">
                <span style="font-size: 14px;line-height: 20px; padding-right:5px"> {{ @$rating }} </span>
                <div class="testimonial-rating" style="display: flex; align-items: center; margin-right: 10px;">
                    @for ($i = 0; $i < $fullStars; $i++)
                        <i class="fa-solid fa-star" style="color: #f9d900;"></i>
                    @endfor
                    @if ($halfStar)
                        <i class="fa-solid fa-star-half-alt" style="color: #f9d900;"></i>
                    @endif
                    @for ($i = 0; $i < $emptyStars; $i++)
                        <i class="fa-regular fa-star" style="color: #f9d900;"></i>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endforeach
