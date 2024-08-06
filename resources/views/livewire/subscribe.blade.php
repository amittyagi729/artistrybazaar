<section class="pb-lg-4 mb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 mx-auto">
                <div class="pb-2">
                    <h4 class="fw-normal text-black mb-2 " style="font-size: 16px;line-height:25px">Join Our Newsletter</h4>
                    <h2 class="fw-semibold text-black mb-2" style="font-size: 20px;line-height:32px">Get Our Emails or info on new items, sales and more.</h2>
                    <p class="text-black" style="font-size: 16px;line-height:25px">Recieve an exclusive 10% Discount code when you Signup</p>
                </div>
                <div class="newsletter-form">
                    <form>
                        <div class="form-group d-md-flex justify-content-around">
                            <input type="text" wire:model="email"
                                class="py-2 px-3 w-100 mt-0 mb-md-0 border-0 border-bottom text-black rounded-0"
                                placeholder="Enter your email">
                            <button wire:click.prevent="subscribe"
                                class="btn btn-warning custom-ani">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
