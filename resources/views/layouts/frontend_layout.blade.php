<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>
        @yield('title')
    </title>

    @php
        $front = App\Models\FrontControl::first();
    @endphp
    <link href="{{ asset('img_DB/front/logo/' . $front->logo_small) }}" rel="icon">
    <link href="{{ asset('img_DB/front/logo/' . $front->logo_small) }}" rel="apple-touch-icon">
    {{-- <link rel="shortcut icon" href="{{ asset('img_DB/front/logo/' . $front->logo_small) }}" alt="" /> --}}
    
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style_index.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style_shop.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style_blog.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style_cart.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style_about.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style_product_details.css">


    <!--stackpath bootstrap --------its very good-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!---->
    <link rel="stylesheet" href="{{ asset('frontend') }}/Poppins/Poppins-Bold.ttf">

    <!--Jquery for light slider-->
    <script type="text/javascript" src="{{ asset('frontend') }}/js/jquery.js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/js/lightslider.js"></script>
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/lightslider.css">

    
</head>

<body>



    {{-- navbar --}}
    @include('layouts.inc.nav')


    @yield('frontend_content')


    {{-- footer --}}
    @include('layouts.inc.footer')



    <!--=====back to top button (using JS)=====-->
    <a href="#" class="to-top">
        <i class="fas fa-chevron-up"></i>
    </a>


    <script src="{{ asset('frontend') }}/js/main.js"></script>
    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <!--https://sweetalert.js.org/guides/-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (session('status'))
        <script>
            swal("{{ session('status') }}");
        </script>
    @endif

    {{--
<!--day Night Js-->
<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
<script type="text/javascript" src="{{ asset('frontend') }}/js/dark.js"></script>
--}}

</body>

</html>
