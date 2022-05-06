<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="keywords" content="smp" />
        <meta name="" content="saif man power" />
        <meta name="author" content="Appflex Technology" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{getSettingValue('company_name')}} | @yield('title')</title>

        <script src="{{ asset('front_end/js/jquery-3.4.1.min.js') }}"></script>
        <!-- Favicon -->
        <link href="{{settingImagePath(getSettingValue('logo')) ?? asset('back_end/images/dummy_logo.png')}}" type="image/png" rel=" icon" />

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

        <!-- CSS Global Compulsory (Do not remove)-->
        <link rel="stylesheet" href="{{ asset('front_end/css/font-awesome/all.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('front_end/css/flaticon/flaticon.css') }}" />
        <link rel="stylesheet" href="{{ asset('front_end/css/bootstrap/bootstrap.min.css') }}" />
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

        <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
        <link rel="stylesheet" href="{{ asset('front_end/css/owl-carousel/owl.carousel.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('front_end/css/animate/animate.min.css') }}">

        <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
        @stack('style')

        <!-- Template Style -->
        <link rel="stylesheet" href="{{ asset('front_end/css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('front_end/css/custom.css') }}" />
        <!--Floating WhatsApp css-->
{{--        <link rel="stylesheet" href="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.css">--}}

    </head>

    <body>
    <div id="WAButton"></div>

        <header>
            @include('frontend.layouts.header')
        </header>

            @yield('mycontents')

        <footer>
            @include('frontend.layouts.footer')
        </footer>

    </body>
</html>
