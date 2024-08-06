@extends('layouts.app-new', ['body_class' => 'home-page'])
@section('title') Bulk Artisanal Products for B2B – ArtistryBazaar Inc @stop
@section('meta_description') ArtistryBazaar Inc. is an online place for high quality handmade artisanal products in bulk for B2B. Get remarkable quality at wholesale prices. Visit Now! @stop
@section('meta_keywords') artisanal products, bulk artisanal products, wholesale artisanal products @stop
<style>
    p.text-justify {
        text-align: justify;
    }

    .condition-head .h1 {
        font-size: 36px;
        line-height: 38px;
        color: var(--heading-color);
        font-family: var(--font-primary);
        font-weight: 700;
    }

    .condition-head p {
        color: #969594;
        font-size: 14px;
        line-height: 24px;
        margin-bottom: 6px;
    }

    .condition-head .h2 {
        font-size: 18px;
        line-height: 22px;
    }

    @media only screen and (max-device-width: 767px) {
        .condition-head .h2 {
            font-size: 16px;
            line-height: 22px;
        }

    }
</style>
@section('content')
    <!-- about us -->
    {{-- <section class="container py-5 mt-3 mb-3">
    <h1 class="text-center  mb-4 about-us">{{ $page->post_title }}</h1>
    <p class="text-center">{!! $page->post_content !!}</p>
</section> --}}

    <main class="aboutmain-sec">
        <section class="mb-0 mt-3 mt-md-0 resultmain-sec pb-4" style="background-color:var(--primary-color);">
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 mx-auto condition-head">
                        <h1 class="h1 pt-5 pb-md-4 pb-2 text-capitalize ps-2 text-center">About Us</h1>
                        <div class="condition-content p-4 bg-white">
                            <div class="row mb-5">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <img src="{{ asset('/media/imgs/handmade-figurines.jpg') }}" class="rounded"
                                        width="100%" alt="">
                                </div>
                                <div class="col-md-6">
                                    <h2 class="h2 text-uppercase text-center" style="color:#e0688c;">Welcome to
                                        Artistrybazaar</h2>
                                    <p class="text-black" style="text-align:justify;">Where we take pride in bringing to you
                                        the finest handmade artisanal products from rural parts of India. Our mission is to
                                        delight you with beautiful distinctive handcrafted home décor furnishings and
                                        utilities that celebrate the spirit of creativity.</p>
                                    <br>
                                    <p class="text-black" style="text-align:justify;">We aim to promote and preserve
                                        traditional art forms inherited from ancestors and passed down through generations
                                        by directly sourcing our products from skilled craftsmen and artisans. Working
                                        closely with the artists we translate these crafts into functional product designs
                                        suitable for your beautiful homes and office spaces.</p>
                                    <p class="text-black fw-bold text-center text-uppercase">‘Our Inspiration Our Story Our
                                        Mission! What Got Us Started! Uplifting Artisan Communities And
                                        Handcrafted Art!’ </p>
                                </div>
                            </div>

                            <h2 class="h2 text-center mb-4" style="color:#e0688c;">What Our Buyers are Saying</h2>
                            <div class="row px-md-4">
                                <div class="col-md-5 mb-4 mb-md-0">
                                    <p class="fw-bolder mb-1 lh-sm">Delicate, Artistic products. Incredibly fast shipping
                                    </p>
                                    <p class="text-justify lh-base">I must say that I was incredibly surprised to see the
                                        orders delivered so fast especially when the product shipped from India. I must say
                                        that I have had comments from various customers how beautiful the product is and the
                                        delicate and artistic art work put into these hand crafted items. </p>
                                    <p class="text-black mt-3 mb-1 fw-bold">Tim R</p>
                                    <p class="text-black mb-0">Wicks Sticks & Stones <br> Home Décor, Colorado</p>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-5 mb-4 mb-md-0">
                                    <p class="fw-bolder mb-1 lh-sm">Remarkable quality at a reasonable price</p>
                                    <p class="text-justify lh-base">I found ArtistryBazaar Leather and Silk Journals to be a
                                        quality and affordable addition to our merchandise assortment. The quality of
                                        workmanship is quite remarkable, at a reasonable price! The Customer Service Team
                                        has also been very helpful in resolving any issues in a quick and efficient manner!
                                    </p>
                                    <p class="text-black mt-3 mb-1 fw-bold">Phil Johnson </p>
                                    <p class="text-black mb-0">University of Pittsburgh <br> Pittsburgh, PA 15260</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
            </div>
        </section>

    </main>


@endsection
