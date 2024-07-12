<!--? slider Area Start-->
<div class="slider-area ">
    <div class="single-slider hero-overly slider-height2 d-flex align-items-center"
        data-background="{{ asset('front_assets/img/hero/about.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap">
                        <h2>Login</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Login</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<section class="section-padding30">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5 mb-2">
                <img src="{{asset('front_assets/img/Login/login.png')}}" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <style>
                    .clicktoregister:hover {
                        color: #ff5f13 !important;
                    }

                    .login-card {
                        background: #e9e9e9;
                        /* padding: 80px; */
                        border-radius: 8px;
                        padding-left:20px;
                        padding-right:20px;
                        padding-top:20px;
                        border: none;
                        font-size: 15px !important;
                    }
                    .login-card input{
                        /* border: none !important; */
                    }
                    .login-card ::placeholder{
                        font-size: 15px !important;
                    }
                </style>
                <form method="POST" action="/customer-login">
                    @csrf
                    <!-- Email input -->
                    <div class="card shadow-2-strong login-card">
                        <h3 class="text-center">LOGIN</h3>
                        <div class="form-outline mb-4"
                            style="margin:10px">
                            <input type="email" id="email" class="form-control form-control-lg @error('customer_email')
                        is-invalid @enderror" name="customer_email" value="{{old('customer_email')}}"
                                placeholder="Enter Email address" required autocomplete="email" autofocus />
                            {{-- <label class="form-label" for="form3Example3">Email address</label> --}}
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3"
                            style="margin:10px;">
                            <input type="password" id="password" class="form-control form-control-lg @error('password')
                        is-invalid @enderror" name="password" placeholder="Enter password" required
                                autocomplete="current-password" />
                            <i class="bi bi-eye-slash" id="togglePassword" onclick="myFunction();"
                                style="float:right; margin-top:-35px; margin-right:18px;cursor: pointer;"></i>
                            {{-- <label class="form-label" for="form3Example4">Password</label> --}}
                        </div>
                        <div class="text-center text-white text-lg-start mt-3 "
                            style="margin-right: 10px; margin-left:10px; margin-bottom:20px;">
                            <center>
                                <button type="submit" class="btn btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                    Login </button>
                            </center>
                            <br>

                            <h6 class="text-center">Don't have an account?
                                <a href="/register" class="clicktoregister"> Click here to Register</a>
                            </h6>
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    function myFunction() {
        document.getElementById("togglePassword").classList.toggle("bi-eye");

        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
