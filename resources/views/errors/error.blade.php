@if($errors->any())

            @foreach($errors->all() as $error)
                <script>
                    toastr.options = {
                        "closeButton": true,
                        "newestOnTop": true,
                        "positionClass": "toast-bottom-left",
                        "progressBar": true,
                        "showMethod": "slideDown",
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3000",
                    };
                    toastr.error('{{$error}}')
                </script>
            @endforeach
@endif

