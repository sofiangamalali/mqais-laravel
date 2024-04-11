@php
    $lang = LaravelLocalization::getCurrentLocale();
@endphp
@extends('layouts.app')

@section('content')

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

        .container {
            width: 100%;
            display: grid;
            gap: 1rem;

            margin-top: 1em;
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
            width: 100%;
            margin: 30px 0px;
            text-align: center;
        }
    </style>

    <div class="sectionheading">
        <div class="two alt-two">
            <h1>{{__('lang.AbooutUs')}}
                <span>{{__('lang.Our Story')}}</span>
            </h1>
        </div>
    </div>

    <style>
        .text-blk {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
            line-height: 25px;
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
        }

        .responsive-cell-block {
            min-height: 75px;
        }

        .responsive-container-block {
            min-height: 75px;
            height: fit-content;
            width: 100%;
            padding-top: 10px;
            padding-right: 10px;
            padding-bottom: 10px;
            padding-left: 10px;
            display: flex;
            flex-wrap: wrap;
            margin-top: 0px;
            margin-right: auto;
            margin-bottom: 0px;
            margin-left: auto;
            justify-content: flex-start;
        }

        .responsive-container-block.bigContainer {
            padding-top: 0px;
            padding-right: 50px;
            padding-bottom: 0px;
            padding-left: 50px;
            margin-top: 50px;
            margin-right: 0px;
            margin-bottom: 50px;
            margin-left: 0px;
        }

        .responsive-container-block.Container {
            max-width: 1320px;
            justify-content: space-evenly;
            align-items: center;
            padding-top: 10px;
            padding-right: 10px;
            padding-bottom: 0px;
            padding-left: 10px;
            position: relative;
            overflow-x: hidden;
            overflow-y: hidden;
            margin-top: 0px;
            margin-right: auto;
            margin-bottom: 0px;
            margin-left: auto;
        }

        .mainImg {
            width: 100%;
            height: 800px;
            object-fit: cover;
        }

        .blueDots {
            position: absolute;
            top: 150px;
            right: 15%;
            z-index: -1;
            left: auto;
            width: 80%;
            height: 500px;
            object-fit: cover;
        }

        .imgContainer {
            position: relative;
            width: 48%;
        }

        .responsive-container-block.textSide {
            width: 48%;
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
            z-index: 100;
        }

        .text-blk.heading {
            font-size: 36px;
            line-height: 40px;
            font-weight: 700;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 20px;
            margin-left: 0px;
        }

        .text-blk.subHeading {
            font-size: 18px;
            line-height: 26px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 20px;
            margin-left: 0px;
        }

        .cardImg {
            width: 31px;
            height: 31px;
        }

        .cardImgContainer {
            padding-top: 20px;
            padding-right: 20px;
            padding-bottom: 20px;
            padding-left: 20px;
            border-top-width: 1px;
            border-right-width: 1px;
            border-bottom-width: 1px;
            border-left-width: 1px;
            border-top-style: solid;
            border-right-style: solid;
            border-bottom-style: solid;
            border-left-style: solid;
            border-top-color: rgb(229, 229, 229);
            border-right-color: rgb(229, 229, 229);
            border-bottom-color: rgb(229, 229, 229);
            border-left-color: rgb(229, 229, 229);
            border-image-source: initial;
            border-image-slice: initial;
            border-image-width: initial;
            border-image-outset: initial;
            border-image-repeat: initial;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
            margin-top: 0px;
            margin-right: 10px;
            margin-bottom: 0px;
            margin-left: 0px;
        }

        .responsive-cell-block.wk-desk-6.wk-ipadp-6.wk-tab-12.wk-mobile-12 {
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 10px;
            padding-right: 15px;
            padding-bottom: 10px;
            padding-left: 0px;
        }

        .text-blk.cardHeading {
            font-size: 18px;
            line-height: 28px;
            font-weight: 700;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 10px;
            margin-left: 0px;
        }

        .text-blk.cardSubHeading {
            color: rgb(153, 153, 153);
            line-height: 22px;
        }

        .explore {
            font-size: 18px;
            line-height: 20px;
            font-weight: 700;
            color: white;
            background-color: #00A7E0;
            box-shadow: rgba(244, 152, 146, 0.25) 0px 10px 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
            cursor: pointer;
            border-top-width: 0px;
            border-right-width: 0px;
            border-bottom-width: 0px;
            border-left-width: 0px;
            border-top-style: initial;
            border-right-style: initial;
            border-bottom-style: initial;
            border-left-style: initial;
            border-top-color: initial;
            border-right-color: initial;
            border-bottom-color: initial;
            border-left-color: initial;
            border-image-source: initial;
            border-image-slice: initial;
            border-image-width: initial;
            border-image-outset: initial;
            border-image-repeat: initial;
            padding-top: 17px;
            padding-right: 40px;
            padding-bottom: 17px;
            padding-left: 40px;
            transition: 0.5s;
        }

        .explore:hover {
            background-image: initial;
            background-position-x: initial;
            background-position-y: initial;
            background-size: initial;
            background-repeat-x: initial;
            background-repeat-y: initial;
            background-attachment: initial;
            background-origin: initial;
            background-clip: initial;
            background-color: #1c303f;
        }

        #ixvck {
            margin-top: 60px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
        }

        .redDots {
            position: absolute;
            bottom: -350px;
            right: -100px;
            height: 500px;
            width: 400px;
            object-fit: cover;
            top: auto;
        }

        @media (max-width: 1024px) {
            .responsive-container-block.Container {
                position: relative;
                align-items: flex-start;
                justify-content: center;
            }

            .mainImg {
                bottom: 0px;
            }

            .imgContainer {
                position: absolute;
                bottom: 0px;
                left: 0px;
                height: auto;
                width: 60%;
            }

            .responsive-container-block.textSide {
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 0px;
                margin-left: auto;
                width: 70%;
            }

            .responsive-container-block.Container {
                flex-direction: column-reverse;
            }

            .imgContainer {
                position: relative;
                width: auto;
                margin-top: 0px;
                margin-right: auto;
                margin-bottom: 0px;
                margin-left: auto;
            }

            .responsive-container-block.textSide {
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 20px;
                margin-left: 0px;
                width: 100%;
            }

            .responsive-container-block.Container {
                flex-direction: row-reverse;
            }

            .responsive-container-block.Container {
                flex-direction: column-reverse;
            }
        }

        @media (max-width: 768px) {
            .responsive-container-block.textSide {
                width: 100%;
                align-items: flex-end;
                flex-direction: column;
                justify-content: center;
            }

            .text-blk.subHeading {
                text-align: center;
                font-size: 17px;
                max-width: 520px;
            }

            .text-blk.heading {
                text-align: center;
            }

            .imgContainer {
                opacity: 0.8;
            }

            .imgContainer {
                height: 500px;
            }

            .imgContainer {
                width: 30px;
            }

            .responsive-container-block.Container {
                flex-direction: column-reverse;
            }

            .responsive-container-block.Container {
                flex-wrap: nowrap;
            }

            .responsive-container-block.textSide {
                width: 100%;
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 20px;
                margin-left: 0px;
            }

            .imgContainer {
                width: 90%;
            }

            .imgContainer {
                height: 450px;
                margin-top: 5px;
                margin-right: 33.9062px;
                margin-bottom: 0px;
                margin-left: 33.9062px;
            }

            .redDots {
                display: none;
            }

            .explore {
                font-size: 16px;
                line-height: 14px;
            }
        }

        @media (max-width: 500px) {
            .imgContainer {
                position: static;
                height: 450px;
            }

            .mainImg {
                height: 100%;
            }

            .blueDots {
                width: 100%;
                left: 0px;
                top: 0px;
                bottom: auto;
                right: auto;
            }

            .imgContainer {
                width: 100%;
            }

            .responsive-container-block.textSide {
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 0px;
                margin-left: 0px;
            }

            .responsive-container-block.Container {
                padding-top: 0px;
                padding-right: 0px;
                padding-bottom: 0px;
                padding-left: 0px;
                overflow-x: visible;
                overflow-y: visible;
            }

            .responsive-container-block.bigContainer {
                padding-top: 10px;
                padding-right: 20px;
                padding-bottom: 10px;
                padding-left: 20px;
                padding: 0 30px 0 30px;
            }

            .redDots {
                display: none;
            }

            .text-blk.subHeading {
                font-size: 16px;
                line-height: 23px;
            }

            .text-blk.heading {
                font-size: 28px;
                line-height: 28px;
            }

            .responsive-container-block.textSide {
                margin-top: 40px;
                margin-right: 0px;
                margin-bottom: 50px;
                margin-left: 0px;
            }

            .imgContainer {
                margin-top: 5px;
                margin-right: auto;
                margin-bottom: 0px;
                margin-left: auto;
                width: 100%;
                position: relative;
            }

            .explore {
                padding-top: 17px;
                padding-right: 0px;
                padding-bottom: 17px;
                padding-left: 0px;
                width: 100%;
            }

            #ixvck {
                width: 90%;
                margin-top: 40px;
                margin-right: 0px;
                margin-bottom: 0px;
                margin-left: 0px;
                font-size: 15px;
            }

            .blueDots {
                bottom: 0px;
                width: 100%;
                height: 80%;
                top: 10%;
            }

            .text-blk.cardHeading {
                font-size: 16px;
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 8px;
                margin-left: 0px;
                line-height: 25px;
            }

            .responsive-cell-block.wk-desk-6.wk-ipadp-6.wk-tab-12.wk-mobile-12 {
                padding-top: 10px;
                padding-right: 0px;
                padding-bottom: 10px;
                padding-left: 0px;
            }
        }
    </style>
    <style>
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
    <div class="responsive-container-block bigContainer">
        <div class="responsive-container-block Container" style="">
            
            <div class="responsive-container-block textSide">

                <p class="text-blk subHeading">
                    {{__('lang.Our Story Content')}}
                </p>
                <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                    <div class="cardImgContainer">
                        <img class="cardImg"
                            src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/id2.svg">
                    </div>
                    <div class="cardText">
                        <p class="text-blk cardHeading">
                            {{__('lang.Value1')}}
                        </p>
                        <p class="text-blk cardSubHeading">
                            {{__('lang.Value1 Content')}}
                        </p>
                    </div>
                </div>
                <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                    <div class="cardImgContainer">
                        <img class="cardImg"
                            src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/id2.svg">
                    </div>
                    <div class="cardText">
                        <p class="text-blk cardHeading">
                            {{__('lang.Value2')}}
                        </p>
                        <p class="text-blk cardSubHeading">
                            {{__('lang.Value2 Content')}}
                        </p>
                    </div>
                </div>
                <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                    <div class="cardImgContainer">
                        <img class="cardImg"
                            src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/id2.svg">
                    </div>
                    <div class="cardText">
                        <p class="text-blk cardHeading">
                            {{__('lang.Value3')}}
                        </p>
                        <p class="text-blk cardSubHeading">
                            {{__('lang.Value3 Content')}}
                        </p>
                    </div>
                </div>
                <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                    <div class="cardImgContainer">
                        <img class="cardImg"
                            src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/id2.svg">
                    </div>
                    <div class="cardText">
                        <p class="text-blk cardHeading">
                            {{__('lang.Value4')}}
                        </p>
                        <p class="text-blk cardSubHeading">
                            {{__('lang.Value4 Content')}}
                        </p>
                    </div>
                </div>
                <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                    <div class="cardImgContainer">
                        <img class="cardImg"
                            src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/id2.svg">
                    </div>
                    <div class="cardText">
                        <p class="text-blk cardHeading">
                            {{__('lang.Value5')}}
                        </p>
                        <p class="text-blk cardSubHeading">
                            {{__('lang.Value5 Content')}}
                        </p>
                    </div>
                </div>
                <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                    <div class="cardImgContainer">
                        <img class="cardImg"
                            src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/id2.svg">
                    </div>
                    <div class="cardText">
                        <p class="text-blk cardHeading">
                            {{__('lang.Value6')}}
                        </p>
                        <p class="text-blk cardSubHeading">
                            {{__('lang.Value6 Content')}}
                        </p>
                    </div>
                </div>
                
                <div class="btn" style="width: 100%;padding: 30px;text-align: center">
                    <a style="margin: auto 20px" href="{{ route('products') }}">
                        <button class="explore">
                            {{__('lang.Explore our Products')}}
                        </button>
                    </a>
                </div>
            </div>
<div class="imgContainer">
                <img class="blueDots" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/aw3.svg">
                <img class="mainImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/aw2.svg">
            </div>
        </div>
    </div>
@endsection
@extends('includes.floatingButton')