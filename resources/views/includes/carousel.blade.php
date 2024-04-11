<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    * {
        box-sizing: border-box;
    }

    .mySlides {
        display: none;
    }

    .mySlides img {
        vertical-align: middle;
        background: cover;
    }

    /* Slideshow container */
    .slideshow-container {
        width: 100%;
        height: 480px;
        position: relative;
        margin: auto;
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        animation-name: fade;
        animation-duration: 1.5s;
    }

    .mySlides img {
        width: 100%;
        height: 490px;
    }

    /* Add a pointer when hovering over the thumbnail images */
    .cursor {
        cursor: pointer;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 55%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    @keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }

    /* On smaller screens, decrease text size */
    @media screen and (max-width: 700px) {
        .slideshow-container{
            height: 350px;

        }
        .slideshow-container img{
            height:350px;
        }
    }
    @media only screen and (max-width: 300px) {
        .text {
            font-size: 11px
        }
    }
</style>
</head>




<div class="slideshow-container">

    <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="{{ URL::asset('carousel\carousel1.jpg') }}">
        <div class="text"><h1>{{__('lang.carousel caption1')}}</h1></div>

    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="{{ URL::asset('carousel\carousel2.jpg') }}">
        <div class="text"><h1>{{__('lang.carousel caption2')}}</h1></div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="{{ URL::asset('carousel\carousel3.jpg') }}">
        <div class="text"><h1>{{__('lang.carousel caption3')}}</h1></div>
    </div>
    {{-- <a class="prev" onclick="minusSlides()">❮</a>
    <a class="next" onclick="plusSlides()">❯</a> --}}
</div>
<br>
<script>
    let slideIndex = 0;
    let timeoutId;
    function plusSlides() {
        clearTimeout(timeoutId);
        // slideIndex++;
        showSlides();
    }
    function minusSlides() {
        clearTimeout(timeoutId);
        slideIndex--;
        showSlides();
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        slides[slideIndex - 1].style.display = "block";
        timeoutId=setTimeout(showSlides, 4000);

    }
    showSlides();

</script>
