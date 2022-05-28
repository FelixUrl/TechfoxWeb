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
    <!-- new  -->
    <link rel="stylesheet" href="{{asset('public/css/new/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/new/ion.rangeSlider.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/new/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/new/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/new/bootstrap.css')}}">
    <!-- new  -->
    <title>@yield('title')</title>
</head>
<body>

@yield('content')
<!-- footer section -->
<footer class="footer_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 footer-col">
                <div class="footer_detail">
                    <h4>
                        About
                    </h4>
                    <p>
                        Necessary, making this the first true generator on the Internet. It uses a dictionary of over
                        200 Latin words, combined with a handful
                    </p>
                    <div class="footer_social">
                        <a href="">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-2 mx-auto footer-col">
                <div class="footer_link_box">
                    <h4>
                        Links
                    </h4>
                    <div class="footer_links">
                        <a class="active" href="index.html">
                            Home
                        </a>
                        <a class="" href="service.blade.php">
                            Services
                        </a>
                        <a class="" href="about.blade.php">
                            About
                        </a>
                        <a class="" href="why.blade.php">
                            Why Us
                        </a>
                        <a class="" href="contact.blade.php">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 footer-col">
                <div class="footer_contact">
                    <h4>
                        Contact Info
                    </h4>
                    <div class="contact_link_box">
                        <p>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                  Location
                </span>
                        </p>
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                  Call +01 1234567890
                </span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>
                  demo@gmail.com
                </span>
                        </a>
                        <p>
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span>
                  Mon-Sat: 09.00 am - 06.00 pm
                </span>
                        </p>
                        <p>
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span>
                  Sunday: closed
                </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 footer-col">
                <div class="map_container">
                    <div class="map">
                        <div id="googleMap"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-info">
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved By
                <a href="https://html.design/">Free Html Templates</a>
            </p>
        </div>
    </div>
</footer>
<!-- footer section -->

<script src="{{asset('public/js/jquery.js')}}"></script>
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
    document.querySelector('.cell_account').addEventListener('click', () => document.querySelector('.cell_account').classList.toggle('show'));
    document.querySelector('.cell_account').addEventListener('click', () => document.querySelector('.cell_info').classList.toggle('show'));
</script>
<script>
    AOS.init();
</script>
</body>

</html>
