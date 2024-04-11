<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');


    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .footercontainer {
        line-height: 1.5;
        max-width: 1170px;
        margin: auto;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }

    ul {
        list-style: none;
    }

    .footer {
        background-color: #1c303f;
        padding: 70px 0;
    }

    .footer-col {
        width: 25%;
        padding: 0 15px;

    }

    .footer-col h4 {
        font-size: 18px;
        color: #ffffff;
        text-transform: capitalize;
        margin-bottom: 35px;
        font-weight: 500;
        position: relative;
    }

    .footer-col .logo {
        width: 75%;
        margin-bottom: 20px;
        text-align: center;
    }

    .footer-col .logo img {
        width: 50%;

    }


    .footer-col h4::before {
        content: '';
        position: absolute;
        left: 0;
        bottom: -10px;
        background-color: #00A7E0;
        height: 2px;
        box-sizing: border-box;
        width: 50px;
    }

    .footer-col ul li:not(:last-child) {
        margin-bottom: 10px;
    }

    .footer-col ul li a {
        font-size: 16px;
        text-transform: capitalize;
        color: #ffffff;
        text-decoration: none;
        font-weight: 300;
        color: #bbbbbb;
        display: block;
        transition: all 0.3s ease;
    }

    .footer-col ul li a:hover {
        color: #ffffff;
        padding-left: 8px;
    }

    .footer-col .social-links a {
        display: inline-block;
        height: 40px;
        width: 40px;
        background-color: rgba(255, 255, 255, 0.2);
        margin: 0 10px 10px 0;
        text-align: center;
        line-height: 40px;
        border-radius: 50%;
        color: #ffffff;
        transition: all 0.5s ease;
    }

    .footer-col .social-links a:hover {
        color: #24262b;
        background-color: #ffffff;
    }

    /*responsive*/
    @media(max-width: 767px) {
        .footer-col {
            width: 50%;
            margin-bottom: 30px;
        }
    }

    @media(max-width: 574px) {
        .footer-col {
            width: 100%;
            text-align: center
        }

        .footer-col h4::before {
            left: 45%;
        }
        .footer-col .logo img {
            margin-left: 25%;

        }

    }
</style>

@php
    if($lang=='ar'){
        echo'
        <style>
            .footer-col h4::before {
                right: 0;
            }    
            .footer-col ul li a:hover {
                color: #ffffff;
                padding-right: 8px;
            }
        </style> 
        ';
    }
@endphp
<footer class="footer">
    <div class="footercontainer">
        <div class="row">
            <div class="footer-col">
                <h4>{{ __('lang.Quick Link') }}</h4>
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('lang.home') }}</a></li>
                    <li><a href="{{ route('aboutUs') }}">{{ __('lang.about us') }}</a></li>
                    <li><a href="{{ route('contactUs') }}">{{ __('lang.contact us') }}</a></li>
                    <li><a href="{{ route('products') }}">{{ __('lang.products') }}</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>{{ __('lang.Category List') }}</h4>
                <ul>
                    @foreach ($links as $category)
                        <li><a
                                href="{{ route('products') }}/{{ $category['id'] }}">{{ $category['' . $lang . '_name'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="footer-col">
                <h4>{{ __('lang.Contact Us') }}</h4>
                <ul>
                    <li class="li_01">
                        <a href="">Add: 710-711 Office Park, No.535 Qingshuiqiao Rd, Jiangdong</a>
                    </li>
                    <li class="li_02">
                        <a href="">Tel: +86-574-87787718</a>
                    </li>
                    <li class="li_03">
                        <a href="">Fax：+86-574- 87787708</a>
                    </li>
                    <li class="li_04">
                        
                        <a href="mailto:info@risinginstru.com">E-mail: info@risinginstru.com</a>
                    </li>
                    <li class="li_05">
                        <a href="">Whatsapp: 13505749730</a>
                    </li>
                    <li class="li_06">
                        <a href="">Wechat: 13505749730</a>
                    </li>
                    <li >
                        <a href="">Website: www.almasria.com</a>
                    </li>
                    {{-- <li><a href="#">watch</a></li>
                    <li><a href="#">bag</a></li>
                    <li><a href="#">shoes</a></li>
                    <li><a href="#">dress</a></li> --}}
                </ul>
            </div>
            <div class="footer-col">
                <div class="logo">
                    <img src="{{ URL::asset('images/logo_without_font.png') }}" alt="">
                </div>
                <div class="social-links">
                    <style>
                        a i {
                            margin-top: 12px;
                        }
                    </style>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
    
</footer>
<style>
    .copy-right-sec {
            height:80px;
            width: 100%;
            padding: 1.8rem;
            background: #000000;
            color: #fff;
            text-align: center;
        }

        .copy-right-sec a {
            color: white;
            font-weight: 500;
        }

        a {
            text-decoration: none;
        }
</style>
{{-- <section class="copy-right-sec">
    <div class="copy-right">
        <a href="http://www.linkedin.com/in/zeiad-ahmed-3373a2298" target="_plank">&copy; Copyright 2023, Zeiad Ahmed. All Rights Reserved.</a>
    </div>
</section> --}}