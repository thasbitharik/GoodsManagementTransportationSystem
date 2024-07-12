<!--? slider Area Start-->
<div class="slider-area ">
    <div class="single-slider hero-overly slider-height2 d-flex align-items-center"
        data-background="{{ asset('front_assets/img/hero/about.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap">
                        <h2>Tracking</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="/tracking">Tracking</a></li>
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
    .hh-grayBox {
        background-color: #f8f8f8;
        margin-bottom: 20px;
        padding: 35px;
        margin-top: 20px;
    }

    .pt45 {
        padding-top: 45px;
    }

    .order-tracking {
        text-align: center;
        width: 20%;
        position: relative;
        display: block;
    }

    .order-tracking .is-complete {
        display: block;
        position: relative;
        border-radius: 50%;
        height: 30px;
        width: 30px;
        border: 0px solid #afafaf;
        background-color: #f7be16;
        margin: 0 auto;
        transition: background 0.25s linear;
        -webkit-transition: background 0.25s linear;
        z-index: 2;
    }

    .order-tracking .is-complete:after {
        display: block;
        position: absolute;
        content: "";
        height: 14px;
        width: 7px;
        top: -2px;
        bottom: 0;
        left: 5px;
        margin: auto 0;
        border: 0px solid #afafaf;
        border-width: 0px 2px 2px 0;
        transform: rotate(45deg);
        opacity: 0;
    }

    .order-tracking.completed .is-complete {
        border-color: #27aa80;
        border-width: 0px;
        background-color: #27aa80;
    }

    .order-tracking.completed .is-complete:after {
        border-color: #fff;
        border-width: 0px 3px 3px 0;
        width: 7px;
        left: 11px;
        opacity: 1;
    }

    .order-tracking p {
        color: #a4a4a4;
        font-size: 16px;
        margin-top: 8px;
        margin-bottom: 0;
        line-height: 20px;
    }

    .order-tracking p span {
        font-size: 14px;
    }

    .order-tracking.completed p {
        color: #000;
    }

    .order-tracking::before {
        content: "";
        display: block;
        height: 3px;
        width: calc(100% - 40px);
        background-color: #f7be16;
        top: 13px;
        position: absolute;
        left: calc(-50% + 20px);
        z-index: 0;
    }

    .order-tracking:first-child:before {
        display: none;
    }

    .order-tracking.completed:before {
        background-color: #27aa80;
    }
</style>

<section class="section-padding30">
    <div class="container">
        {{-- <div class="slider-area" style="background: #e9e9e9;
        padding: 80px;
        border-radius: 8px;">
            <form action="#" class="search-box">
                <div class="input-form">
                    <input type="text"  placeholder="Your Tracking NO.">
                </div>
                <div class="search-form">
                    <a href="#">Track</a>
                </div>
            </form>
        </div> --}}

        @if (sizeOf($trackview)!=0)

        <div class="mt-3" style="background: #e9e9e9;
        padding: 80px;
        border-radius: 8px;">
                <h3 class="text-center">
                    Your Tracking Number : {{ $trackview[0]->tracking_number }}
                </h3>
            <div class="row">
                <div class="col-12 col-md-12 pt45 pb20">
                    <div class="row justify-content-between">
                        <div class="order-tracking {{ ($trackview[0]->status)== 0 ? 'completed' : '' }}">
                            <span class="is-complete"></span>
                            <p>Pending<br><span>
                                @if(($trackview[0]->status)== 0)
                                {{ \Carbon\Carbon::parse($trackview[0]->updated_at)->format('F j, Y, g:i a') }}
                                @endif
                            </span></p>
                        </div>
                        <div class="order-tracking {{ ($trackview[0]->status)== 1 ? 'completed' : '' }}">
                            <span class="is-complete"></span>
                            <p>Taken Away<br><span>
                                @if(($trackview[0]->status)== 1)
                                {{ \Carbon\Carbon::parse($trackview[0]->updated_at)->format('F j, Y, g:i a') }}
                                @endif
                            </span></p>
                        </div>
                        <div class="order-tracking {{ ($trackview[0]->status)== 2 ? 'completed' : '' }}">
                            <span class="is-complete"></span>
                            <p>WareHouse<br><span>
                                @if(($trackview[0]->status)== 2)
                                {{ \Carbon\Carbon::parse($trackview[0]->updated_at)->format('F j, Y, g:i a') }}
                                @endif
                            </span></p>
                        </div>
                        <div class="order-tracking {{ ($trackview[0]->status)== 3 ? 'completed' : '' }}">
                            <span class="is-complete"></span>
                            <p>Dispatched<br><span>
                                @if(($trackview[0]->status)== 3)
                                {{ \Carbon\Carbon::parse($trackview[0]->updated_at)->format('F j, Y, g:i a') }}
                                @endif
                            </span></p>
                        </div>
                        <div class="order-tracking {{ ($trackview[0]->status)== 4 ? 'completed' : '' }}">
                            <span class="is-complete"></span>
                            <p>Delivered<br><span>
                                @if(($trackview[0]->status)== 4)
                                {{ \Carbon\Carbon::parse($trackview[0]->updated_at)->format('F j, Y, g:i a') }}
                                @endif
                            </span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endif

    </div>
</section>
