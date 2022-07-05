<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>پنل مدیریت -@yield('title','')</title>
    <link rel="apple-touch-icon" href="{{asset('back/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('back/app-assets/images/ico/favicon.ico')}}">
    <link href="{{asset('back/app-assets/images/fonts.googleapis.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('back/app-assets/vendors/css/vendors-rtl.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('back/app-assets/css-rtl/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('back/app-assets/css-rtl/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('back/app-assets/css-rtl/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('back/app-assets/css-rtl/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('back/app-assets/css-rtl/themes/dark-layout.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('back/app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('back/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">--}}
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    @livewireStyles
    @yield('styles')

</head>
