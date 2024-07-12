<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Logistic Express </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front_assets/img/favicon.ico') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/style.css') }}">
    @livewireStyles
</head>

<body>
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('front_assets/img/logo/loder.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">
                <div class="header-top d-none d-lg-block">
                    <div class="container">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>
                                        <li><a href="tel:+94 76 45 41 258">Phone: +94 76 45 41 258</a></li>
                                        <li><a href="mailto:logisticexpress.info@gmail.com">Email: logisticexpress.info@gmail.com</a></li>
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                    <ul class="header-social">
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li> <a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom  header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="/"><img src="{{ asset('front_assets/img/logo/logo.png') }}" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li><a href="/">Home</a></li>
                                                <li><a href="/about">About</a></li>
                                                @if(Auth::guard('customer')->check())
                                                <li><a href="/contact">Contact</a></li>
                                                @else
                                                <li><a href="/flogin">Contact</a></li>
                                                @endif
                                                @if(Auth::guard('customer')->check())
                                                <li><a class="text-orange" href="#"><strong>{{Auth::guard('customer')->user()->customer_fname}}</strong></a>
                                                    <ul class="submenu">
                                                        <li><a href="/dispatch-history">Dispatch History</a></li>
                                                        <li><a href="/customer-logout">Logout</a></li>
                                                    </ul>
                                                </li>
                                                @else
                                                <li><a href="/flogin">Login</a></li>
                                                <li><a href="/register">Signup</a></li>
                                                @endif
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- Header-btn -->
                                    @if(Auth::guard('customer')->check())
                                    <div class="header-right-btn d-none d-lg-block">
                                        <a href="/dispatch" class="btn header-btn">Dispatch</a>
                                    </div>
                                    @else
                                    <div class="header-right-btn d-none d-lg-block">
                                        <a href="/flogin" class="btn header-btn">Dispatch</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
        {{-- main content start --}}
        <div>
            {{ $slot }}
        </div>
        {{-- main content end --}}
    </main>
    <footer>
        <!--? Footer Start-->
        <div class="footer-area footer-bg">
            <div class="container">
                <div class="footer-top footer-padding">
                    <!-- footer Heading -->
                    <div class="footer-heading">
                        <div class="row justify-content-between">
                            <div class="col-xl-6 col-lg-8 col-md-8">
                                <div class="wantToWork-caption wantToWork-caption2">
                                    <h2>We Understand The Importance Approaching Each Work!</h2>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4">
                                <span><a href="tel:+94 76 45 41 258" class="contact-number f-right">+94 76 45 41 258</a></span>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Menu -->
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>COMPANY</h4>
                                    <ul>
                                        <li><a href="/about">About Us</a></li>
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/flogin"> Login</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Open hour</h4>
                                    <ul>
                                        <li><a href="#">Monday 11am-7pm</a></li>
                                        <li><a href="#"> Tuesday-Friday 11am-8pm</a></li>
                                        <li><a href="#"> Saturday 10am-6pm</a></li>
                                        <li><a href="#"> Sunday 11am-6pm</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="{{ asset('front_assets/img/logo/logo2_footer.png') }}" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1">Welcome to Logistic Express, your trusted partner for seamless parcel delivery and tracking services.</p>
                                    </div>
                                </div>
                                <!-- Footer Social -->
                                <div class="footer-social ">
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fas fa-globe"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Bottom -->
                <div class="footer-bottom">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-12">
                            <div class="footer-copy-right text-center">
                                <p>

                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved <i class="fa fa-heart"
                                        aria-hidden="true"></i> by <a href="https://nisharu-portfolio.netlify.app/"
                                        target="_blank">Nisharughaan Paramajothy</a>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    @livewireScripts
    <!-- JS here -->
    <script src="{{ asset('front_assets/js/new.js') }}"></script>
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
    <script src="{{ asset('front_assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('front_assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('front_assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('front_assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/slick.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('front_assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('front_assets/js/jquery.magnific-popup.js') }}"></script>

    <!-- Nice-select, sticky -->
    <script src="{{ asset('front_assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/jquery.sticky.js') }}"></script>

    <!-- contact js -->
    {{-- <script src="{{ asset('front_assets/js/contact.js') }}"></script> --}}
    <script src="{{ asset('front_assets/js/jquery.form.js') }}"></script>
    {{-- <script src="{{ asset('front_assets/js/jquery.validate.min.js') }}"></script> --}}
    <script src="{{ asset('front_assets/js/mail-script.js') }}"></script>
    {{-- <script src="{{ asset('front_assets/js/jquery.ajaxchimp.min.js') }}"></script> --}}

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('front_assets/js/plugins.js') }}"></script>
    <script src="{{ asset('front_assets/js/main.js') }}"></script>
</body>

</html>
