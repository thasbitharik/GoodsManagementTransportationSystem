<div>
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
                                    {{-- <span>Get a Qote For Free</span> --}}
                                    <h2>Confirm your Dispatch</h2>
                                    {{-- <p>Brook presents your services with flexible, convenient and cdpose layouts.
                                        You can select your favorite layouts & elements for.</p> --}}
                                </div>
                            </div>
                        </div>
                        <style>
                            .input-form {
                                margin-bottom: 20px;
                            }

                            #total_amount {
                                color: #ff5f13 !important;
                            }

                        </style>
                        <form action="/confirm-order" class="contact-form" method="POST">
                            @csrf
                            <div class="row ">
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-form">
                                        <label for="category">Category</label>
                                        <input type="text" value="{{ $data['category']->category_name }}" readonly name="category">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-form">
                                        <label for="subcategory">Sub Category</label>
                                        <input type="text" value="{{ $data['subcategory']->sub_category_name }}" readonly name="subcategory">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-form">
                                        <label for="item_name">Item Name</label>
                                        <input type="text" value="{{ $data['item_name'] }}" name="item_name" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="input-form">
                                        <label for="size">Size</label>
                                        <input type="text" value="{{ $data['size']->size_name }}" name="size" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="input-form">
                                        <label for="delivery">Delivery Type</label>
                                        <input type="text" value="{{ $data['delivery']->delivery_name }}" name="delivery" readonly>
                                    </div>
                                </div>



                                <div class="col-lg-6 col-md-6">
                                    <div class="input-form">
                                        <label for="Drop_off_date">Drop off Date</label>
                                        <input type="text" value="{{ $data['drop_off_date'] }}" name="drop_off_date" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="input-form">
                                        <label for="drop_off_address">Drop off Address</label>
                                        <input type="text" value="{{ $data['drop_off_address'] }}" name="drop_off_address" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="input-form">
                                        <label for="delivery_address">Delivery Address</label>
                                        <input type="text" value="{{ $data['delivery_address'] }}" name="delivery_address" readonly>
                                    </div>
                                </div>
                                <div class="ml-3 mb-3 d-flex">
                                    <h3 class="text-dark">Amount:&nbsp;</h3> <h3 id="total_amount">Rs. {{ number_format($data['totalAmount'], 2) }}</h3>
                                </div>
                                <!-- Button -->
                                <div class="col-lg-12">
                                    <button name="submit" class="submit-btn">Dispatch</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
