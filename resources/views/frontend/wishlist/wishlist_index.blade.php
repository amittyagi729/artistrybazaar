@extends('layouts.app-new', ['body_class' => 'wishlist-product', 'title' => 'My Wishlist – ArtistryBazaar', 'meta_description' => 'My Wishlist', 'meta_keywords' => 'My Wishlist'])
@push('css')
    <style>
        .checkbox-wrapper-33 {
            --s-xsmall: 0.625em;
            --s-small: 1.2em;
            --border-width: 1px;
            --c-primary: #000;
            --c-primary-20-percent-opacity: rgb(0 0 0 / 20%);
            --c-primary-10-percent-opacity: rgb(0 0 0 / 10%);
            --t-base: 0.4s;
            --t-fast: 0.2s;
            --e-in: ease-in;
            --e-out: cubic-bezier(.11, .29, .18, .98);
        }

        .checkbox-wrapper-33 .visuallyhidden {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        .checkbox-wrapper-33 .checkbox {
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .checkbox-wrapper-33 .checkbox+.checkbox {
            margin-top: var(--s-small);
        }

        .checkbox-wrapper-33 .checkbox__symbol {
            display: inline-block;
            display: flex;
            margin-right: calc(var(--s-small) * 0.7);
            border: var(--border-width) solid var(--c-primary);
            position: relative;
            border-radius: 0.1em;
            width: 1.5em;
            height: 1.5em;
            transition: box-shadow var(--t-base) var(--e-out), background-color var(--t-base);
            box-shadow: 0 0 0 0 var(--c-primary-10-percent-opacity);
        }

        .checkbox-wrapper-33 .checkbox__symbol:after {
            content: "";
            position: absolute;
            top: 0.5em;
            left: 0.5em;
            width: 0.25em;
            height: 0.25em;
            background-color: var(--c-primary-20-percent-opacity);
            opacity: 0;
            border-radius: 3em;
            transform: scale(1);
            transform-origin: 50% 50%;
        }

        .checkbox-wrapper-33 .checkbox .icon-checkbox {
            width: 1em;
            height: 1em;
            margin: auto;
            fill: none;
            stroke-width: 3;
            stroke: currentColor;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-miterlimit: 10;
            color: var(--c-primary);
            display: inline-block;
        }

        .checkbox-wrapper-33 .checkbox .icon-checkbox path {
            transition: stroke-dashoffset var(--t-fast) var(--e-in);
            stroke-dasharray: 30px, 31px;
            stroke-dashoffset: 31px;
        }

        .checkbox-wrapper-33 .checkbox__textwrapper {
            margin: 0;
        }

        .checkbox-wrapper-33 .checkbox__trigger:checked+.checkbox__symbol:after {
            -webkit-animation: ripple-33 1.5s var(--e-out);
            animation: ripple-33 1.5s var(--e-out);
        }

        .checkbox-wrapper-33 .checkbox__trigger:checked+.checkbox__symbol .icon-checkbox path {
            transition: stroke-dashoffset var(--t-base) var(--e-out);
            stroke-dashoffset: 0px;
        }

        .checkbox-wrapper-33 .checkbox__trigger:focus+.checkbox__symbol {
            box-shadow: 0 0 0 0.25em var(--c-primary-20-percent-opacity);
        }

        @-webkit-keyframes ripple-33 {
            from {
                transform: scale(0);
                opacity: 1;
            }

            to {
                opacity: 0;
                transform: scale(20);
            }
        }

        @keyframes ripple-33 {
            from {
                transform: scale(0);
                opacity: 1;
            }

            to {
                opacity: 0;
                transform: scale(20);
            }
        }
    </style>
@endpush
@section('content')
    <section id="page-header">
        <section id="page-title">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="back text-black cursor-pointer" onclick="history.back()"><i
                                class="fa-solid fa-angle-left"></i> Back</div>
                        <h1 class="page-title">My Wishlist</h1>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs py-2 small-font"><a href="{{ url('/') }}" class="text-black">Home</a> / My
                        Wishlist</div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-md-2 my-4">
        <div class="container">
            <div class="col-md-12 table-responsive">
                <table class="cart-style-table">
                    <thead>
                        <th width="5px">
                            <div class="checkbox-wrapper-33">
                                <label class="checkbox">
                                    <input class="checkbox__trigger visuallyhidden ab-select-wishlist-all"
                                        type="checkbox" />
                                    <span class="checkbox__symbol">
                                        <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px"
                                            viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 14l8 7L24 7"></path>
                                        </svg>
                                    </span>
                                </label>
                            </div>
                        </th>
                        <th width="5%"></th>
                        <th width="50%">Product Name</th>
                        <th width="10%">Unit Price</th>
                        <th width="10%">Date Added</th>
                        <th width="10%">Stock Status</th>
                        <th width="5%"></th>
                    </thead>
                    <tbody>
                        @forelse($wishlistItems as $product)
                            <tr id="removewishlist{{ $product->product_id }}">
                                <td>
                                    <div class="checkbox-wrapper-33">
                                        <label class="checkbox">
                                            <input data-url="{{ url('/wistlist/move-to-cart', ['id' => $product->id]) }}"
                                                class="checkbox__trigger visuallyhidden ab-select-wishlist"
                                                data-id="{{ $product->id }}" type="checkbox" />
                                            <span class="checkbox__symbol">
                                                <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px"
                                                    viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4 14l8 7L24 7"></path>
                                                </svg>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                                <td class="position-relative">
                                    <a href="javascript:void(0)" rel="nofollow"
                                        class="like cart_del_btn position-absolute"
                                        data-type="w"
                                        data-id="{{ $product->id }}">
                                        <i class="fa-solid fa-xmark text-white"></i>
                                    </a>
                                    <a href="{{ url('/product/' . $product->slug) }}">
                                        <img src="{{ pImagesUrl() . featuredImage($product->id) }}" height="80"
                                            width="80" class="object-cover" alt="{{ $product->title }}">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ url('/product/' . $product->slug) }}" class="text-reset producttitle">
                                        <h3 class="card-title mb-2">{{ $product->title }}</h3>
                                    </a>
                                </td>
                                <td>
                                    @foreach (pricetoquantity($product->product_id) ?? [] as $key => $price)
                                        @if ($loop->first)
                                            @money($price->price)
                                            {{ count(pricetoquantity($product->product_id)) > 1 ? '-' : '' }}
                                        @else
                                            @money($price->price)
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ date('M d, Y', strtotime($product->created_at)) }}</td>
                                <td>{{ checkInstock($product->id) ? 'US In Stock' : 'In Stock' }}</td>
                                <td>
                                    <a href="{{ url('/wistlist/move-to-cart', ['id' => $product->id]) }}"
                                        style="text-wrap:nowrap"
                                        class="btn ab-btn-white ab-btn-brown w-100 small-font text-capitalize"
                                        data-mdb-ripple-color="dark">Add to Cart</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center fw-medium fs-5">Never miss your loved choices</td>
                            </tr>
                        @endforelse
                        <tr>
                            <td colspan="7">
                                <div class="d-flex justify-content-end">
                                    <span style="text-wrap:nowrap" onclick="moveToCart('selected')"
                                        class="btn ab-btn-white ab-btn-brown small-font text-capitalize me-2"
                                        data-mdb-ripple-color="dark">Add Selected to Cart</span>
                                    <span style="text-wrap:nowrap" onclick="moveToCart('all')"
                                        class="btn ab-btn-white bg-black text-white small-font text-capitalize"
                                        data-mdb-ripple-color="dark">Add All to Cart</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
