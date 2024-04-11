@php
    $lang = LaravelLocalization::getCurrentLocale();
    if ($lang == 'ar') {
        echo '<style>
                    *{
                        direction: rtl;
                    }
                </style>
            ';
    }
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{URL::asset('images/logo_without_font.png')}}"/>
    <title>almasria</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

</head>

<body class="font-sans antialiased">
    @include('includes.navbar')
    @yield('content')
    @include('includes.footer')
    
</body>

</html>
