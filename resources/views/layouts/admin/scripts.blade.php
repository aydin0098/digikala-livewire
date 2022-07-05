<script src="{{asset('back/app-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('back/app-assets/js/core/app-menu.min.js')}}"></script>
{{--<script src="{{asset('back/app-assets/js/core/app.min.js')}}"></script>--}}
<script src="{{asset('back/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@livewireScripts
<script src="{{mix('/js/app.js')}}"></script>
@yield('scripts')
