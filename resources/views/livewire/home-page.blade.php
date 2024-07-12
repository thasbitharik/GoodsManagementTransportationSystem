<!--? slider Area Start-->
<div class="slider-area">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-9">
                        <div class="hero__caption">
                            <h1>Safe & Reliable <span>Logistic</span> Solutions!</h1>
                        </div>
                        <!--Hero form -->
                        {{-- <form action="#" class="search-box">
                            <div class="input-form">
                                <input type="text" placeholder="Your Tracking ID">
                            </div>
                            <div class="search-form">
                                <a href="#">Track & Trace</a>
                            </div>
                        </form> --}}
                        {{-- drgdergerg --}}
                        @if(Auth::guard('customer')->check())
                        <div class="d-lg-block">
                            <a href="/dispatch" class="btn">Dispatch</a>
                            <a href="/dispatch-history" class="btn ml-2">Dispatch History</a>
                        </div>
                        <!-- Hero Pera -->
                        <div class="hero-pera">
                            <a href="/contact">
                                <p>For order status inquiry</p>
                            </a>
                        </div>
                        @else
                        <div class="d-lg-block">
                            <a href="/flogin" class="btn">Dispatch</a>
                            <a href="/flogin" class="btn ml-2">Tracking</a>
                        </div>
                        <!-- Hero Pera -->
                        <div class="hero-pera">
                            <a href="/flogin">
                                <p>For order status inquiry</p>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->
<!--? our info Start -->
<div class="our-info-area pt-70 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-info mb-30">
                    <div class="info-icon">
                        <span class="flaticon-support"></span>
                    </div>
                    <div class="info-caption">
                        <p>Call Us Anytime</p>
                        <span>+94 76 45 41 258</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-info mb-30">
                    <div class="info-icon">
                        <span class="flaticon-clock"></span>
                    </div>
                    <div class="info-caption">
                        <p>Sunday CLOSED</p>
                        <span>Mon - Sat 8.00 - 18.00</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-info mb-30">
                    <div class="info-icon">
                        <span class="flaticon-place"></span>
                    </div>
                    <div class="info-caption">
                        <p>No.1. St.Patrick's Road</p>
                        <span>Jaffna, 40000</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- our info End -->
<!--? Categories Area Start -->
<div class="categories-area section-padding30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Section Tittle -->
                <div class="section-tittle text-center mb-80">
                    <span>Our Services</span>
                    <h2>What We Can Do For You</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-cat text-center mb-50">
                    <div class="cat-icon">
                        <span class="flaticon-shipped"></span>
                    </div>
                    <div class="cat-cap">
                        <h5><a href="">Deliver Anywhere</a></h5>
                        <p class="text-justify">Our comprehensive transportation services cover a vast array of items nationwide, guaranteeing dependable and streamlined logistics solutions. We are committed to comprehending your individual needs and operational procedures to deliver flawless service. Irrespective of the size of your consignment,
                            be it small parcels or large cargo, rest assured that we will manage your shipment with the highest degree of attentiveness and professionalism,
                            ensuring its safe and timely transportation.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-cat text-center mb-50">
                    <div class="cat-icon">
                        <span class="flaticon-ship"></span>
                    </div>
                    <div class="cat-cap">
                        <h5><a href="">On-time Delivery</a></h5>
                        <p class="text-justify">We specialize in on-time delivery of a diverse range of items throughout the country, ensuring reliable and efficient transportation services. With our commitment to comprehending your specific needs and workflows, we are able to offer seamless logistics solutions.
                            Whether it's shipping small packages or handling large shipments, you can have complete confidence in our ability to transport your items punctually,
                             all while maintaining the highest standards of care and professionalism</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-cat text-center mb-50">
                    <div class="cat-icon">
                        <span class="flaticon-plane"></span>
                    </div>
                    <div class="cat-cap">
                        <h5><a href="">Privacy and Secure</a></h5>
                        <p class="text-justify">At Logistic Express, we prioritize privacy and security throughout our transportation services. We understand the importance of safeguarding your sensitive information and valuable goods.
                            With a strong focus on privacy protection, we employ robust security measures to ensure the confidentiality and integrity of your shipments.
                             Our commitment to maintaining a secure environment means you can trust us to handle your items with the utmost privacy and provide a secure logistics experience you can rely on.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Categories Area End -->

<!--? Testimonial Start -->
<div class="testimonial-area testimonial-padding section-bg" data-background="{{ asset('front_assets/img/gallery/section_bg04.jpg') }}">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-7 col-lg-7">
                <!-- Section Tittle -->
                <div class="section-tittle section-tittle2 mb-25">
                    <span>Clients Testimonials</span>
                    <h2>What Our Clients Say!</h2>
                </div>
                <div class="h1-testimonial-active mb-70">
                    <!-- Single Testimonial -->
                    @if($list_data)
                    @foreach ($list_data as $row)
                    <div class="single-testimonial ">
                        <!-- Testimonial Content -->
                        <div class="testimonial-caption ">
                            <div class="testimonial-top-cap">
                                <p class="text-justify">{{ $row->comments }}
                                </p>
                            </div>
                            <!-- founder -->
                            <div class="testimonial-founder d-flex align-items-center">
                                <div class="founder-img">
                                    <img src="{{ asset('front_assets/img/gallery/Homepage_testi.png') }}" alt="">
                                </div>
                                <div class="founder-text">
                                    <span class="text-orange"><strong>{{ $row->customer_fname }}</strong></span>
                                    <p>{{ $row->title }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <!-- Form Start -->
            <div class="col-xl-5 col-lg-5 col-md-8">
                <div class="testimonial-form text-center">
                    <h3>Always listening, always understanding.</h3>
                    <form action="/customer-review" method="POST">
                        @csrf
                        <input type="text" placeholder="Title" name="title">
                        <input type="text" placeholder="Comment" name="comments" style="height: 100px;">
                        <button name="submit" class="submit-btn">Review</button>
                    </form>
                </div>
            </div>
            <!-- Form End -->
        </div>
    </div>
</div>
<!-- Testimonial End -->
