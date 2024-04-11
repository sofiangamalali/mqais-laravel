@php
    $lang = LaravelLocalization::getCurrentLocale();
@endphp
@extends('layouts.app')
@section('content')
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
            background: white;
            display: flex;
            justify-content: space-between;
        }

        .container .left {
            z-index: 2;
            background: #c9caca;
            box-shadow: 20px 6px 58px -19px rgba(0, 0, 0, 0.55);
            -webkit-box-shadow: 20px 6px 58px -19px rgba(0, 0, 0, 0.55);
            -moz-box-shadow: 20px 6px 58px -19px rgba(0, 0, 0, 0.55);
        }

        .container .right {
            min-height: 300px;
            width: 100%;


        }

        @media screen and (max-width:700px) {
            .container {
                display: block;
            }

            .container .left,
            .right {
                box-shadow: none;
                float: none;
                display: block;
            }
        }
    </style>
    <div class="sectionheading">
        <div class="two alt-two">
            <h1>{{__('lang.Products Center')}}
                <span><h2>{{__('lang.Best Products')}}</h2></span>
            </h1>
        </div>
    </div>
    @isset($mainRoute)
        <div class="route" style="padding-bottom:10px;width:82%;margin:auto;background:white">
            <h3>
                @isset($mainRoute['category'])
                    @foreach ($mainRoute['category'] as $item)
                        {{ $item['' . $lang . '_name'] }}
                    @endforeach
                @endisset

                @isset($mainRoute['subCategory'])
                    @foreach ($mainRoute['subCategory'] as $item)
                        / {{ $item['' . $lang . '_name'] }}
                    @endforeach
                @endisset
            </h3>

        </div>
    @endisset

    <div class="container">

        <div class="left">
            @include('includes.sidebarcategories')
        </div>
        <div class="right">
            @if (true)
                <style>
                    .right .container {
                        width: 100%;
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
                <div class="container">
                    @php
                        $j = 1;
                        $x = 0;
                    @endphp
                    @forelse ($products as $product)
                        @php
                            $x += 1;
                            if ($x % 7 == 0) {
                                $x = 0;
                                $j += 1;
                            }
                        @endphp

                        <div class="product page{{ $j }}" style="display: none"
                            onclick="javascript:window.location.href='{{ route('product') }}/{{ $product['id'] }}'">
                            <div class="pic">
                                <img src="{{ asset('storage/products/' . $product['image'] . '') }}" alt="">
                            </div>
                            <div class="description">
                                {{ $product['' . $lang . '_name'] }}
                            </div>
                        </div>
                    @empty
                        <div class="noProducts" style="width:100%; padding:100px 0px; text-align: center">
                            <h1>{{ __('lang.there is no products') }}</h1>
                        </div>
                    @endforelse
                </div>
            @endif
            <style>
                .pagingcontainer {
                    padding: 20px;
                    width: 100%;
                    text-align: center;
                }

                .pagination {
                    display: inline-block;
                    margin: auto;
                    width: auto;
                }

                .pagination a {
                    color: black;
                    float: left;
                    padding: 8px 16px;
                    text-decoration: none;
                    border: 1px solid #ddd;
                }

                .pagination a.active {
                    background-color: #00A7E0;
                    color: white;
                    border: 1px solid #00A7E0;
                }

                .pagination a:hover:not(.active) {
                    background-color: #ddd;
                }

                .pagination a:first-child {
                    border-top-left-radius: 5px;
                    border-bottom-left-radius: 5px;
                }

                .pagination a:last-child {
                    border-top-right-radius: 5px;
                    border-bottom-right-radius: 5px;
                }
            </style>

            <div class="pagingcontainer">
                <div class="pagination">
                    <a href="javascript: prevPage();">&laquo;</a>

                    @php
                        $pagesCount = count($products) / 6 + 1;
                    @endphp
                    @for ($i = 1; $i <= $pagesCount; $i++)
                        <a id="page{{ $i }}"
                            href="javascript: page({{ $i }});">{{ $i }}</a>
                    @endfor

                    <a href="javascript: nextPage();">&raquo;</a>
                </div>
            </div>


            <script>
                var current = 1;

                document.getElementById("page" + current).classList.add("active");

                showProducts();

                function hideProducts() {
                    var elements = document.getElementsByClassName('page' + current);
                    for (var i = 0; i < elements.length; i++) {
                        elements[i].style.display = "none";
                    }
                }

                function showProducts() {
                    var elements = document.getElementsByClassName('page' + current);
                    for (var i = 0; i < elements.length; i++) {
                        elements[i].style.display = "block";
                    }

                }

                function page(i) {
                    document.getElementById("page" + current).classList.remove("active");
                    hideProducts();
                    current = i;
                    document.getElementById("page" + current).classList.add("active");
                    showProducts();
                }

                function nextPage() {
                    if (document.getElementById("page" + current + 1) != null) {
                        document.getElementById("page" + current).classList.remove("active");
                        hideProducts();
                        current++;
                        document.getElementById("page" + current).classList.add("active");
                        showProducts();

                    }
                }

                function prevPage() {
                    if (document.getElementById("page" + current - 1) != null) {

                        document.getElementById("page" + current).classList.remove("active");
                        hideProducts();
                        current--;
                        document.getElementById("page" + current).classList.add("active");
                        showProducts();
                    }
                }
            </script>
        </div>
    </div>
@endsection
@extends('includes.floatingButton')