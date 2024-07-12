<div>
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="{{ asset('front_assets/img/hero/about.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap">
                            <h2>Dispatch</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item"><a href="/dispatch">Dispatch</a></li>
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
        .input-form {
            margin-bottom: 20px;
        }

        .amount {
            color: #ff5f13 !important;
        }

    </style>

    <section class="contact-form-area section-bg  pt-115 pb-120 fix">
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
                                    <span>Get a Qote For Free</span>
                                    <h2>Dispatch</h2>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- form -->
                        <form action="/calculate-amount" class="contact-form" method="GET">
                            {{-- @csrf --}}
                            <div class="row ">
                                <div class="col-lg-6 col-md-6">
                                    <div class="select-items">
                                        <label for="category">Category</label>
                                        <select name="category" id="category">
                                            <option value="">--Select Category--</option>
                                            @foreach ($category_list as $cat)
                                        <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="select-items">
                                        <label for="sub_category">Sub Category</label>
                                        <select name="sub_category" id="sub_category">
                                            <option value="">--Select Sub Category--</option>
                                            @foreach ($subcategory_list as $sub_cat)
                                        <option value="{{$sub_cat->id}}">{{$sub_cat->sub_category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-form">
                                        <label for="item_name">Item Name</label>
                                        <input type="text" placeholder="Item Name" name="item_name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="select-items">
                                        <label for="size">Size</label>
                                        <select name="size" id="size">
                                            <option value="">--Select Size--</option>
                                            @foreach ($size_list as $category)
                                            <option value="{{$category->id}}">{{$category->size_name}} ({{ $category->dimension }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="select-items">
                                        <label for="delivery_type">Delivery Type</label>
                                        <select name="delivery_type" id="delivery_type">
                                            <option value="">--Select Delivery Type--</option>
                                            @foreach ($delivery_list as $delivery)
                                            <option value="{{$delivery->id}}">{{$delivery->delivery_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6">
                                    <div class="input-form">
                                        <label for="Drop_off_date">Drop off Date</label>
                                        <input type="date" placeholder="Item Name" name="drop_off_date">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="input-form">
                                        <label for="drop_off_address">Drop off Address</label>
                                        <input type="text" placeholder="Drop Off Address" name="drop_off_address">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="input-form">
                                        <label for="drop_off_address">Delivery Address</label>
                                        <input type="text" placeholder="Delivery Address" name="delivery_address">
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="col-lg-12">
                                    <button name="submit" class="submit-btn">Request a Quote</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
