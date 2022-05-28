<!doctype html>
<html lang={{\Illuminate\Support\Facades\App::currentLocale()}}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ \Illuminate\Support\Facades\Session::token() }}">
    <link rel="icon" type="image/x-icon" href="{{asset('public/favicon.ico')}}">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{asset('public/js/picoModal.js')}}"></script>
    <script src="{{asset('public/js/new/decoration/chart.js')}}"></script>
    <script src="{{asset('public/js/new/decoration/lazysizes.js')}}"></script>
    <script src="{{asset('public/js/new/decoration/popper.js')}}"></script>
    <script src="{{asset('public/js/new/decoration/tether.js')}}"></script>
    <script src="public/js/jquery.js"></script>
    <!-- JQuery Form -->
    <script src="public/js/new/jquery_form.js"></script>
    <!-- validation JQuery -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js"
            type="text/javascript"></script>
    <!-- new  -->
    <link rel="stylesheet" href="{{asset('public/css/new/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/new/bootstrap-select.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/new/tagify.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/new/ion.rangeSlider.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/new/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/new/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/new/bootstrap.css')}}">
    <!-- new  -->
    <title>@yield('title')</title>
</head>
<body>
<div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0 py-lg-22 py-10">
        <!-- Docs -->
        <div class="offset-xl-1 col-xl-4 col-lg-6 col-md-12 col-12 text-center text-lg-start">
            <h1 class="display-1 mb-3">404</h1>

            <p class="mb-5 lead">Упс! Извините, мы не смогли найти страницу, которую вы искали. Если вы считаете, что
                это наша проблема, пожалуйста <a href="{{route('contact')}}" class="btn-link">свяжитесь с нами</a></p>
            <a href="{{route('index')}}" class="btn btn-primary me-2">Вернутся на сайт</a>
        </div>
        <!-- img -->
        <div class="offset-xl-1 col-xl-6 col-lg-6 col-md-12 col-12 mt-8 mt-lg-0">
            <img src="{{asset('public/images/background/404-error-img.svg')}}" alt="" class="w-100">
        </div>
    </div>
    <div class="row">
        <div class="offset-xl-1 col-xl-10 col-lg-12 col-md-12 col-12">
            <div class="row align-items-center mt-6">
                <div class="col-md-6 col-8">
                    <p class="mb-0">©Techfox 2022</p>
                </div>
                <div class="col-md-6 col-4 d-flex justify-content-end">
                    <a href="#" class="text-muted text-primary-hover me-3  "><i
                            class="mdi mdi-facebook mdi-24px"></i></a>
                    <a href="#" class="text-muted text-primary-hover me-3  "><i
                            class="mdi mdi-twitter mdi-24px"></i></a>
                    <a href="#" class="text-muted text-primary-hover"><i class="mdi mdi-github mdi-24px"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="{{asset('public/js/new/bootstrap.js')}}"></script>
<script src="{{asset('public/js/new/custom.js')}}"></script>
<script src="https://kit.fontawesome.com/5ab487719d.js" crossorigin="anonymous"></script>
<script src="{{asset('public/js/new/ion.rangeSlider.min.js')}}"></script>
<!-- Google Map -->
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
<!-- End Google Map -->
<script>
    AOS.init();
</script>
</body>

</html>
