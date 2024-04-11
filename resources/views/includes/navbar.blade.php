<style>
    * {
        font-family: Nunito, sans-serif;
    }

    body {
        margin: 0;
        padding: 0;
    }

    .headnav {
        background-color: #1c303f;
        display: flex;
        justify-content: space-around;
        height: 100px;
        color: white;
    }


    .headnav .logo {
        width: 90px;
        margin: 5px;


    }

    .headnav .right {
        height: 80%;
        width: 300px;
        margin-top: 20px;

    }

    .headnav .right img {
        width: 20px;
        margin-right: 10px;
        margin-top: 0px;
        margin-left: 30px
    }

    .headnav .right .email,
    .phone {
        width: 100%;
        height: 45%;
    }

    .headnav .right img,
    .p {
        float: right;
    }

    .headnav .right .p {}

    /*
    .headnav .right .phone{
        width: 100%;
        height:30px;
        display: block;
        background: blue;
    }
    .headnav .le{
        display: inline-block;
        padding-top: 5px;
        height:100%;
    }
    .headnav .ri{
        height:100%;
        display: inline-block;
    }
    
    
    
     */
</style>
<style>
    .topnav {
        background-color: #64798b;
        padding-bottom: 3px;
        justify-content: center;
        display: flex;

    }

    .topnav .navitem {
        display: inline-block;
        transition: 1s;
        cursor: pointer;
    }

    .topnav a {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px 36px;
        text-decoration: none;
        font-size: 17px;

    }

    .topnav .navitem:hover {
        background-color: #1c303f;
        color: white;
    }

    .topnav a.active {
        background-color: #00A7E0;
        color: white;
    }

    .topnav .icon {
        display: none;
    }

    @media screen and (max-width: 700px) {
        .headnav {
            height: 100px;
        }

        .topnav a.icon {
            float: right;
            display: block;
        }

        .topnav {
            justify-content: end;

        }

        .topnav .navitem {
            display: none;
        }

        .topnav.responsive {
            display: block;
            position: relative;
        }

        .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
        }

        .topnav.responsive .navitem {
            display: block;
        }

        .topnav.responsive .navitem a {
            text-align: left
        }

        .topnav.responsive .navitem .dropbtn {
            margin-left: 20px;
        }
    }
</style>
@if ($lang == 'ar')
    <style>
        .topnav.responsive {
            direction: ltr;
            /* position: absolute;
            right: 0;
            top: 0; */
        }

        .dropup {
            margin-right: 20px
        }

        @media screen and (max-width:700px) {
            .topnav.responsive  a.icon {
                /* float: left; */
                position: absolute;
                left:0;
                top: 0;
                width: 100px;
                text-align: left;
            }
            /* .topnav a.icon {
                float: left;
                display: block;
            } */
        }
    </style>
@endif
<style>
    .dropbtn {

        color: white;
        padding: 16px;

        width: 100%;
        height: 100%;
        background: none;
        font-size: 16px;
        border: none;
    }

    .dropbtn a {
        width: 100%;
        height: 100%;
        margin: 0;
    }

    .dropup {
        width: 100%;
        height: 100%;
        position: relative;
        display: inline-block;
        transition: 0.8s;
    }

    .dropup-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 200px;
        top: 50px;
        z-index: 999;
        transition: 0.8s;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .dropup-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        width: 100%;
        display: block;
    }

    .dropup-content a:hover {
        background-color: #1c303f;
        color: white;

    }

    .dropup:hover .dropup-content {
        display: block;
    }

    /* .dropup:hover .dropbtn {

        background-color: #ddd;
        color: black;
    } */


    //for_sub_drob


    .sub-dropup {

        !important position: relative;
        color: white;
        text-decoration: none;
        width: 100%;
        display: block;
    }

    .sub-dropup-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 200px;
        left: 200px;
        z-index: 999;

        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        border-top-right-radius: 10px;
    }



    .sub-dropup-content a:hover {
        background-color: #ccc
    }

    .sub-dropup:hover .sub-dropup-content {
        display: block;
        position: absolute;
        margin-top: -50px;
    }

    .sub-dropup-content a:hover {
        background-color: #1c303f;
        color: white;
    }

    @media screen and (max-width:700px) {
        .navitem {
            height: 70px
        }
    }
</style>
<div class="headnav">
    <div class="left">
        <img class="logo" src="{{ URL::asset('images/logo_without_font.png') }}" alt="">
    </div>

    <div class="right">
        <div class="phone">

            <a class="p">Tel: +0278848488484</a><img src="{{ URL::asset('images/phone.png') }}" alt="">



        </div>
        <div class="email">

            <a class="p" style="text-decoration: none;color:white"
                href="mailto:zadooobet4@gmail.com">zadooobet4@gmail.com</a><img
                src="{{ URL::asset('images/email.png') }}" alt="">

        </div>
    </div>
</div>
<div class="topnav" id="myTopnav" style="position: relative">
    <div class="navitem">
        <a href="{{ route('home') }}">{{ __('lang.home') }}</a>
    </div>
    <div class="navitem">
        <div class="dropup">
            <div class="dropbtn"onclick="window.location.href='<?php echo route('products'); ?>';">{{ __('lang.products') }}</div>
            <div class="dropup-content">
                @foreach ($links as $category)
                    @if (count($category['sub_categories']) >= 1)
                        <div class="sub-dropup">
                            <a href="{{ route('products') }}/{{ $category['id'] }}">

                                {{ $category['' . $lang . '_name'] }}
                            </a>
                            <div class="sub-dropup-content">
                                @foreach ($category['sub_categories'] as $sub_category)
                                    <a
                                        href="{{ route('products') }}/{{ $sub_category['cat_id'] }}/{{ $sub_category['id'] }}">{{ $sub_category['' . $lang . '_name'] }}</a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a
                            href="{{ route('products') }}/{{ $category['id'] }}">{{ $category['' . $lang . '_name'] }}</a>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
    <div class="navitem">
        <a href="{{ route('aboutUs') }}">{{ __('lang.about us') }}</a>
    </div>
    <div class="navitem">
        <a href="{{ route('contactUs') }}">{{ __('lang.contact us') }}</a>
    </div>

    <div class="navitem">
        <div class="dropup">
            <div class="dropbtn">{{ __('lang.language') }}</div>
            <div class="dropup-content">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
</div>


<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>
