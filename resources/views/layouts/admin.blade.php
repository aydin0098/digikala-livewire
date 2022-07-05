<!DOCTYPE html>
<html lang="fa" data-textdirection="rtl">
@include('layouts.admin.head')
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static" data-menu="vertical-menu-modern" data-col="2-columns">
@include('layouts.admin.header')

@include('layouts.admin.notification')

@include('layouts.admin.sidebar')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            {{$slot}}
        </div>
    </div>
</div>
<footer class="footer footer-static footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">حقوق کپی رایت &copy; 1399<a
                class="text-bold-800 grey darken-2" href="https://www.nparoco.com" target="_blank">نوین پردازش آروکو</a>کلیه حقوق محفوظ است</span><span
            class="float-md-right d-none d-md-block">دست ساز و ساخته شده با<i
                class="feather icon-heart pink"></i></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
@include('layouts.admin.scripts')
</body>
</html>
