

 <!-- Modal -->
 <div class="modal fade" id="coupon-box" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content coupon-mt-30 copon-width-modal">

             <div class="modal-body">
                 <div class="row">
                     <div class="col-md-4">
                         <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel"
                             data-interval="2000">
                             <div class="carousel-inner">
                                 <div class="carousel-item coupon-crsl-img23 active">
                                     <img src={{ asset('assets/images/one.png') }} class="d-block w-100"
                                         alt="..." />
                                 </div>
                                 <div class="carousel-item coupon-crsl-img23">
                                     <img src={{ asset('assets/images/two.png') }} class="d-block w-100"
                                         alt="..." />
                                 </div>
                                 <div class="carousel-item coupon-crsl-img23">
                                     <img src={{ asset('assets/images/three.png') }} class="d-block w-100"
                                         alt="..." />
                                 </div>
                             </div>
                         </div>

                     </div>
                     <div class="col-md-8 p-26">
                         <div class="coupon-cross-box12">
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                             </button>
                         </div>

                         <div class="text-center mt-1">
                             <img src="https://www.artistrybazaar.com/media/img/artistrybazaar-log.png"
                                 class="coupon-logo-box" />
                         </div>

                         <p class="discount-text">Enjoy a one-time <span class="blink">10% discount </span> on your product price</p>
                         <p class="email-txet51">Need to fill your email</p>
                         <form id="emailForm">
                             <div class="mb-2">
                                 <input type="email" name="email" class="form-control email-input-09" id="cpn-mail">
                             </div>
                             <p class="email-required45 mb-0" style="display: none;">Email is required</p>
                             <div class="text-center">
                                 <button type="submit" id="cpn-sbt-btn" class="btn discount-btn12 w-100 mt-3">Get 10% off
                                    now</button>
                             </div>
                         </form>
                     </div>
                 </div>


             </div>

         </div>
     </div>
 </div>


 <!-- Modal -->
 <div class="modal fade" id="mb-cpnmdl" tabindex="-1" aria-labelledby="mobilecouponModalLabel"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content coupon-mob-mt-30">

             <div class="modal-body">

                 <div class="col-md-8">
                     <div class="coupon-cross-box12">
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                         </button>
                     </div>

                     <div class="text-center mt-1">
                         <img src="https://www.artistrybazaar.com/media/img/artistrybazaar-log.png"
                             class="coupon-logo-box" />
                     </div>
                     <p class="discount-text">Enjoy a one-time <span class="blink">10% discount </span> on your product price</p>
                     <p class="email-txet51">Need to fill your email</p>
                     <form id="emailFormMb">
                         <div class="mb-3">
                             <input type="email" name="email" class="form-control email-input-09" id="cpn-mb-mail">
                         </div>
                         <p class="email-required45 mb-0" style="display: none;">Email is required</p>
                         <div class="text-center">
                             <button type="submit" id="cpn-sbt-btn-mb" class="btn discount-btn12 w-100">Get 10% off
                                now</button>
                         </div>
                     </form>
                 </div>
             </div>

         </div>
     </div>
 </div>
