<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{getSettingValue('company_name')}}| @yield('title')</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{settingImagePath(getSettingValue('logo')) ?? asset('back_end/images/dummy_logo.png')}}">
        <link href="{{ asset('back_end/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    	<link rel="stylesheet" href="{{ asset('back_end/vendor/chartist/css/chartist.min.css') }}">
        <!-- <link href="{{ asset('back_end/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')
        }}" rel="stylesheet"> -->
        <!-- Datatable -->
        <link href="{{ asset('back_end/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
        <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('back_end/vendor/sweetalert2/sweetalert2.min.css') }}">
        <link href="{{ asset('back_end/css/style.css') }}" rel="stylesheet">


    </head>
    <body>

        <header>
            @include('backend.layouts.header')
        </header>

        @yield('mycontents')

        <footer>
            @include('backend.layouts.footer')
        </footer>

    </body>
</html>
