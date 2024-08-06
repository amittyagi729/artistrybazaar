@extends('layouts.app', ['body_class' => 'home-page'])
@section('title') Thank You @stop
@section('meta_description') Thank You @stop
@section('meta_keywords') Thank You @stop
@section('content')
    <style>
        /* Custom CSS for the thank you page */
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
            /* Use the Google Font */
        }

        .thank-you-card {
            max-width: 800px;
            margin: 40px auto;
            /* Increased top and bottom margin */
            padding: 20px;
            text-align: center;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .order-confirmed-heading {
            font-size: 36px;
            /* Adjust the font size as needed */
            color: #333;
            /* Green color for the heading */
            margin-bottom: 20px;
            /* Increase or decrease as needed */
        }

        .green-checkmark {
            font-size: 64px;
            color: var(--main-color);
            animation: tick 2s infinite;
            /* Green checkmark animation */
        }

        @keyframes tick {
            0% {
                transform: scale(0);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>
    <section>
        @php $currency = config('constants.currency'); @endphp
        @php $imgUrl = pImagesUrl(); @endphp
        <div class="container mt-1">
            <div class="row">
                <div class="col-md-12">
                    @php
                        $getorderItems = orderItems($order_id);
                        $getorderDetails = orderDetails($order_number);
                    @endphp
                    <?php
                    $firstItem = $getorderItems->first();
                    $firstItemId = $firstItem['product_id'];
                    $isInstock = checkInstock($firstItemId);
                    ?>

                    @php
                        $currentDate = \Carbon::now();
                        if ($isInstock) {
                            $futureDate = $currentDate->addDays(5);
                        } else {
                            $futureDate = $currentDate->addDays(30);
                        }

                        $shipmentDate = $futureDate->format('d F Y');
                    @endphp

                    <div class="thank-you-card">
                        <h1 class="order-confirmed-heading mb-0">Order Confirmed</h1>
                        <div class="green-checkmark">&#10004;</div>

                        <!-- Your provided code starts here -->
                        @php
                            $order_number = $order_number;
                            $id = $order_id;
                            // $user = auth()->user();
                            if (auth()->check()) {
                                $user = auth()->user();
                            } else {
                                $email = \Session::get('guestUserEmail');
                                $user = \App\Models\User::where('email', $email)->first();
                            }
                        @endphp
                        <p style="background-color: #f0f0f0; color: #000; padding: 10px; line-height: 25px;">
                            Hello {{ $user->first_name }},<br>
                            We have received your order. Your tentative delivery date is {{ $shipmentDate }} or as
                            discussed.<br>
                            Please refer to your order no.{{ $order_number }} for any future queries.
                        </p>

                        <!-- Mobile design -->

                        @php
                            $orderItemsMobile = orderItems($id);
                            $orderDetailsMobile = orderDetails($order_number);
                        @endphp

                        @php $shipAddressMobile = getAddress($orderDetailsMobile->shipping_id); @endphp
                        @php $billAddressMobile = getAddress($orderDetailsMobile->billing_id); @endphp

                        <div class="address-container mt-2 mb-2 web-none">
                            <h5>Shipping Address </h5>
                            <p>
                                {{ $shipAddressMobile->address_line1 ?? null }}</b>
                                {{ implode(
                                    ', ',
                                    array_filter([
                                        $shipAddressMobile->address_line2 ?? null,
                                        $shipAddressMobile->city ?? null,
                                        $shipAddressMobile->state ?? null,
                                        $shipAddressMobile->country->name ?? null,
                                    ]),
                                ) }}
                            </p>
                            <h5>Billing Address </h5>
                            <p>
                                {{ $billAddressMobile->address_line1 ?? null }}</b>
                                {{ implode(
                                    ', ',
                                    array_filter([
                                        $billAddressMobile->address_line2 ?? null,
                                        $billAddressMobile->city ?? null,
                                        $billAddressMobile->state ?? null,
                                        $billAddressMobile->country->name ?? null,
                                    ]),
                                ) }}
                            </p>
                        </div>
                        <div>
                            <div class="col-md-4 mt-3 mt-md-0 web-none">

                                <div class="spaecificarions spaecificarions-list bg-white p-lg-4 p-3 mb-3 specificarions">
                                    <h2 class="h2">Order Overview</h2>
                                    @foreach ($orderItemsMobile as $key => $items)
                                        <ul class="list-group list-group-flush">
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                                @php $featuredImageMobile = featuredImage($items->product_id); @endphp
                                                @php $product = getproduct($items->product_id); @endphp
                                                <?php if(!empty($featuredImageMobile)){ ?>
                                                <a href="#"><img width="50" height="50"
                                                        src="{{ $imgUrl . $featuredImageMobile }}"
                                                        class="attachment-thumbnail size-thumbnail"
                                                        alt="{{ $product->title }}"></a>
                                                <?php } else { ?>
                                                <a href="#">
                                                    <img id="blahs" width="40" height="10"
                                                        src="https://i.ibb.co/4N43TL3/placeholder.jpg" alt="your image" />
                                                </a>
                                                <?php } ?>
                                                {{-- <img id="blahs" width="50" height="50" src="https://artistrybazaar.s3.amazonaws.com/Khurja/FE-KJ-103/1.jpg" alt="your image" /> --}}

                                                <span class="price-tag long-text-name">
                                                    {{ $product->title }}
                                                </span>

                                            </li>

                                            <!-- <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 long-text-name">
                          Wholesale Ceramic Mini Elephant Planter - Hand Painted Red With Black Highlights - Drainage Hole – Buy Bulk Garden / Patio / Outdoor / Indoor Décor Accessories
                          </li> -->

                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                                Price/Unit
                                                <span class="price-tag">{{ $currency }}{{ $items->price ?? null }}
                                                </span>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                                Qty
                                                <span class="price-tag">{{ $items->quantity }} </span>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                                Amount
                                                <span class="price-tag">
                                                    @php  $totalAmt = $items->price * $items->quantity; @endphp
                                                    {{ $currency }}{{ $totalAmt }}
                                                </span>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                                Total Weight
                                                <span>
                                                    @php $totalWeight = $items->product->weight * $items->quantity; @endphp {!! $totalWeight / 1000 !!} Kilograms
                                                </span>
                                            </li>
                                            {{-- <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                     Total Amount
                      <span class="price-tag">
                            $480
                         </span>
                      </li> --}}
                                        </ul>
                                    @endforeach
                                    <hr>

                                </div>
                            </div>


                            <div
                                class="web-none spaecificarions spaecificarions-list bg-white p-lg-4 p-3 mb-3 specificarions">
                                <h2 class="h2">Product Cost</h2>
                                <ul class="list-group list-group-flush">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        Product Amount
                                        <span>
                                            {{ $currency }}
                                            {{ $orderDetailsMobile->subtotal + $orderDetailsMobile->discount }}
                                        </span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        Discount
                                        <span>
                                            {{ $currency }}
                                            {{ $orderDetailsMobile->discount }}
                                        </span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        After Discount Product Amount
                                        <span>
                                            {{ $currency }}
                                            {{ $orderDetailsMobile->subtotal }}
                                        </span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        Shipping Cost
                                        <span>
                                            {{ $currency }}
                                            {{ $orderDetailsMobile->shipping }}
                                        </span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        Total Amount Paid({{ $percentAmountFinal }}%)
                                        <span>
                                            {{ $currency }}
                                            {{ $orderDetailsMobile->paid }}
                                        </span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        Rest Payable Amount
                                        <span>
                                            {{ $currency }}
                                            {{ $orderDetailsMobile->remaining }}
                                        </span>
                                    </li>
                                </ul>

                            </div>
                            <!-- Mobile design end-->

                            <div id="emaildivcontent" class="product_wrap mobile-none">
                                <table class="table table-bordered"
                                    style="width:100%; border: 1px solid #ddd;border-collapse: collapse;">
                                    <thead>
                                        <tr style="background-color: #f0f0f0;">
                                            <th style="border: 1px solid #ddd;padding: 8px;">Product Name</th>
                                            <th style="border: 1px solid #ddd;padding: 8px;" class="numeric">Price/Unit</th>
                                            <th style="border: 1px solid #ddd;padding: 8px;" class="numeric"
                                                style="width:20%">
                                                Qty</th>
                                            <th style="border: 1px solid #ddd;padding: 8px;" class="numeric"
                                                style="width: 13%;">Amount</th>
                                            <th style="border: 1px solid #ddd;padding: 8px;" class="numeric"
                                                style="width: 13%;">Total Weight</th>
                                            <th style="border: 1px solid #ddd;padding: 8px;" class="numeric">Shipping Date
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $orderItems = orderItems($id);
                                            $orderDetails = orderDetails($order_number);
                                        @endphp
                                        @foreach ($orderItems as $key => $items)
                                            <tr id="items_cover {{ $key + 1 }}">
                                                <td style="border: 1px solid #ddd;padding: 8px;">
                                                    @php $featuredImage = featuredImage($items->product_id); @endphp
                                                    @php $product = getproduct($items->product_id); @endphp
                                                    <div class="row">
                                                        <div class="text-start col-3"><?php if(!empty($featuredImage)){ ?>
                                                            <a href="#"><img width="50" height="50"
                                                                    src="{{ $imgUrl . $featuredImage }}"
                                                                    class="attachment-thumbnail size-thumbnail"
                                                                    alt="{{ $product->title }}"></a>
                                                            <?php } else { ?>
                                                            <a href="#">
                                                                <img id="blahs" width="40" height="10"
                                                                    src="https://i.ibb.co/4N43TL3/placeholder.jpg"
                                                                    alt="your image" />
                                                            </a>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="col-9">
                                                            {{ $product->title }}
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div style="color:inherit; text-decoration:none;">UPC:
                                                        {{ $items->product->upc }}</div>
                                                </td>
                                                <td style="vertical-align: middle; border: 1px solid #ddd;padding: 8px;"
                                                    class="numeric"><span id="price-{{ $key }}"
                                                        class="fw">{{ $currency }}{{ $items->price ?? null }}</span>
                                                </td>
                                                <td style="vertical-align: middle; border: 1px solid #ddd;padding: 8px;">
                                                    <span class="fw">{{ $items->quantity }}</span></td>
                                                <td style="vertical-align: middle; border: 1px solid #ddd;padding: 8px;">
                                                    <span class="fw">
                                                        @php  $totalAmt = $items->price * $items->quantity; @endphp
                                                        {{ $currency }}{{ $totalAmt }}</span></td>
                                                <td style="vertical-align: middle; border: 1px solid #ddd;padding: 8px;">
                                                    <span class="fw">@php $totalWeight = $items->product->weight * $items->quantity; @endphp {!! $totalWeight / 1000 !!}
                                                        Kilograms </span></td>
                                                <td style="vertical-align: middle; border: 1px solid #ddd;padding: 8px;">
                                                    <span class="fw">{{ date('Y-m-d', strtotime(' + 30 days')) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <td style="border: 1px solid #ddd;padding: 8px;">
                                            <table style="width:100%">
                                                <tr>
                                                    <td style="font-weight: bold;">Shipping Address</td>
                                                    <td style="font-weight: bold;">Billing Address</td>
                                                </tr>
                                                <tr>
                                                    @php $shipAddress = getAddress($orderDetails->shipping_id); @endphp
                                                    @php $billAddress = getAddress($orderDetails->billing_id); @endphp
                                                    <td>{{ $shipAddress->address_line1 ?? null }}</b>
                                                        {{ implode(
                                                            ', ',
                                                            array_filter([
                                                                $shipAddress->address_line2 ?? null,
                                                                $shipAddress->city ?? null,
                                                                $shipAddress->state ?? null,
                                                                $shipAddress->country->name ?? null,
                                                            ]),
                                                        ) }}
                                                    </td>
                                                    <td>{{ $billAddress->address_line1 ?? null }}</b>
                                                        {{ implode(
                                                            ', ',
                                                            array_filter([
                                                                $billAddress->address_line2 ?? null,
                                                                $billAddress->city ?? null,
                                                                $billAddress->state ?? null,
                                                                $billAddress->country->name ?? null,
                                                            ]),
                                                        ) }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td style="border: 1px solid #ddd;padding: 8px;" colspan="6" style="padding: 0;">
                                            <table class="table table-bordered"
                                                style="margin: 0 !important; border:none;border-collapse: collapse; width:100%;">
                                                <tbody>
                                                    <tr>
                                                        <td style="border: 1px solid #ddd;padding: 8px;">Product Amount
                                                        </td>
                                                        <td style="border: 1px solid #ddd;padding: 8px;">
                                                            <b>{{ $currency }}
                                                                {{ $orderDetails->subtotal + $orderDetails->discount }}</b>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="border: 1px solid #ddd;padding: 8px;">Discount</td>
                                                        <td style="border: 1px solid #ddd;padding: 8px;">
                                                            <b>{{ $currency }}
                                                                {{ $orderDetails->discount }}</b></td>
                                                    </tr>
                                                    <td style="border: 1px solid #ddd;padding: 8px;">After Discount Product
                                                        Amount</td>
                                                    <td style="border: 1px solid #ddd;padding: 8px;">
                                                        <b>{{ $currency }}
                                                            {{ $orderDetails->subtotal }}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border: 1px solid #ddd;padding: 8px;">Shipping Cost</td>
                                                        <td style="border: 1px solid #ddd;padding: 8px;">
                                                            <b>{{ $currency }}
                                                                {{ $orderDetails->shipping }}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border: 1px solid #ddd;padding: 8px;">Total Order Amount
                                                        </td>
                                                        <td style="border: 1px solid #ddd;padding: 8px;">
                                                            <b>{{ $currency }}
                                                                {{ $orderDetails->grand_total }}</b></td>
                                                        <input type="hidden" id="subtotals" class="fw">
                                                    </tr>


                                                    <tr>
                                                        <td style="border: 1px solid #ddd;padding: 8px;">Total Amount Paid
                                                            ({{ $percentAmountFinal }}%) </td>
                                                        <td style="border: 1px solid #ddd;padding: 8px;">
                                                            <b>{{ $currency }}
                                                                {{ $orderDetails->paid }}</b></td>
                                                        <input type="hidden" id="subtotal" class="fw">
                                                    </tr>
                                                    <tr>
                                                        <td style="border: 1px solid #ddd;padding: 8px;">Rest Payable
                                                            Amount </td>
                                                        <td style="border: 1px solid #ddd;padding: 8px;">
                                                            <b>{{ $currency }}
                                                                {{ $orderDetails->remaining }}</b></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            Thank you for your order. We appreciate your order.
                            You are a valued client and we want you to enjoy buying at ArtistryBazaar.
                            Please share any feedback/suggestions with us at <a
                                href="mailto:care@artistrybazaar.com">care@artistrybazaar.com</a>. We would love to hear
                            from
                            you.

                            <!-- Your provided code ends here -->

                            {{-- <a href="#" class="btn btn-primary mt-4">Continue Shopping</a> --}}
                        </div>

                        <div class="d-md-flex align-items-center justify-content-center mt-5 pb-5">
                            <a href="{{ url('/category/featured') }}"
                                class="btn btn-outline-dark btn-lg ripple-surface-dark"
                                data-mdb-ripple-color="dark">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MQXXFHW6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

@endsection
