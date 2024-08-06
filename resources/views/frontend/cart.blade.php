@php $imgUrl = pImagesUrl(); @endphp
@extends('layouts.app-new', ['body_class' => 'home-page', 'title' => 'Your Cart – ArtistryBazaar', 'meta_description' => 'Your Cart', 'meta_keywords' => 'Your Cart'])
@section('content')
    <section id="page-header">
        <section id="page-title" style="display: none">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="back text-black cursor-pointer" onclick="history.back()"><i
                                class="fa-solid fa-angle-left"></i> Back</div>
                        <h1 class="page-title">Your Cart</h1>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs py-2 small-font"><a href="{{ url('/') }}" class="text-black">Home</a> /
                        Cart</div>
                </div>
            </div>
        </div>
    </section>


    <section class="des-sec py-5 mb-3 mt-4 mt-md-0">
        <div class="container">
            <div class="row">
                <div class="col-md-8 table-responsive">
                    @if ($cart)
                        <table class="cart-style-table">
                            <thead>
                                <th></th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </thead>
                            <tbody>
                                @php
                                    $instock = false;
                                    $otherStock = false;
                                    $k = rand();
                                    $total = 0;
                                    $z = 1;
                                @endphp
                                @foreach ($cart as $id => $details)
                                    <?php
                                    if (checkInstock($details['id'])) {
                                        $instock = true;
                                    } else {
                                        $otherStock = true;
                                    }
                                    $priceData = pricetoCartQuantity($details['price_id']);
                                    if (!$priceData) {
                                        updatePriceId($details['cart_pid']);
                                    }
                                    $totalamount = $priceData->price * $details['quantity'];
                                    $productData = getproduct($details['id']);
                                    $total += $totalamount;
                                    ?>
                                    <tr id="cart_random_{{ $details['id'] }}">
                                        <td class="position-relative">
                                            <a href="javascript:void(0);"
                                                class="cart_del_btn cancel-icon-box98 position-absolute"
                                                data-id="{{ $details['id'] }}" data-type="c">
                                                <i class="fa-solid fa-xmark cancel-icon98 text-white"></i>
                                            </a>
                                            <a href="{{ url('product/' . $details['slug']) }}">
                                                <img src="{{ $imgUrl . featuredImage($details['id']) }}" width="80"
                                                    height="80" class="object-cover" alt="{{ $details['title'] }}">
                                            </a>
                                        </td>
                                        <td>
                                            <h3 style="margin-bottom: 0px !important">
                                                <a title="{{ $details['title'] }}"
                                                    href="{{ url('product/' . $details['slug']) }}" style="color: #333333;">
                                                    {{ Str::limit($details['title'], '40') }}
                                                </a>
                                            </h3>
                                            @if (checkInstock($details['id']))
                                                <div style="margin-top: 5px;margin-bottom: 6px;">
                                                    <span style="color: #DF678B;font-weight:bolder;margin-left: 8px;">In
                                                        Stock</span>
                                                </div>
                                                <input type="hidden" id="instk{{ $z }}"
                                                    name="instk{{ $z }}" value="0">
                                            @else
                                                <input type="hidden" id="instk{{ $z }}"
                                                    name="instk{{ $z }}" value="1">
                                            @endif
                                        </td>
                                        <td>
                                            <span class="unit-78{{ $details['pid'] }}">(@money($priceData->price)/Item)</span>
                                        </td>
                                        <td>
                                            @livewire('cart-quentity', ['productId' => $details['pid'], 'quantity' => $details['quantity']])
                                        </td>
                                        <td>
                                            <span class="mb-0" id= 'p-tag{{ $details['pid'] }}'>
                                                @if (isset($totalamount))
                                                    @money($totalamount)
                                                @endif
                                            </span>
                                        </td>
                                    </tr>
                                    @php $k++; @endphp
                                    @php $z++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>

                       

                @if (isset($total))


                    <div style="display: none">
                        <input class="ckt-price" type="hidden" value="{{ $total }}">
                    </div>
                    <input type="hidden" name="isMultiple" id="isMultiple"
                        value="{{ @$instock == true && @$otherStock == true ? '1' : '0' }}">
                    <div class="col-md-4 mt-3 mt-md-0" style="background:#F8F8F8">
                        <div class="spaecificarions p-3 specificarions">

                            <h3 class="h3 text-black fs-5">Enjoy flexible payments!</h3><hr />
                            <p style="font-size: 14px; margin-bottom: 0px !important;">Pay 30% upfront to secure your order. The final 70% payment is due when your order is ready for dispatch.</p>

                        </div>

                            <div class="spaecificarions p-3 mb-3 specificarions">
                            <h3 class="h3 text-black fs-5">Cart Details</h3>
                            <hr />
                            <ul class="list-group list-group-flush mt-5">
                                <li
                                    class="text-black d-flex justify-content-between align-items-center border-0 px-0 pb-0 small-font">
                                    Subtotal ({{ count($cart) }} {{ count($cart) > 1 ? 'items' : 'item' }})
                                    <span class="price-tag"><?php if(isset($total)){ ?> @money($total) <?php }?>
                                    </span>
                                </li>
                                <hr />
                                <li
                                    class="text-black d-flex justify-content-between align-items-center border-0 px-0 pb-0 small-font">
                                    Shipping
                                    <span>On next page</span>
                                </li>
                                <hr />
                                <li
                                    class="text-black d-flex justify-content-between align-items-center border-0 px-0 pb-0 small-font">
                                    Total Amount
                                    <span>
                                        @if (isset($total))
                                            <div class="cart_total_price dis_price price-tag"> @money($total) </div>
                                        @endif
                                    </span>
                                </li>
                                <hr />
                                @if (Auth::check())
                                    <li class="text-black border-0 px-0 pb-0">
                                        <a href="<?php $string_1 = uuid(); ?> {{ url('/checkout/' . $string_1) }}" type="button"
                                            class="btn ab-btn-white bg-black text-white w-100 mt-2 checkout-btn-logged small-font">Proceed
                                            to Checkout</a>
                                    </li>
                                @else
                                    <li class="text-black border-0 px-0 pb-0">
                                        <a class="btn ab-btn-white bg-black text-white w-100 mt-2 checkout-btn-sessionUser small-font"
                                            data-mdb-toggle="modal" data-mdb-toggle="modal"
                                            data-mdb-target="#staticBackdrop" href="javascript:void(0)">Proceed to
                                            Checkout</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                @endif
            </div>
            @if (count($cart) == 0)
                <div class="text-center cart-image-conatiner">
                    <img height="200" src="{{ URL::asset('media/img/Navbar/cart0009890.svg') }}" alt="Cart">
                </div>
            @endif
        </div>
        </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true"
        data-mdb-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content rounded-0 px-3 guest-checkout-modal">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkoutModalLabel">Continue to checkout</h5>
                    <button type="button" class="btn-close" id="card-mdl-cs" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mt-2">
                    <h5>Enter your email address to proceed</h5>
                    <p class="email-order-text">We need your email address to send updates about your order.</p>
                    <form method="POST" action="{{ url('/guest-checkout') }}">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Email</label>
                            @php
                                $sessionEmail = session('guestUserEmail');
                            @endphp
                            <input type="email" class="form-control rounded-0 py-2"
                                @if ($sessionEmail) value="{{ $sessionEmail }}" @endif name="email">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning">Continue</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_scripts')
    <script>
        $('document').ready(function() {

            $('.checkout-btn').click(function(e) {

                $("#loginModal").modal("show");

            });

            $('.checkout-btn-logged').click(function(e) {
                var price = $('.ckt-price').val();
                var isMultiple = $('#isMultiple').val();
                var instock = $('#instk1').val();
                if (isMultiple == 1) {
                    e.preventDefault();
                    swal.fire({
                        text: "Please proceed either with In-Stock products or other collection products",
                        type: "info",
                        showCancelButton: false,
                        confirmButtonText: "Got it!",
                        customClass: {
                            container: 'minQty-swal-container'
                        }
                    });
                } else if (price < 100 && instock == 1) {
                    e.preventDefault();
                    swal.fire({
                        text: "To proceed, your order must be at least $100.",
                        type: "info",
                        showCancelButton: false,
                        confirmButtonText: "Got it!",
                        customClass: {
                            container: 'minQty-swal-container'
                        }
                    });
                }
            });

            $('.checkout-btn-sessionUser').click(function(e) {
                var price = $('.ckt-price').val();
                var isMultiple = $('#isMultiple').val();
                var instock = $('#instk1').val();
                if (isMultiple == 1) {
                    e.preventDefault();
                    swal.fire({
                        text: "Please proceed either with In-Stock products or other collection products",
                        type: "info",
                        showCancelButton: false,
                        confirmButtonText: "Got it!",
                        customClass: {
                            container: 'minQty-swal-container'
                        }
                    });
                } else if (price < 100 && instock == 1) {
                    e.preventDefault();
                    swal.fire({
                        text: "To proceed, your order must be at least $100.",
                        type: "info",
                        showCancelButton: false,
                        confirmButtonText: "Got it!",
                        customClass: {
                            container: 'minQty-swal-container'
                        }
                    });
                } else {
                    $("#checkoutModal").modal("show");
                }
            });

            $("#card-mdl-cs").click(function(){
                $("#checkoutModal").modal("hide");
            });

        });
    </script>
    <script>
        function showToast(message, type) {
            toastr.clear();
            toastr[type](message);
        }

        document.addEventListener('livewire:load', function() {

            Livewire.on('productPrice', function(data) {
                var productId = data.productId;
                var price = (data.product * data.quantity).toFixed(1);
                var totalPrice = data.totalPrice.toFixed(1);
                var currency = data.currency;
                $('#p-tag' + productId).html(currency + price);
                $('.price-tag').html(currency + totalPrice);
                $('.ckt-price').val(totalPrice);
                $('.unit-78' + productId).html('(' + currency + data.product + '/Item)');
            });

        });
    </script>
@endsection
