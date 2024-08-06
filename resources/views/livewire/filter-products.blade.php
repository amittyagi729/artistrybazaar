<div class="row">
    @php $currency = config('constants.currency'); @endphp
    <div class="col-lg-2 col-md-3">
        <div class="filter-card">
            <h5 class="filter-card-title">Filters</h5>
            <h6 class="filter-card-title">Categories</h6>
            <ul class="filter-list">
                <?php $categories = menuCategory(); ?>
                @foreach ($categories as $category)
                    <li><input type="checkbox">{{ $category->name }}</li>
                @endforeach
                <h6 class="filter-card-title">Colors</h6>
                <?php $colorList = getColorList();
                $colorid = 0;
                ?>
               @foreach ($colorList as $color)
               @if ($colorid < 5)
                   <li style="display: block" wire:ignore>
                       <input type="checkbox" wire:model="selectedColor.{{ $color->id }}" value="{{ $color->id }}">
                       {{ $color->name }}
                   </li>
               @else
                   <li class="more-color" style="display: none" wire:ignore>
                       <input type="checkbox" wire:model="selectedColor.{{ $color->id }}" value="{{ $color->id }}">
                       {{ $color->name }}
                   </li>
               @endif
               @php $colorid++; @endphp
           @endforeach
                <a href="javascript:void(0);" class="color-more">See more</a>
                <h6 class="filter-card-title">Materials</h6>
                <?php $materialList = materialList();
                $materialid = 0;
                ?>
                @foreach ($materialList as $material)
                @if ($materialid < 5)
                    <li style="display: block" wire:ignore>
                        <input type="checkbox" wire:model="selectedMaterial.{{ $material->id }}" value="{{ $material->id }}">
                        {{ $material->name }}
                    </li>
                @else
                    <li class="more-material" style="display: none" wire:ignore>
                        <input type="checkbox" wire:model="selectedMaterial.{{ $material->id }}" value="{{ $material->id }}">
                        {{ $material->name }}
                    </li>
                @endif
                @php $materialid++; @endphp
            @endforeach
            <a href="javascript:void(0);"  class="material-more">See more</a>
            <h6 class="filter-card-title">Price</h6>
            <li><input wire:model="selectedPrice" type="radio" value="[0.50, 20.00]">{{ $currency }} 0.50 to {{ $currency }} 20.00</li>
            <li><input wire:model="selectedPrice" type="radio" value="[21, 50]">{{ $currency }} 21.00 to {{ $currency }} 50.00</li>
            <li><input wire:model="selectedPrice" type="radio" value="[51, 100]">{{ $currency }} 51.00 to {{ $currency }} 100.00</li>
            </ul>
        </div>

    </div>
    <div class="col-lg-10 col-md-9 px-0 px-md-2">
        <section class="py-md-2 my-4">
            <div class="container">
                <div class="row" id="new-product">
                    @foreach ($products as $product)
                        <div class="col-6 col-lg-3 col-md-4 mb-4 px-lg-2">
                            <div class="sing-le-p position-relative mb-4">
                                <span
                                    class="new-tag mt-3 position-absolute text-white bg-black py-1 text-uppercase px-3 left-0">new</span>

                                <div class="img-div d-flex align-items-center justify-content-center mb-2">

                                    @include('frontend.wishlist-btn')
                                    @if (isset($product->featuredImage))
                                        <a href="{{ url('/product/' . $product->slug) }}"
                                            class="text-reset producttitle">
                                            <img src="{{ asset('uploads/' . $product->featuredImage->product_image) }}"
                                                height="150" class="w-100" alt="{{ $product->title }}">
                                        </a>
                                    @endif

                                </div>
                                <div class="card-body px-2 pt-3 pb-2">
                                    <a href="{{ url('/product/' . $product->slug) }}"
                                        class="text-reset producttitle">
                                        <h5 class="card-title mb-2">{{ $product->title }}</h5>
                                    </a>
                                    @include('frontend.prices')
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <section class="dots-container" style="display: none">
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </section>

                <!-- pagination -->

                {{-- <hr class="py-3">
       <nav aria-label="..." class="d-flex justify-content-between">
        {{ $products->links('pagination::bootstrap-4')}}
       </nav> --}}
            </div>
        </section>
        <!-- end of products section -->
    </div>
</div>
