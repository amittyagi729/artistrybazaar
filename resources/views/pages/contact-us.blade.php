@extends('layouts.app-new', ['body_class' => 'home-page'])
@section('title') Contact Us for Inquiries and Assistance - ArtistryBazaar Inc @stop
@section('meta_description')If you need help or have a question? Contact ArtistryBazaar Inc. today for inquiries, customer support, or customize orders. We're here to assist you.@stop
@section('meta_keywords')Contact Us @stop
@section('content')
    <main class="contactmain-sec">
        <section class="mb-0 mt-3 mt-md-0 resultmain-sec pb-4" style="background-color:var(--primary-color);">
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 mx-auto condition-head">
                        <h1 class="h1 pt-5 pb-md-4 pb-2 ps-2 text-center">Contact Us</h1>
                        <div class="condition-content p-3 bg-white">
                            <div class="row ">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3155.587432813633!2d-121.44504582458295!3d37.72936081477543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80903d2c56b23f39%3A0x2225ecf4f0f3b93c!2s1441%20Divine%20Ln%2C%20Tracy%2C%20CA%2095376%2C%20USA!5e0!3m2!1sen!2sin!4v1695888029785!5m2!1sen!2sin"
                                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-center lh-base">ArtistryBazaar Inc.<br>
                                        1441 Divine Ln, Tracy, CA. 95376</p>
                                    <p class="text-center lh-base"><a href="tel:+17657340500"> +1 (765)-734-0500</a></p>
                                    <p class="text-center lh-base"
                                        style="color: var(--main-color);font-weight: 500;font-family: var(--font-primary); margin-bottom: 0px;">
                                        9 AM to 5 PM EST, Mon-Fri
                                    </p>
                                    <p class="text-center"><a
                                            href="mailto:care@artistrybazaar.com?Subject=ArtistryBazaar%20ContactUs"
                                            target="_top">care@artistrybazaar.com</a></p>
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
