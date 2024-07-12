<!--? slider Area Start-->
<div class="slider-area ">
    <div class="single-slider hero-overly slider-height2 d-flex align-items-center"
        data-background="{{ asset('front_assets/img/hero/about.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap">
                        <h2>Contact Us</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="/contact">Contact</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->
<!-- ================ contact section start ================= -->
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Get in Touch</h2>
            </div>
            <div class="col-lg-8">
                <form class="form-contact contact_form" id="contactForm" novalidate="novalidate" action="/customer-contact" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="contact_message" id="message" cols="30" rows="9"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                                    placeholder=" Enter Message"></textarea>
                                    @error('contact_message')
                                    <small class="text-danger text-sm">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="subject" id="subject" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'"
                                    placeholder="Enter Subject">
                                    @error('subject')
                                    <small class="text-danger text-sm">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit"class="button button-contactForm boxed-btn">
                            Send
                        </button>
                    </div>
                    @if (session()->has('message'))
                    <div wire:ignore.self x-transition.duration.500ms x-data="{open: true}"
                        x-init="setTimeout(() => {open = false}, 1500) " x-show="open" class="alert alert-success"
                        id="alert" style="height:45px">
                        {{-- <button type="button" class="close btn btn-sm" data-dismiss="alert"
                            style="margin-top: -7px">X</button>
                        --}}
                        <div class="text-center" style="margin-top: -3px"> {{ session('message') }} </div>
                    </div>
                    @endif
                </form>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>No.1. St.Patrick's Road</h3>
                        <p>Jaffna, 40000</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3><a href="tel:+94 76 45 41 258">+94 76 45 41 258</a></h3>
                        <p>Mon to Fri 9am to 6pm</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3><a href="mailto:logisticexpress.info@gmail.com">logisticexpress.info@gmail.com</a></h3>
                        <p>Send us your query anytime!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->
