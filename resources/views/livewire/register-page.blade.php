<!--? slider Area Start-->
<div class="slider-area ">
    <div class="single-slider hero-overly slider-height2 d-flex align-items-center"
        data-background="{{ asset('front_assets/img/hero/about.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap">
                        <h2>Register</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="/register">Register</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<style>
    .clicktoregister:hover {
        color: #ff5f13 !important;
    }
    .input-form{
        margin-bottom: 20px;
    }
</style>

<section class="contact-form-area section-bg pt-115 pb-120 fix">
    <div class="container">
        <div class="row justify-content-end">
            <!-- Contact wrapper -->
            <div class="col-xl-12 col-lg-12">
                <div class="contact-form-wrapper">
                    <!-- From tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Section Tittle -->
                            <div class="section-tittle mb-50">
                                <h2>Register</h2>
                                <p>Create your account here...</p>
                            </div>
                        </div>
                    </div>
                    <!-- form -->
                    <form class="contact-form" action="/customer-register" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="input-form">
                                    <input type="text" placeholder="First Name" name="first_name">
                                    @error('first_name')
                                    <small class="text-danger text-sm">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-form">
                                    <input type="text" placeholder="Last Name" name="last_name">
                                    @error('last_name')
                                    <small class="text-danger text-sm">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-form">
                                    <input type="number" placeholder="Mobile No." name="mobile_no">
                                    @error('mobile_no')
                                    <small class="text-danger text-sm">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-form">
                                    <input type="text" placeholder="Email" name="email">
                                    @error('email')
                                    <small class="text-danger text-sm">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-form">
                                    <input type="password" placeholder="Password" name="password">
                                    @error('password')
                                    <small class="text-danger text-sm">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-form">
                                    <input type="password" placeholder="Confirm Password" name="confirm_password">
                                    @error('confirm_password')
                                    <small class="text-danger text-sm">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-form">
                                    <input type="text" style="height:100px" placeholder="Address" name="address">
                                    @error('address')
                                    <small class="text-danger text-sm">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- Button -->
                            <div class="col-lg-12">
                                <button type="submit" class="submit-btn"><strong>register</strong></button>
                            </div>

                            <div class="m-auto">
                                <h6 class="mt-3">Already have an account?
                                    <a href="/flogin" class="link-danger clicktoregister"> Click here to Login</a>
                                </h6>
                            </div>

                            @if (session()->has('message'))
                            <div wire:ignore.self x-transition.duration.500ms x-data="{open: true}"
                                x-init="setTimeout(() => {open = false}, 1500) " x-show="open"
                                class="alert alert-success" id="alert" style="height:45px">
                                {{-- <button type="button" class="close btn btn-sm" data-dismiss="alert"
                                    style="margin-top: -7px">X</button>
                                --}}
                                <div class="text-center" style="margin-top: -3px"> {{ session('message') }} </div>
                            </div>
                            @endif

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
