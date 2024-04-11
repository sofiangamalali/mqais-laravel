@extends('layouts.app')
@php
    $lang = LaravelLocalization::getCurrentLocale();

@endphp
@section('content')
    @include('includes.carousel')

    <style>
        body {
            background: #d8d9d9;
        }

        .sectionheading {
            padding: 20px;
            width: 82%;
            margin: auto;
            background: white;
        }

        .sectionheading h1 {
            position: relative;
            padding: 0;
            margin: 0;
            font-family: "Raleway", sans-serif;
            font-weight: 300;
            font-size: 40px;
            color: #080808;
            -webkit-transition: all 0.4s ease 0s;
            -o-transition: all 0.4s ease 0s;
            transition: all 0.4s ease 0s;
        }

        .sectionheading h1 span {
            display: block;
            font-size: 0.5em;
            line-height: 1.3;
        }

        .sectionheading h1 em {
            font-style: normal;
            font-weight: 600;
        }

        .two h1 {
            text-transform: capitalize;
        }

        .two h1:before {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 60px;
            height: 4px;
            content: "";
            background-color: #00A7E0;
        }

        .two h1 span {
            font-size: 13px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 4px;
            line-height: 3em;
            padding-left: 0.25em;
            color: rgba(0, 0, 0, 0.4);
            padding-bottom: 10px;
        }

        .alt-two h1 {
            text-align: center;
        }

        .alt-two h1:before {
            left: 50%;
            margin-left: -30px;
        }

        .container {
            width: 82%;
            margin: auto;
            padding: 10px;
            display: grid;
            gap: 1rem;
            background: white;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));

        }



        .product {
            flex-grow: 1;
            width: 230px;
            height: 300px;
            margin: 20px;
            background: #d8d9d9;
            border-radius: 5px;
            box-shadow: 5px 5px 10px #686666;
            transition: 0.2s;
        }

        .product:hover {
            cursor: pointer;
            height: 302px;
            width: 232px;
            box-shadow: 5px 10px 15px #383737;
        }

        .product .pic {
            width: 100%;
            height: 75%;
            border-top-right-radius: 5px;
            border-top-left-radius: 5px;
            background: #00A7E0;
            overflow: hidden;
        }

        .product .pic img {
            width: 100%;
            height: 100%;
        }

        .product .description {
            width: 100%;
            margin-top: 10px;
            text-align: center;
        }

        .viewallproducts {
            padding: 50px;
            width: 82%;
            margin: auto;
            text-align: center;
            background: #FFFFFF
        }

        @media screen and (max-width: 700px) {
            .container {
                display: block;


            }

            .product {
                margin: auto;

            }
        }
    </style>
    <div class="sectionheading">
        <div class="two alt-two">
            <h1>{{ __('lang.Product Center') }}
                <span><h2>{{ __('lang.Best Seller') }}</h2></span>
            </h1>
        </div>
    </div>


    <div class="container">
        @forelse ($homeProducts as $product)
            <div class="product" onclick="javascript:window.location.href='{{ route('product') }}/{{ $product['id'] }}'">
                <div class="pic">
                    <img src="{{ asset('storage/products/' . $product['image'] . '') }}" alt="">
                </div>
                <div class="description">
                    {{ $product['' . $lang . '_name'] }}
                </div>
            </div>
        @empty
            <p>{{ __('lang.there is no products') }}</p>
        @endforelse

    </div>

    <div class="viewallproducts">
        <style>
            /* CSS */
            .button-36 {
                background: #00A7E0;
                border-radius: 8px;
                border-style: none;
                box-sizing: border-box;
                color: #FFFFFF;
                cursor: pointer;
                flex-shrink: 0;
                /* font-family: "Inter UI", "SF Pro Display", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif; */
                font-size: 16px;
                font-weight: 500;
                height: 4rem;
                padding: 0 1.6rem;
                text-align: center;
                text-shadow: rgba(0, 0, 0, 0.25) 0 3px 8px;
                transition: all .5s;
                user-select: none;
                -webkit-user-select: none;
                touch-action: manipulation;
            }

            .button-36:hover {
                box-shadow: rgba(80, 63, 205, 0.5) 0 1px 30px;
                transition-duration: .1s;
            }

            @media (min-width: 768px) {
                .button-36 {
                    padding: 0 2.6rem;
                }
            }
        </style>
        <!-- HTML !-->
        <button class="button-36" onclick="javascript:window.location.href='{{ route('products') }}'"
            role="button">{{ __('lang.View All Products') }}</button>


    </div>

    <style>
        .slideimg {
            width: 100%;
        }

        .slideimg img {
            width: 100%;
            height: 300px;
        }

        @media screen and (max-width:700px) {
            .slideimg img {
                height: 180px;
            }
        }
    </style>
    <div class="slideimg">
        <img src="{{ URL::asset('images/slide1.jpg') }}" alt="">
    </div>

    <div class="sectionheading">
        <div class="two alt-two">
            <h1>{{ __('lang.Our Clinets') }}
                <span><h2>{{ __('lang.DESCOVER MORE PRODUCTS') }}</h2></span>
            </h1>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <script>
        $(document).ready(function() {

            $('.customer-logos').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 3
                    }
                }, {
                    breakpoint: 620,
                    settings: {
                        slidesToShow: 2
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 1
                    }
                }]
            });
        });
    </script>
    <style>
        h2 {
            text-align: center;
            padding: 20px;
        }

        /* Slider */

        .slick-slide {
            margin: 0px 20px;
        }

        .slick-slide img {
            width: 100%;
        }

        .slick-slider {
            position: relative;
            display: block;
            box-sizing: border-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-touch-callout: none;
            -khtml-user-select: none;
            -ms-touch-action: pan-y;
            touch-action: pan-y;
            -webkit-tap-highlight-color: transparent;
        }

        .slick-list {
            position: relative;
            display: block;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        .slick-list:focus {
            outline: none;
        }

        .slick-list.dragging {
            cursor: pointer;
            cursor: hand;
        }

        .slick-slider .slick-track,
        .slick-slider .slick-list {
            -webkit-transform: translate3d(0, 0, 0);
            -moz-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        .slick-track {
            position: relative;
            top: 0;
            left: 0;
            display: block;
        }

        .slick-track:before,
        .slick-track:after {
            display: table;
            content: '';
        }

        .slick-track:after {
            clear: both;
        }

        .slick-loading .slick-track {
            visibility: hidden;
        }

        .slick-slide {
            display: none;
            float: left;
            height: 100%;
            min-height: 1px;
        }

        [dir='rtl'] .slick-slide {
            float: right;
        }

        .slick-slide img {
            display: block;
        }

        .slick-slide.slick-loading img {
            display: none;
        }

        .slick-slide.dragging img {
            pointer-events: none;
        }

        .slick-initialized .slick-slide {
            display: block;
        }

        .slick-loading .slick-slide {
            visibility: hidden;
        }

        .slick-vertical .slick-slide {
            display: block;
            height: auto;
            border: 1px solid transparent;
        }

        .slick-arrow.slick-hidden {
            display: none;
        }

        /* .customer-logos .slide{
                                width: 200px;
                                height:200px;
                            } */
        .customer-logos .slide img {
            width: 180px;
            height: 180px;
        }

        .customer-logos * {
            direction: ltr;
        }

        @media screen and (max-width:520px) {

            .customer-logos .slide img {
                width: 290px;
                height: 290px;
            }
        }
    </style>
    <div class="container" style="padding-bottom:30px;">
        <section class="customer-logos slider">
            <div class="slide"><img src="https://image.freepik.com/free-vector/3d-box-logo_1103-876.jpg"></div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/luxury-letter-e-logo-design_1017-8903.jpg">
            </div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg"></div>
            <div class="slide"><img
                    src="https://image.freepik.com/free-vector/colors-curl-logo-template_23-2147536125.jpg"></div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/abstract-cross-logo_23-2147536124.jpg">
            </div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/football-logo-background_1195-244.jpg">
            </div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/background-of-spots-halftone_1035-3847.jpg">
            </div>
        </section>
    </div>

    <div class="slideimg">
        <img src="{{ URL::asset('images/slide2.jpg') }}" alt="">
    </div>

    <style>
        .converter-container {
            width: 82%;
            margin: auto;
            background: white;
            padding: 50px;
        }

        .converter {
            width: 50%;
            height: 250px;
            margin: auto;
            background: #d8d9d9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 5px 5px 10px #686666;


        }



        .converter h2 {
            text-align: center;
            margin-bottom: 15px
        }

        .converter hr {
            margin: auto;
            width: 200px;
            height: 3px;
            background: #00A7E0;
            outline: none;
            border: none;
            margin-bottom: 20px
        }

        .input-group,
        .output-group {
            display: flex;
            margin-bottom: 20px;
        }

        .converter input[type="number"] {
            flex: 1;
            padding: 8px;
            outline: none;
            border: none;
        }

        .converter select {
            flex: 1;
            padding: 8px;
            outline: none;
            border: none;
        }

        .converter #output-value {
            background-color: #f5f5f5;
            cursor: not-allowed;
        }

        @media screen and (max-width: 700px) {
            .converter {
                width: 100%;
            }
        }
    </style>
    <div class="converter-container">
        <div class="converter">
            <h2>{{ __('lang.Pressure Unit Conversion') }}</h2>
            <hr>
            <div class="input-group">
                <input type="number" id="input-value" placeholder="Enter value">
                <select id="input-unit">
                    <option value="bar">bar</option>
                    <option value="mbar">mbar</option>
                    <option value="kpa">kPa</option>
                    <option value="mpa">MPa</option>
                    <option value="kgcm2">kg/cm²</option>
                    <option value="psi">psi</option>
                    <option value="mmhg">mmHg</option>
                    <option value="inhg">inHg</option>
                    <option value="inh2o">inH₂O</option>
                </select>
            </div>
            <div class="output-group">
                <input type="number" id="output-value" placeholder="Converted value" readonly>
                <select id="output-unit">
                    <option value="bar">bar</option>
                    <option value="mbar">mbar</option>
                    <option value="kpa">kPa</option>
                    <option value="mpa">MPa</option>
                    <option value="kgcm2">kg/cm²</option>
                    <option value="psi">psi</option>
                    <option value="mmhg">mmHg</option>
                    <option value="inhg">inHg</option>
                    <option value="inh2o">inH₂O</option>
                </select>
            </div>
            <script>
                function convertPressure() {
                    const inputValue = document.getElementById('input-value').value;
                    const inputUnit = document.getElementById('input-unit').value;
                    const outputUnit = document.getElementById('output-unit').value;
                    let outputValue;

                    // Conversion logic
                    switch (inputUnit) {
                        case 'bar':
                            outputValue = convertFromBar(inputValue, outputUnit);
                            break;
                        case 'mbar':
                            outputValue = convertFromMbar(inputValue, outputUnit);
                            break;
                        case 'kpa':
                            outputValue = convertFromKpa(inputValue, outputUnit);
                            break;
                        case 'mpa':
                            outputValue = convertFromMpa(inputValue, outputUnit);
                            break;
                        case 'kgcm2':
                            outputValue = convertFromKgCm2(inputValue, outputUnit);
                            break;
                        case 'psi':
                            outputValue = convertFromPsi(inputValue, outputUnit);
                            break;
                        case 'mmhg':
                            outputValue = convertFromMmHg(inputValue, outputUnit);
                            break;
                        case 'inhg':
                            outputValue = convertFromInHg(inputValue, outputUnit);
                            break;
                        case 'inh2o':
                            outputValue = convertFromInH2O(inputValue, outputUnit);
                            break;
                    }

                    document.getElementById('output-value').value = outputValue.toFixed(2);
                }

                function convertFromBar(value, unit) {
                    switch (unit) {
                        case 'bar':
                            return value;
                        case 'mbar':
                            return value * 1000;
                        case 'kpa':
                            return value * 100;
                        case 'mpa':
                            return value / 10;
                        case 'kgcm2':
                            return value * 1.01971621;
                        case 'psi':
                            return value * 14.5037738;
                        case 'mmhg':
                            return value * 750.0616827;
                        case 'inhg':
                            return value * 29.529983071;
                        case 'inh2o':
                            return value * 401.463867458;
                    }
                }

                function convertFromMbar(value, unit) {
                    switch (unit) {
                        case 'bar':
                            return value / 1000;
                        case 'mbar':
                            return value;
                        case 'kpa':
                            return value / 10;
                        case 'mpa':
                            return value / 10000;
                        case 'kgcm2':
                            return value * 0.0101971621;
                        case 'psi':
                            return value * 0.0145037738;
                        case 'mmhg':
                            return value * 0.7500616827;
                        case 'inhg':
                            return value * 0.029529983071;
                        case 'inh2o':
                            return value * 0.401463867458;
                    }
                }

                function convertFromKpa(value, unit) {
                    switch (unit) {
                        case 'bar':
                            return value / 100;
                        case 'mbar':
                            return value * 10;
                        case 'kpa':
                            return value;
                        case 'mpa':
                            return value / 1000;
                        case 'kgcm2':
                            return value * 0.0101971621;
                        case 'psi':
                            return value * 0.145037738;
                        case 'mmhg':
                            return value * 7.500616827;
                        case 'inhg':
                            return value * 0.29529983071;
                        case 'inh2o':
                            return value * 4.01463867458;
                    }
                }

                function convertFromMpa(value, unit) {
                    switch (unit) {
                        case 'bar':
                            return value * 10;
                        case 'mbar':
                            return value * 10000;
                        case 'kpa':
                            return value * 1000;
                        case 'mpa':
                            return value;
                        case 'kgcm2':
                            return value * 10.1971621298;
                        case 'psi':
                            return value * 145.0377377302;
                        case 'mmhg':
                            return value * 7500.6168270417;
                        case 'inhg':
                            return value * 295.2998307144;
                        case 'inh2o':
                            return value * 4014.6386745948;
                    }
                }

                function convertFromKgCm2(value, unit) {
                    switch (unit) {
                        case 'bar':
                            return value * 0.980665;
                        case 'mbar':
                            return value * 98.0665;
                        case 'kpa':
                            return value * 98.0665;
                        case 'mpa':
                            return value * 0.0980665;
                        case 'kgcm2':
                            return value;
                        case 'psi':
                            return value * 14.2233433;
                        case 'mmhg':
                            return value * 735.5592401;
                        case 'inhg':
                            return value * 28.959019419;
                        case 'inh2o':
                            return value * 393.7007874016;
                    }
                }

                function convertFromPsi(value, unit) {
                    switch (unit) {
                        case 'bar':
                            return value * 0.0689475728;
                        case 'mbar':
                            return value * 68.947572932;
                        case 'kpa':
                            return value * 6.8947572932;
                        case 'mpa':
                            return value * 0.0068947573;
                        case 'kgcm2':
                            return value * 0.070307;
                        case 'psi':
                            return value;
                        case 'mmhg':
                            return value * 51.7149308;
                        case 'inhg':
                            return value * 2.0360209363;
                        case 'inh2o':
                            return value * 27.679904842;
                    }
                }

                function convertFromMmHg(value, unit) {
                    switch (unit) {
                        case 'bar':
                            return value * 0.00133322368;
                        case 'mbar':
                            return value * 1.333223874;
                        case 'kpa':
                            return value * 0.1333223874;
                        case 'mpa':
                            return value * 0.0001333224;
                        case 'kgcm2':
                            return value * 0.00135951014;
                        case 'psi':
                            return value * 0.0193367758;
                        case 'mmhg':
                            return value;
                        case 'inhg':
                            return value * 0.0393700787;
                        case 'inh2o':
                            return value * 0.5352400629;
                    }
                }

                function convertFromInHg(value, unit) {
                    switch (unit) {
                        case 'bar':
                            return value * 0.0338638816;
                        case 'mbar':
                            return value * 33.863881579;
                        case 'kpa':
                            return value * 3.3863881579;
                        case 'mpa':
                            return value * 0.0033863882;
                        case 'kgcm2':
                            return value * 0.0345319894;
                        case 'psi':
                            return value * 0.4911540761;
                        case 'mmhg':
                            return value * 25.4;
                        case 'inhg':
                            return value;
                        case 'inh2o':
                            return value * 13.5950996674;
                    }
                }

                function convertFromInH2O(value, unit) {
                    switch (unit) {
                        case 'bar':
                            return value * 0.00248842;
                        case 'mbar':
                            return value * 2.48842;
                        case 'kpa':
                            return value * 0.248842;
                        case 'mpa':
                            return value * 0.000248842;
                        case 'kgcm2':
                            return value * 0.002540006;
                        case 'psi':
                            return value * 0.0360911906;
                        case 'mmhg':
                            return value * 1.8683248016;
                        case 'inhg':
                            return value * 0.0735559132;
                        case 'inh2o':
                            return value;
                    }
                }

                document.getElementById('input-value').addEventListener('input', convertPressure);
                document.getElementById('input-unit').addEventListener('change', convertPressure);
                document.getElementById('output-unit').addEventListener('change', convertPressure);
            </script>
        </div>
    </div>
@endsection
@extends('includes.floatingButton')
