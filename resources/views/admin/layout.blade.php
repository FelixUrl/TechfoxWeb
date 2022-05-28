<!doctype html>
<html lang={{\Illuminate\Support\Facades\App::currentLocale()}}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ \Illuminate\Support\Facades\Session::token() }}">
    <link rel="icon" type="image/x-icon" href="{{asset('public/favicon.ico')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="{{asset('public/js/jquery.js')}}"></script>
    <script src="{{asset('public/js/new/jquery_form.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{asset('public/js/new/admin/chartlist.js')}}"></script>
    <script src="{{asset('public/js/new/admin/chartlist-tooltip.js')}}"></script>
    <script src="{{asset('public/js/new/admin/countUp.js')}}"></script>
    <script src="{{asset('public/js/new/admin/headroom.js')}}"></script>
    <script src="{{asset('public/js/new/admin/jquery.countdown.js')}}"></script>
    <script src="{{asset('public/js/new/admin/jquery.vmap.js')}}"></script>
    <script src="{{asset('public/js/new/admin/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('public/js/new/admin/prism.js')}}"></script>
    <script src="{{asset('public/js/new/admin/rocket.js')}}"></script>
    <script src="{{asset('public/js/new/admin/chart.bundle.js')}}"></script>
    <script src="{{asset('public/js/new/admin/smooth-scroll.polyfills.js')}}"></script>
    <script src="{{asset('public/js/picoModal.js')}}"></script>
    <script src="{{asset('public/js/new/decoration/chart.js')}}"></script>
    <script src="{{asset('public/js/new/decoration/lazysizes.js')}}"></script>
    <script src="{{asset('public/js/new/decoration/popper.js')}}"></script>
    <script src="{{asset('public/js/new/decoration/tether.js')}}"></script>
    <!-- validation JQuery -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js"
            type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <!-- new  -->
    <link rel="stylesheet" href="{{asset('public/css/new/admin/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/new/bootstrap-select.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/new/tagify.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/new/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/new/ion.rangeSlider.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/new/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/new/responsive.css')}}">
    <!-- new  -->
    <title>@yield('title')</title>
</head>
<body>
@error('msg')
<script>
    $.alert({
        title: 'Сообщение',
        content: "{{$message}}",
        backgroundDismiss: true,
        theme: 'supervan',
    });
</script>
@enderror
<?php $user = \App\Models\User::where('id', Auth::id())->first()?>
<div class="container-fluid bg-soft">
    <div class="row">
        <div class="col-12">
            <nav id="sidebarMenu" class="sidebar d-md-block bg-primary text-white collapse px-4">
                <div class="sidebar-sticky pt-4 mx-auto">
                    <div
                        class="user-card d-flex align-items-center justify-content-between justify-content-md-center pb-4">
                        <div class="d-flex align-items-center">
                            <div class="user-avatar lg-avatar mr-4"><img
                                    src="{{asset("storage/app/public/{$user->avatar}")}}"
                                    class="card-img-top rounded-circle border-white" alt="Bonnie Green"></div>
                            <div class="d-block"><h2 class="h6 text-center">Привет, {{$user->name}} </h2><a
                                    href="{{route('logout')}}"
                                    class="btn btn-secondary btn-xs"><span
                                        class="mr-2"><span class="fas fa-sign-out-alt"></span></span>Выйти</a></div>
                        </div>
                        <div class="collapse-close d-md-none"><a href="#sidebarMenu" class="fas fa-times"
                                                                 data-toggle="collapse" data-target="#sidebarMenu"
                                                                 aria-controls="sidebarMenu" aria-expanded="true"
                                                                 aria-label="Toggle navigation"></a></div>
                    </div>
                    <ul class="nav flex-column mt-4">
                        <li class="nav-item <?= ((Route::currentRouteName() == "Panel") ? 'active' : null) ?>"><a href="{{route('Panel')}}" class="nav-link"><span
                                    class="sidebar-icon"><span class="fas fa-chart-pie"></span></span>
                                <span>Обзор</span></a></li>
                        <li class="nav-item <?= ((Route::currentRouteName() == "AdminControlProducts") ? 'active' : null) ?>"><a href="{{route('AdminControlProducts')}}" class="nav-link"><span
                                    class="sidebar-icon"><span class="fas fa-tablet-alt"></span></span> <span>Товары</span></a>
                        </li>
                        <li class="nav-item <?= ((Route::currentRouteName() == "AdminControlUsers") ? 'active' : null) ?>"><a href="{{route('AdminControlUsers')}}" class="nav-link"><span
                                    class="sidebar-icon"><span class="fas fa-user-check"></span></span>
                                <span>Пользователи</span></a></li>
                        <li class="nav-item  <?= ((Route::currentRouteName() == "AdminControlOrders") ? 'active' : null) ?>"><a href="{{route('AdminControlOrders')}}" class="nav-link"><span
                                    class="sidebar-icon"><span class="fas fa-hand-holding-usd"></span></span> <span>Заказы</span></a>
                        </li>
                        <li class="nav-item <?= ((Route::currentRouteName() == "AdminControlRequest") ? 'active' : null) ?>"><a href="{{route('AdminControlRequest')}}" class="nav-link"><span
                                    class="sidebar-icon"><span class="fas fa-clipboard-list"></span></span> <span>Заявки</span></a>
                        </li>
                        <li class="nav-item"><a href="{{route('index')}}" class="nav-link"><span
                                    class="sidebar-icon"><span class="fab fa-firefox-browser"></span></span> <span>Обратно на сайт</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content">
                <div>
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</div>
<script defer=""
        src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194"
        integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw=="
        data-cf-beacon="{&quot;rayId&quot;:&quot;6fee80bdea269db6&quot;,&quot;token&quot;:&quot;3a2c60bab7654724a0f7e5946db4ea5a&quot;,&quot;version&quot;:&quot;2021.12.0&quot;,&quot;si&quot;:100}"
        crossorigin="anonymous" style="display: none !important;"></script>
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
