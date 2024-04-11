@php
    $lang = LaravelLocalization::getCurrentLocale();
@endphp
<style>
    body {
        font-family: "Lato", sans-serif;
    }

    /* Fixed sidenav, full height */
    .sidenav {
        height: auto;
        width: 300px;
        background-color: #c9caca;
        overflow-x: hidden;
    }

    /* Style the sidenav links and the dropdown button */
    .sidenav a,
    .dropdown-btn {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: black;
        display: block;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
        outline: none;
        transition: 0.2s;
    }

    /* On mouse-over */
    .sidenav a:hover,
    .dropdown-btn:hover {
        color: white;
    }

    /*
    .dropdown-btn:hover ~ .dropdown-container{
        display: block;
    } */
    /* Add an active class to the active dropdown button */
    .active {
        background-color: #64798b;
    }

    .active a {}

    /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
    .dropdown-container {
        display: none;
        background-color: #64798b;
        padding-left: 8px;

    }

    /* Optional: Style the caret down icon */
    .fa-caret-down {
        float: right;
        padding-right: 8px;
    }

    /* Some media queries for responsiveness */
    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }

    }

    @media screen and (max-width:700px) {
        .sidenav {
            width: 100%;
        }
    }

    .cont .header {
        width: 100%;
        position: relative;
        color: #00A7E0;
        text-align: center;
        padding: 20px 0px;
    }

    .cont .header span {
        font-size: 28px;
        font-weight: bolder;
    }

    .cont .header .color {
        height: 40px;
        width: 8px;
        position: absolute;
        left: 0;
        top: 25%;
        background: #00A7E0;
    }
</style>

<div class="cont">
    <div class="header">
        <div class="color"></div>
        <span>
            {{__('lang.Categories')}}
        </span>

    </div>
    <div class="sidenav">

        @foreach ($links as $category)
            @if (count($category['sub_categories']) >= 1)
                <button class="dropdown-btn" {{-- onclick="javascript:window.location.href='{{ route('products') }}/{{ $category['id'] }}'" --}}>
                    {{ $category['' . $lang . '_name'] }}
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    @foreach ($category['sub_categories'] as $sub_category)
                        <a
                            href="{{ route('products') }}/{{ $sub_category['cat_id'] }}/{{ $sub_category['id'] }}">{{ $sub_category['' . $lang . '_name'] }}</a>
                    @endforeach
                </div>
            @else
                <a href="{{ route('products') }}/{{ $category['id'] }}">{{ $category['' . $lang . '_name'] }}</a>
            @endif
        @endforeach
    </div>

</div>

<script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>
