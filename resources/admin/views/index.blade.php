<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarBerShop</title>
    {!! HTML::style('admin-public/css/app.css') !!}
    {!! HTML::style('admin-public/css/materialIcon.css') !!}
    {!! HTML::style('admin-public/css/select2.min.css') !!}
    {!! HTML::style('admin-public/css/Material_Symbols.css') !!}
    {!! HTML::script('admin-public/js/app.js') !!}
    <script src="{!! asset('admin-public/js/defer.js') !!}" defer></script>
    <link rel="stylesheet" href="{{ asset('plugin/toastr.min.css') }}">
    <script src="{{ asset('plugin/toastr.min.js') }}"></script>
    <script src="{{ asset('admin-public/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="{{ asset('admin-public/js/jQuery.print.min.js') }}"></script>
    <script src="{{ asset('admin-public/js/feather.min.js') }}"></script>
    <script src="{{ asset('admin-public/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin-public/js/jqueryUi.js') }}"></script>
    <script src="{{ asset('admin-public/js/icheck.min.js') }}"></script>
    <script src="{{ asset('admin-public/js/printJS.min.js') }}"></script>
</head>

<body>
    @yield('index')
    @include('admin::components.toast')
    <script lang="ts">
         $(document).ready(function() {
             @if (Session::has('success'))
                 Toast({
                     title: 'Success Message',
                     message: '{!! Session::get('success') !!}',
                     status: 'success',
                     duration: 5000,
                 });
             @elseif(Session::has('error'))
                 Toast({
                     title: 'Error Message',
                     message: '{!! Session::get('error') !!}',
                     status: 'danger',
                     duration: 5000,
                 });
             @elseif(Session::has('warning'))
                 Toast({
                     title: 'Warning Message',
                     message: '{!! Session::get('warning') !!}',
                     status: 'warning',
                     duration: 5000,
                 });
             @endif
        });
    </script>
    @yield('script')
    {!! HTML::script('admin-public/js/body.js') !!}
</body>

</html>
