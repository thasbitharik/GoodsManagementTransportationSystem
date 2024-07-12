<!--? slider Area Start-->
<div class="slider-area ">
    <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="{{ asset('front_assets/img/hero/about.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap">
                        <h2>About us</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="/about">About</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->
<!--? About Area Start -->
<div class="about-low-area section-padding30">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="about-caption mb-50">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-35">
                        <span>About Our Company</span>
                        <h2>Safe Logistic & Transport Solutions That Saves our Valuable Time!</h2>
                    </div>
                    <p class="text-justify">Welcome to Logistic Express, your trusted partner for seamless parcel delivery and tracking services. We pride ourselves on providing reliable,
                        efficient, and secure logistics solutions tailored to meet your unique needs. With our extensive network of delivery partners and cutting-edge technology,
                        we ensure that your packages are handled with utmost care and delivered to their destinations in a timely manner.
                        Our user-friendly tracking system allows you to easily monitor the progress of your shipments, providing real-time updates and peace of mind.
                        At Logistic Express, we are committed to delivering excellence in every aspect of our service, from exceptional customer support to transparent communication.
                        Trust us to simplify your logistics experience and make shipping hassle-free. Choose Logistic Express for a reliable,
                        efficient, and convenient parcel delivery and tracking solution</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <!-- about-img -->
                <div class="about-img ">
                    <div class="about-font-img">
                        <img src="{{ asset('front_assets/img/gallery/about2.png') }}" alt="">
                    </div>
                    <div class="about-back-img d-none d-lg-block">
                        <img src="{{ asset('front_assets/img/gallery/about1.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Area End -->
<!--? Testimonial Start -->
<div class="testimonial-area testimonial-padding section-bg" data-background="{{ asset('front_assets/img/gallery/section_bg04.jpg') }}">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-12 col-lg-12">
                <!-- Section Tittle -->
                <div class="section-tittle section-tittle2 mb-25">
                    <span>Clients Testimonials</span>
                    <h2>What Our Clients Say!</h2>
                </div>
                <div class="h1-testimonial-active mb-70">
                    <!-- Single Testimonial -->
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
                </div>
            </div>
            {{-- <!-- Form Start -->
            <div class="col-xl-4 col-lg-5 col-md-8">
                <div class="testimonial-form text-center">
                    <h3>Always listening, always understanding.</h3>
                    <input type="text" placeholder="Incoterms">
                    <button name="submit" class="submit-btn">Request a Quote</button>
                </div>
            </div>
            <!-- Form End --> --}}
        </div>
    </div>
</div>
<!-- Testimonial End -->
