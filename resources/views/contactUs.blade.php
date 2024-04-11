@php
    $lang = LaravelLocalization::getCurrentLocale();
@endphp
@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .contactUs {
            width: 80%;
            margin: auto;
        }

        * {}

        .contact_us_green .responsive-container-block {
            min-height: 75px;
            height: fit-content;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            margin-top: 0px;
            margin-right: auto;
            margin-bottom: 60px;
            margin-left: auto;
        }

        .contact_us_green input:focus {
            outline-color: initial;
            outline-style: none;
            outline-width: initial;
        }

        .contact_us_green textarea:focus {
            outline-color: initial;
            outline-style: none;
            outline-width: initial;
        }

        .contact_us_green .text-blk {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
            line-height: 25px;
        }

        .contact_us_green .responsive-cell-block {
            min-height: 75px;
        }

        .contact_us_green .responsive-container-block.container {
            max-width: 1320px;
            margin-top: 60px;
            margin-right: auto;
            margin-bottom: 60px;
            margin-left: auto;
        }

        .contact_us_green .responsive-container-block.big-container {
            padding-top: 0px;
            padding-right: 50px;
            padding-bottom: 0px;
            padding-left: 50px;
        }

        .contact_us_green .text-blk.contactus-head {
            font-size: 40px;
            line-height: 50px;
            font-weight: 700;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 10px;
            margin-left: 0px;
        }

        .contact_us_green .text-blk.contactus-subhead {
            max-width: 385px;
            color: #939393;
            font-size: 18px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 50px;
            margin-left: 0px;
        }

        .contact_us_green .contact-svg {
            padding-top: 0px;
            padding-right: 25px;
            padding-bottom: 0px;
            padding-left: 0px;
            width: 65px;
            height: 40px;
        }

        .contact_us_green .social-media-links {
            margin-top: 80px;
            margin-right: auto;
            margin-bottom: 0px;
            margin-left: auto;
            width: 250px;
            display: flex;
            justify-content: space-evenly;
        }

        .contact_us_green .social-svg {
            width: 35px;
            height: 35px;
        }

        .contact_us_green .text-box {
            display: flex;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 50px;
            margin-left: 0px;
        }

        .contact_us_green .contact-text {
            color: #939393;
        }

        .contact_us_green .input {
            height: 50px;
            width: 90%;
            border-top-width: 2.5px;
            border-right-width: 2.5px;
            border-bottom-width: 2.5px;
            border-left-width: 2.5px;
            border-top-style: solid;
            border-right-style: solid;
            border-bottom-style: solid;
            border-left-style: solid;
            border-top-color: #a2a2a2;
            border-right-color: #a2a2a2;
            border-bottom-color: #a2a2a2;
            border-left-color: #a2a2a2;
            border-image-source: initial;
            border-image-slice: initial;
            border-image-width: initial;
            border-image-outset: initial;
            border-image-repeat: initial;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;
            font-size: 16px;
            padding-top: 5px;
            padding-right: 15px;
            padding-bottom: 5px;
            padding-left: 15px;
        }

        .contact_us_green .textinput {
            height: 200px;
            width: 95%;
            border-top-width: 2px;
            border-right-width: 2px;
            border-bottom-width: 2px;
            border-left-width: 2px;
            border-top-style: solid;
            border-right-style: solid;
            border-bottom-style: solid;
            border-left-style: solid;
            border-top-color: #a2a2a2;
            border-right-color: #a2a2a2;
            border-bottom-color: #a2a2a2;
            border-left-color: #a2a2a2;
            border-image-source: initial;
            border-image-slice: initial;
            border-image-width: initial;
            border-image-outset: initial;
            border-image-repeat: initial;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;
            font-size: 16px;
            padding-top: 20px;
            padding-right: 30px;
            padding-bottom: 20px;
            padding-left: 20px;
        }

        .contact_us_green .submit-btn {
            min-width: 290px;
            height: 60px;
            background-color: #00A7E0;
            font-size: 18px;
            font-weight: 700;
            color: white;
            border-top-width: 2px;
            border-right-width: 2px;
            border-bottom-width: 2px;
            border-left-width: 2px;
            border-top-style: none;
            border-right-style: none;
            border-bottom-style: none;
            border-left-style: none;
            border-top-color: #767676;
            border-right-color: #767676;
            border-bottom-color: #767676;
            border-left-color: #767676;
            border-image-source: initial;
            border-image-slice: initial;
            border-image-width: initial;
            border-image-outset: initial;
            border-image-repeat: initial;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;
            margin-top: 0px;
            margin-right: auto;
            margin-bottom: 0px;
            margin-left: auto;
            cursor: pointer;
        }

        .contact_us_green .btn-wrapper {
            display: flex;
            justify-content: center;
        }

        .contact_us_green .text-blk.input-title {
            font-size: 18px;
            font-weight: 600;
            line-height: 28px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 15px;
            margin-left: 0px;
        }

        .contact_us_green .responsive-cell-block.wk-ipadp-6.wk-tab-12.wk-mobile-12.wk-desk-6 {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 30px;
            margin-left: 0px;
        }

        .contact_us_green .responsive-cell-block.wk-tab-12.wk-mobile-12.wk-desk-5.wk-ipadp-10 {
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 60px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .contact_us_green .head-text-box {
            display: none;
        }

        .contact_us_green .line {
            border-right-width: 1.8px;
            border-right-style: solid;
            border-right-color: #a2a2a2;
        }

        .contact_us_green .responsive-cell-block.wk-tab-12.wk-mobile-12.wk-desk-7.wk-ipadp-10.line {
            padding-top: 0px;
            padding-right: 20px;
            padding-bottom: 0px;
            padding-left: 0px;
        }

        @media (max-width: 1024px) {
            .contact_us_green .responsive-container-block.container {
                justify-content: center;
            }

            .contact_us_green .text-blk.contactus-subhead {
                max-width: 90%;
            }

            .contact_us_green .head-text-box {
                display: block;
            }

            .contact_us_green .responsive-cell-block.wk-tab-12.wk-mobile-12.wk-desk-7.wk-ipadp-10.line {
                padding-top: 0px;
                padding-right: 20px;
                padding-bottom: 60px;
                padding-left: 0px;
            }

            .contact_us_green .line {
                border-right-width: initial;
                border-right-style: none;
                border-right-color: initial;
                border-bottom-width: 1.8px;
                border-bottom-style: solid;
                border-bottom-color: #a2a2a2;
            }

            .contact_us_green .responsive-cell-block.wk-tab-12.wk-mobile-12.wk-desk-5.wk-ipadp-10 {
                margin-top: 60px;
                margin-right: 0px;
                margin-bottom: 0px;
                margin-left: 0px;
            }

            .contact_us_green .workik-contact-bigbox {
                display: flex;
            }

            .contact_us_green .responsive-cell-block.wk-tab-12.wk-mobile-12.wk-desk-5.wk-ipadp-10 {
                padding-top: 0px;
                padding-right: 0px;
                padding-bottom: 0px;
                padding-left: 0px;
            }
        }

        @media (max-width: 768px) {
            .contact_us_green .text-content {
                display: none;
            }

            .contact_us_green .input {
                width: 100%;
            }

            .contact_us_green .textinput {
                width: 100%;
            }

            .contact_us_green .text-blk.contactus-head {
                font-size: 30px;
            }
        }

        @media (max-width: 500px) {
            .contact_us_green .responsive-container-block.big-container {
                padding-top: 0px;
                padding-right: 20px;
                padding-bottom: 0px;
                padding-left: 20px;
            }

            .contact_us_green .workik-contact-bigbox {
                display: block;
            }

            .contact_us_green .text-blk.input-title {
                font-size: 16px;
            }

            .contact_us_green .text-blk.contactus-head {
                font-size: 26px;
            }

            .contact_us_green .text-blk.contactus-subhead {
                font-size: 16px;
                line-height: 23px;
            }

            .contact_us_green .input {
                height: 45px;
            }

            .contact_us_green .responsive-cell-block.wk-ipadp-6.wk-tab-12.wk-mobile-12.wk-desk-6 {
                margin: 0 0 25px 0;
            }
        }

        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800&amp;display=swap');

        *,
        *:before,
        *:after {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            margin: 0;
        }

        .wk-desk-1 {
            width: 8.333333%;
        }

        .wk-desk-2 {
            width: 16.666667%;
        }

        .wk-desk-3 {
            width: 25%;
        }

        .wk-desk-4 {
            width: 33.333333%;
        }

        .wk-desk-5 {
            width: 41.666667%;
        }

        .wk-desk-6 {
            width: 50%;
        }

        .wk-desk-7 {
            width: 58.333333%;
        }

        .wk-desk-8 {
            width: 66.666667%;
        }

        .wk-desk-9 {
            width: 75%;
        }

        .wk-desk-10 {
            width: 83.333333%;
        }

        .wk-desk-11 {
            width: 91.666667%;
        }

        .wk-desk-12 {
            width: 100%;
        }

        @media (max-width: 1024px) {
            .wk-ipadp-1 {
                width: 8.333333%;
            }

            .wk-ipadp-2 {
                width: 16.666667%;
            }

            .wk-ipadp-3 {
                width: 25%;
            }

            .wk-ipadp-4 {
                width: 33.333333%;
            }

            .wk-ipadp-5 {
                width: 41.666667%;
            }

            .wk-ipadp-6 {
                width: 50%;
            }

            .wk-ipadp-7 {
                width: 58.333333%;
            }

            .wk-ipadp-8 {
                width: 66.666667%;
            }

            .wk-ipadp-9 {
                width: 75%;
            }

            .wk-ipadp-10 {
                width: 83.333333%;
            }

            .wk-ipadp-11 {
                width: 91.666667%;
            }

            .wk-ipadp-12 {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .wk-tab-1 {
                width: 8.333333%;
            }

            .wk-tab-2 {
                width: 16.666667%;
            }

            .wk-tab-3 {
                width: 25%;
            }

            .wk-tab-4 {
                width: 33.333333%;
            }

            .wk-tab-5 {
                width: 41.666667%;
            }

            .wk-tab-6 {
                width: 50%;
            }

            .wk-tab-7 {
                width: 58.333333%;
            }

            .wk-tab-8 {
                width: 66.666667%;
            }

            .wk-tab-9 {
                width: 75%;
            }

            .wk-tab-10 {
                width: 83.333333%;
            }

            .wk-tab-11 {
                width: 91.666667%;
            }

            .wk-tab-12 {
                width: 100%;
            }
        }

        @media (max-width: 500px) {
            .wk-mobile-1 {
                width: 8.333333%;
            }

            .wk-mobile-2 {
                width: 16.666667%;
            }

            .wk-mobile-3 {
                width: 25%;
            }

            .wk-mobile-4 {
                width: 33.333333%;
            }

            .wk-mobile-5 {
                width: 41.666667%;
            }

            .wk-mobile-6 {
                width: 50%;
            }

            .wk-mobile-7 {
                width: 58.333333%;
            }

            .wk-mobile-8 {
                width: 66.666667%;
            }

            .wk-mobile-9 {
                width: 75%;
            }

            .wk-mobile-10 {
                width: 83.333333%;
            }

            .wk-mobile-11 {
                width: 91.666667%;
            }

            .wk-mobile-12 {
                width: 100%;
            }
        }
    </style>

    <style>
        .sectionheading {
            margin-top: 30px;
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
    </style>
    @if ($lang=='ar')
        <style>
            .contact_us_green .line{
                
                border-right: none;
            }
        </style>
    @endif
    @if (Session::has('success'))
        @include('includes.notifications.success')
    @elseif(Session::has('failed'))
        @include('includes.notifications.failed')
    @endif
    <div class="sectionheading">
        <div class="two alt-two">
            <h1>{{__('lang.Contact Us')}}
                <span>{{__('lang.Reach Our Suppliers')}}</span>
            </h1>
        </div>
    </div>

    <div class="contactUs">
        <div class="contact_us_green">
            <div class="responsive-container-block big-container">
                <div class="responsive-container-block container">
                    <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-7 wk-ipadp-10 line" id="i69b-2">
                        <form class="form-box" method="POST" action="{{ route('contactUs.send') }}">
                            @csrf
                            <div class="container-block form-wrapper">
                                <div class="head-text-box">
                                    <p class="text-blk contactus-head">
                                        {{__('lang.Contact us')}}
                                    </p>
                                    <p class="text-blk contactus-subhead">
                                        {{__('lang.Contact us Content')}}
                                    </p>
                                </div>
                                <div class="responsive-container-block">
                                    <div class="responsive-cell-block wk-ipadp-6 wk-tab-12 wk-mobile-12 wk-desk-6"
                                        id="i10mt-6">
                                        <p class="text-blk input-title">
                                            {{__('lang.FIRST NAME')}}
                                        </p>
                                        <input class="input" id="ijowk-6" name="FirstName">
                                        @error('FirstName')
                                            <center>
                                                <p style="color:red">{{ $message }}</p>
                                            </center>
                                        @enderror
                                    </div>
                                    <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                                        <p class="text-blk input-title">
                                            {{__('lang.LAST NAME')}}
                                        </p>
                                        <input class="input" id="indfi-4" name="LastName">
                                        @error('LastName')
                                            <center>
                                                <p style="color:red">{{ $message }}</p>
                                            </center>
                                        @enderror
                                    </div>
                                    <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                                        <p class="text-blk input-title">
                                            {{__('lang.EMAIL')}}
                                        </p>
                                        <input class="input" id="ipmgh-6" name="Email">
                                        @error('Email')
                                            <center>
                                                <p style="color:red">{{ $message }}</p>
                                            </center>
                                        @enderror
                                    </div>
                                    <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                                        <p class="text-blk input-title">
                                            {{__('lang.PHONE NUMBER')}}
                                        </p>
                                        <input class="input" id="imgis-5" name="PhoneNumber">
                                        @error('PhoneNumber')
                                            <center>
                                                <p style="color:red">{{ $message }}</p>
                                            </center>
                                        @enderror
                                    </div>
                                    <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12"
                                        id="i634i-6">
                                        <p class="text-blk input-title">
                                            {{__('lang.WHAT DO YOU HAVE IN MIND')}}
                                        </p>
                                        <textarea class="textinput" id="i5vyy-6" name="Message" placeholder="{{__('lang.Please enter query')}}"></textarea>
                                        @error('Message')
                                            <center>
                                                <p style="color:red">{{ $message }}</p>
                                            </center>
                                        @enderror
                                    </div>
                                    <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12"
                                        id="i634i-6">
                                        <p class="text-blk input-title">
                                            {{__('lang.Captcha')}}
                                        </p>
                                        <style>
                                            .captcha {

                                                width: 50%;
                                                height: 50px
                                            }

                                            .captcha span {
                                                float: left;
                                                width: 60%;
                                            }

                                            .captcha span img {
                                                width: 100%;
                                                height: 80%;
                                            }

                                            .buttonload {
                                                text-align: center;
                                                width: 40px;
                                                height: 40px;
                                                margin-top: 5px;
                                                margin-left: 10px;
                                                display: inline-block;
                                                background-color: #00A7E0;
                                                border-radius: 50%;
                                                /* Green background */
                                                border: none;
                                                /* Remove borders */
                                                color: white;
                                                /* White text */
                                                /* padding: 12px 12px; */
                                                /* Some padding */
                                                font-size: 16px;
                                                /* Set a font-size */
                                            }

                                            /* Add a right margin to each icon */
                                            .fa {
                                                margin: auto
                                            }

                                            @media screen and (max-width:700px) {
                                                .captcha {
                                                    width: 100%;
                                                }
                                            }
                                        </style>
                                        <div class="captcha">
                                            <span>{!! captcha_img('math') !!}</span>
                                            <button type="button" class="btn btn-danger reload buttonload" id="reload">
                                                <i class="fa fa-refresh fa-spin"></i>
                                            </button>
                                        </div>
                                        <input class="input" id="ipmgh-6" name="Captcha" placeholder="{{__('lang.Enter Captcha')}}">
                                        @error('Captcha')
                                            <center>
                                                <p style="color:red">{{ $message }}</p>
                                            </center>
                                        @enderror
                                        <script>
                                            $('#reload').click(function() {
                                                $.ajax({
                                                    type: 'GET',
                                                    url: 'reloadCaptcha',
                                                    success: function(data) {
                                                        $(".captcha span").html(data.captcha)
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>

                                <div class="btn-wrapper">
                                    <button class="submit-btn" type="submit">
                                        {{__('lang.Submit')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-5 wk-ipadp-10" id="ifgi">
                        <div class="container-box">
                            <div class="text-content">
                                <p class="text-blk contactus-head">
                                    {{__('lang.Contact Us')}}
                                </p>
                                <p class="text-blk contactus-subhead">
                                    {{__('lang.Contact us Content')}}
                                </p>
                            </div>
                            <div class="workik-contact-bigbox">
                                <div class="workik-contact-box">

                                    <div class="address text-box">
                                        <img class="contact-svg"
                                            src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/ET21.jpg">
                                        <p style="margin-top:10px" class="contact-text">
                                            +204864395843
                                        </p>
                                    </div>
                                    <div class="address text-box">
                                        <img class="contact-svg"
                                            src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/ET22.jpg">
                                        <p style="margin-top:10px" class="contact-text">
                                            hello@workik.com
                                        </p>
                                    </div>
                                    <div class="mail text-box">
                                        <img class="contact-svg"
                                            src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/ET23.jpg">
                                        <p style="margin-top:10px" class="contact-text">
                                            {{__('lang.address')}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('includes.floatingButton')