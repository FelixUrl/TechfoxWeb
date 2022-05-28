<!doctype html>
<html lang={{\Illuminate\Support\Facades\App::currentLocale()}}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ \Illuminate\Support\Facades\Session::token() }}">
    <meta name="description" content="«Techfox» — Сеть сервисных центров Apple, Samsung, Xiaomi, Honor и пр.📱 Ремонтируем: Технику Apple ➜ Телефоны ➜ Ноутбуки ➜ Планшеты ➜ Роботы-пылесосы ➜ Игровые приставки. ✅Бесплатная диагностика ✅Гарантия 90 дней">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="Ремонт центр Apple эпл в Челябинске техники Айфонов цена Сервисный сервис по ремонту">
    <link rel="icon" type="image/x-icon" href="{{asset('public/favicon.ico')}}">
    <meta name="og:title" content="Techfox">
    <meta name="og:description" content="«Techfox» — Сеть сервисных центров Apple, Samsung, Xiaomi, Honor и пр.">
    <meta name="og:url" content="https://techfox.ru">
    <meta name="og:site_name" content="https://techfox.ru">
    <meta name="og:image" content="https://photos-mt.kcdn.kz/webp/00/00815989-804c-46e6-a615-f4234b6b7b00/1-760x450.jpg">
    <meta name="og:locale" content="ru_RU">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
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
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NQ1K4EYEPJ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-NQ1K4EYEPJ');
    </script>

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
<header class="header_section">
    <div class="header_top">
        <div class="container">
            <div class="top_nav_container">
                <a class="navbar-brand d-none d-lg-flex" href="{{route('index')}}">
              <span>
                <img src="{{asset('public/src/TechFox.svg')}}" alt="Techfox" height="45px"/> Techfox
              </span>
                </a>
                <div class="contact_nav">
                    <a href="">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span>
                   +79991234770
                </span>
                    </a>
                    <a href="">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span>
                  techfox@gmail.com
                </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="header_bottom">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand d-lg-none" href="{{route('index')}}">
              <span>
                <img src="{{asset('public/src/TechFox.svg')}}" alt="Techfox" height="40px"/> Techfox
              </span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('service')}}">Сервисы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('Catalog')}}">Каталог</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('about')}}"> О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('why')}}">Почему мы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contact')}}">Контакты</a>
                        </li>

                    </ul>
                    <div class="search_form dropstart">

                        <ul class="navbar-nav flex jcc aic">
                            <a href="{{route('Cart')}}"><i class="fa fa-cart-shopping text-white pointer"></i></a>
                            @guest()
                                <li class="nav-item ">
                                    <a class="nav-link pointer" data-bs-toggle="modal"
                                       data-bs-target="#authModal">Войти</a>
                                </li>
                            @endguest
                            @auth()
                                <li class="nav-item dropdown desktop-item">
                                    <a class="nav-link nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                       role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                       aria-haspopup="true">
                                        Вы вошли как {{Auth::user()->login}}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @if(Auth::user()->isAdmin == true)
                                            <li><a class="dropdown-item" href="{{route('Panel')}}">Панель управления</a>
                                            </li>
                                            <li><a class="dropdown-item" href="{{route('ProductView')}}">Добавить
                                                    продукт</a></li>
                                        @endif
                                        <li><a class="dropdown-item" href="{{route('Cabinet')}}">Личный кабинет</a></li>
                                        <li><a class="dropdown-item" href="{{route('AddRequest')}}">Создать заявку</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="{{route('logout')}}">Выйти</a></li>
                                    </ul>
                                </li>
                                @if(Auth::user()->isAdmin == true)
                                    <li class="nav-item mobile-item"><a class="nav-link" href="{{route('Panel')}}">Панель
                                            управления</a></li>
                                @endif
                                <li class="nav-item mobile-item"><a class="nav-link" href="{{route('Cabinet')}}">Личный
                                        кабинет</a></li>
                                @if(Auth::user()->isAdmin == true)
                                    <li class="nav-item mobile-item"><a class="nav-link"
                                                                        href="{{route('ProductView')}}">Добавить
                                            продукт</a></li>
                                @endif
                                <li class="nav-item mobile-item">
                                    <a class="nav-link" href="{{route('AddRequest')}}">Создать заявку</a></li>
                                <li class="nav-item mobile-item"><a class="nav-link"
                                                                    href="{{route('logout')}}">Выйти</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>

<!-- Reg Modal -->
<div class="modal fade" id="regModal" tabindex="-1" aria-labelledby="regModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="regModalLabel">Регистрация</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route('regPost')}}" id="regFormModal">
                @csrf
                <div class="modal-body">
                    <section class="container">
                        <div class="row block-center form flex jcc">
                            <div class="form-group">
                                <label for="exampleInputEmail">Почта</label>
                                <input type="email" class="form-control form_input" id="email"
                                       aria-describedby="emailHelp" required name="email">
                            </div>
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputLogin">Логин</label>
                                <input type="text" class="form-control form_input" id="login"
                                       aria-describedby="loginHelp" required name="login">
                            </div>
                            @error('login')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputLogin">Телефон</label>
                                <input type="text" class="form-control form_input" id="phone"
                                       aria-describedby="loginHelp" required name="phone">
                            </div>
                            @error('phone')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword">Пароль</label>
                                <input type="password" class="form-control form_input" id="password" required
                                       name="password">
                            </div>
                            @error('password')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword">Подтверждение пароля</label>
                                <input type="password" class="form-control form_input" id="password_confirmation"
                                       required name="password_confirmation">
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <div class="btn-group w-100" role="group" aria-label="Basic example">
                        <button type="submit" class="btn btn-outline-info w-50">Зарегистрироваться</button>
                        <button type="button" class="btn btn-outline-secondary w-50" data-bs-dismiss="modal"
                                data-bs-toggle="modal"
                                data-bs-target="#authModal">Авторизация
                        </button>
                    </div>
                </div>
            </form>
            <script>
                $("#phone").mask("89999999999");
                $('#regFormModal').validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        login: {
                            required: true,
                            minlength: 6,
                        },
                        phone: {
                            required: true,
                            digits: true,
                        },
                        password: {
                            required: true,
                            minlength: 6,
                        },
                        password_confirmation: {
                            minlength: 6,
                            equalTo: "#password",
                        }
                    },
                    messages:{
                        email: {
                            required: 'Введите e-mail',
                            email: 'Адрес должен быть типа techfox@techfox.com'
                        },
                        login: {
                            required: 'Введите логин',
                            minlength: 'Минимальная длина логина 6 символов'
                        },
                        phone: {
                            required: 'Введите номер телефона',
                            digits: 'Номер может включать себя только цифры'
                        },
                        password:{
                            required: 'Введите пароль',
                            minlength: 'Минимальная длина пароля 6 символов'
                        },
                        password_confirmation: {
                            required: 'Введите пароль',
                            equalTo: 'Ваш пароль должен совпадать'
                        }
                    },
                    errorElement: 'span',
                    errorPlacement: function (error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function (element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    }
                });
            </script>
        </div>
    </div>

</div>
<!-- Auth Modal -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="authModalLabel">Авторизация</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route('authPost')}}" id="authFormModal">
                @csrf
                <div class="modal-body">
                    <section class="container">
                        <div class="row block-center form flex jcc">

                            <div class="form-group">
                                <label for="exampleInputEmail">Почта</label>
                                <input type="text" class="form-control form_input" id="email"
                                       aria-describedby="emailHelp"
                                       name="email">
                            </div>
                            @error('email')
                            <p class="text-danger">{{$message = 'Некорректный email'}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword">Пароль</label>
                                <input type="password" class="form-control form_input" id="password"
                                       name="password">
                                @error('password')
                                <p class="text-danger">{{$message = 'Неверный пароль'}}</p>
                                @enderror
                            </div>


                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <div class="btn-group w-100" role="group" aria-label="Basic example">
                        <button type="submit" class="btn btn-outline-info w-50">Войти</button>
                        <button type="button" class="btn btn-outline-secondary w-50" data-bs-dismiss="modal"
                                data-bs-toggle="modal"
                                data-bs-target="#regModal">Регистрация
                        </button>
                    </div>
                </div>
            </form>
            <script>
                $('#authFormModal').validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 6,
                        }
                    },
                    messages:{
                        email: {
                            required: 'Введите e-mail',
                            email: 'Адрес должен быть типа techfox@techfox.com'
                        },
                        password:{
                            required: 'Введите пароль',
                            minlength: 'Минимальная длина пароля 6 символов'
                        },
                    },
                    errorElement: 'span',
                    errorPlacement: function (error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function (element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    }
                });
            </script>
        </div>
    </div>
</div>
<div>
    @yield('content')
</div>
<!-- footer section -->
<footer class="footer_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 footer-col">
                <div class="footer_detail">
                    <h4>
                        О нас
                    </h4>
                    <p>
                        «Techfox» - это коллектив профессионалов, которые любят свою работу, постоянно совершенствуются в практических навыках и углубляют знания для оказания услуг по высшему разряду.
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
                        Ссылки
                    </h4>
                    <div class="footer_links">
                        <a class="active" href="{{route('index')}}">
                            Techfox
                        </a>
                        <a class="" href="{{route('service')}}">
                            Сервисы
                        </a>
                        <a class="" href="{{route('about')}}">
                            О нас
                        </a>
                        <a class="" href="{{route('why')}}">
                            Почему мы
                        </a>
                        <a class="" href="{{route('contact')}}">
                            Контакты
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 footer-col">
                <div class="footer_contact">
                    <h4>
                        Информация
                    </h4>
                    <div class="contact_link_box">
                        <p>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                  Местоположение
                </span>
                        </p>
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                  Звонок +7 9991234770
                </span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>
                  techfox@gmail.com
                </span>
                        </a>
                        <p>
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span>
                  Пн-Сб: с 09.00 утра - 18.00 вечера
                </span>
                        </p>
                        <p>
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span>
                  Воскресенье: выходной
                </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 footer-col">
                <div class="map_container">
                    <div class="map">
                        <iframe id="map_310483884" frameborder="0" width="100%" height="100%" sandbox="allow-modals allow-forms allow-scripts allow-same-origin allow-popups allow-top-navigation-by-user-activation"></iframe><script type="text/javascript">(function(e,t){var r=document.getElementById(e);r.contentWindow.document.open(),r.contentWindow.document.write(atob(t)),r.contentWindow.document.close()})("map_310483884", "PGJvZHk+PHN0eWxlPgogICAgICAgIGh0bWwsIGJvZHkgewogICAgICAgICAgICBtYXJnaW46IDA7CiAgICAgICAgICAgIHBhZGRpbmc6IDA7CiAgICAgICAgfQogICAgICAgIGh0bWwsIGJvZHksICNtYXAgewogICAgICAgICAgICB3aWR0aDogMTAwJTsKICAgICAgICAgICAgaGVpZ2h0OiAxMDAlOwogICAgICAgIH0KICAgICAgICAuYnVsbGV0LW1hcmtlciB7CiAgICAgICAgICAgIHdpZHRoOiAyMHB4OwogICAgICAgICAgICBoZWlnaHQ6IDIwcHg7CiAgICAgICAgICAgIGJveC1zaXppbmc6IGJvcmRlci1ib3g7CiAgICAgICAgICAgIGJhY2tncm91bmQtY29sb3I6ICNmZmY7CiAgICAgICAgICAgIGJveC1zaGFkb3c6IDAgMXB4IDNweCAwIHJnYmEoMCwgMCwgMCwgMC4yKTsKICAgICAgICAgICAgYm9yZGVyOiA0cHggc29saWQgIzAyODFmMjsKICAgICAgICAgICAgYm9yZGVyLXJhZGl1czogNTAlOwogICAgICAgIH0KICAgICAgICAucGVybWFuZW50LXRvb2x0aXAgewogICAgICAgICAgICBiYWNrZ3JvdW5kOiBub25lOwogICAgICAgICAgICBib3gtc2hhZG93OiBub25lOwogICAgICAgICAgICBib3JkZXI6IG5vbmU7CiAgICAgICAgICAgIHBhZGRpbmc6IDZweCAxMnB4OwogICAgICAgICAgICBjb2xvcjogIzI2MjYyNjsKICAgICAgICB9CiAgICAgICAgLnBlcm1hbmVudC10b29sdGlwOmJlZm9yZSB7CiAgICAgICAgICAgIGRpc3BsYXk6IG5vbmU7CiAgICAgICAgfQogICAgICAgIC5kZy1wb3B1cF9oaWRkZW5fdHJ1ZSB7CiAgICAgICAgICAgIGRpc3BsYXk6IGJsb2NrOwogICAgICAgIH0KICAgICAgICAubGVhZmxldC1jb250YWluZXIgLmxlYWZsZXQtcG9wdXAgLmxlYWZsZXQtcG9wdXAtY2xvc2UtYnV0dG9uIHsKICAgICAgICAgICAgdG9wOiAwOwogICAgICAgICAgICByaWdodDogMDsKICAgICAgICAgICAgd2lkdGg6IDIwcHg7CiAgICAgICAgICAgIGhlaWdodDogMjBweDsKICAgICAgICAgICAgZm9udC1zaXplOiAyMHB4OwogICAgICAgICAgICBsaW5lLWhlaWdodDogMTsKICAgICAgICB9CiAgICA8L3N0eWxlPjxkaXYgaWQ9Im1hcCI+PC9kaXY+PHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiIHNyYz0iaHR0cHM6Ly9tYXBzLmFwaS4yZ2lzLnJ1LzIuMC9sb2FkZXIuanM/cGtnPWZ1bGwmYW1wO3NraW49bGlnaHQiPjwvc2NyaXB0PjxzY3JpcHQ+KGZ1bmN0aW9uKGUsdCl7dmFyIHI9SlNPTi5wYXJzZShlKSxuPUpTT04ucGFyc2UodCk7ZnVuY3Rpb24gYShlKXtyZXR1cm4gZGVjb2RlVVJJQ29tcG9uZW50KGF0b2IoZSkuc3BsaXQoIiIpLm1hcChmdW5jdGlvbihlKXtyZXR1cm4iJSIrKCIwMCIrZS5jaGFyQ29kZUF0KDApLnRvU3RyaW5nKDE2KSkuc2xpY2UoLTIpfSkuam9pbigiIikpfURHLnRoZW4oZnVuY3Rpb24oKXt2YXIgZT1ERy5tYXAoIm1hcCIse2NlbnRlcjpbbi5sYXQsbi5sb25dLHpvb206bi56b29tfSk7REcuZ2VvSlNPTihyLHtzdHlsZTpmdW5jdGlvbihlKXt2YXIgdCxyLG4sYSxvO3JldHVybntmaWxsQ29sb3I6bnVsbD09PSh0PWUpfHx2b2lkIDA9PT10P3ZvaWQgMDp0LnByb3BlcnRpZXMuZmlsbENvbG9yLGZpbGxPcGFjaXR5Om51bGw9PT0ocj1lKXx8dm9pZCAwPT09cj92b2lkIDA6ci5wcm9wZXJ0aWVzLmZpbGxPcGFjaXR5LGNvbG9yOm51bGw9PT0obj1lKXx8dm9pZCAwPT09bj92b2lkIDA6bi5wcm9wZXJ0aWVzLnN0cm9rZUNvbG9yLHdlaWdodDpudWxsPT09KGE9ZSl8fHZvaWQgMD09PWE/dm9pZCAwOmEucHJvcGVydGllcy5zdHJva2VXaWR0aCxvcGFjaXR5Om51bGw9PT0obz1lKXx8dm9pZCAwPT09bz92b2lkIDA6by5wcm9wZXJ0aWVzLnN0cm9rZU9wYWNpdHl9fSxwb2ludFRvTGF5ZXI6ZnVuY3Rpb24oZSx0KXtyZXR1cm4icmFkaXVzImluIGUucHJvcGVydGllcz9ERy5jaXJjbGUodCxlLnByb3BlcnRpZXMucmFkaXVzKTpERy5tYXJrZXIodCx7aWNvbjpmdW5jdGlvbihlKXtyZXR1cm4gREcuZGl2SWNvbih7aHRtbDoiPGRpdiBjbGFzcz0nYnVsbGV0LW1hcmtlcicgc3R5bGU9J2JvcmRlci1jb2xvcjogIitlKyI7Jz48L2Rpdj4iLGNsYXNzTmFtZToib3ZlcnJpZGUtZGVmYXVsdCIsaWNvblNpemU6WzIwLDIwXSxpY29uQW5jaG9yOlsxMCwxMF19KX0oZS5wcm9wZXJ0aWVzLmNvbG9yKX0pfSxvbkVhY2hGZWF0dXJlOmZ1bmN0aW9uKGUsdCl7ZS5wcm9wZXJ0aWVzLmRlc2NyaXB0aW9uJiZ0LmJpbmRQb3B1cChhKGUucHJvcGVydGllcy5kZXNjcmlwdGlvbikse2Nsb3NlQnV0dG9uOiEwLGNsb3NlT25Fc2NhcGVLZXk6ITB9KSxlLnByb3BlcnRpZXMudGl0bGUmJnQuYmluZFRvb2x0aXAoYShlLnByb3BlcnRpZXMudGl0bGUpLHtwZXJtYW5lbnQ6ITAsb3BhY2l0eToxLGNsYXNzTmFtZToicGVybWFuZW50LXRvb2x0aXAifSl9fSkuYWRkVG8oZSl9KX0pKCdbeyJ0eXBlIjoiRmVhdHVyZSIsInByb3BlcnRpZXMiOnsidGl0bGUiOiJWR1ZqYUdadmVBPT0iLCJkZXNjcmlwdGlvbiI6IlBIQStWR1ZqYUdadmVEd3ZjRDQ9IiwiY29sb3IiOiIjZmY5NTNlIiwiekluZGV4IjoxMDAwMDAwMDAwfSwiZ2VvbWV0cnkiOnsidHlwZSI6IlBvaW50IiwiY29vcmRpbmF0ZXMiOls2MS4zNzczNTQsNTUuMTUxMDc3XX0sImlkIjoxMDg2fV0nLCd7ImxhdCI6NTUuMTUwOTkyMjU2ODgwNzQsImxvbiI6NjEuMzc3Mjg2NjEyOTg3NTI1LCJ6b29tIjoxOH0nKTwvc2NyaXB0PjxzY3JpcHQgYXN5bmM9IiIgdHlwZT0idGV4dC9qYXZhc2NyaXB0IiBzcmM9Imh0dHBzOi8vd3d3Lmdvb2dsZXRhZ21hbmFnZXIuY29tL2d0YWcvanM/aWQ9VUEtMTU4ODY2MTY4LTEiPjwvc2NyaXB0PjxzY3JpcHQgdHlwZT0idGV4dC9qYXZhc2NyaXB0Ij4oZnVuY3Rpb24oZSl7ZnVuY3Rpb24gdCgpe2RhdGFMYXllci5wdXNoKGFyZ3VtZW50cyl9d2luZG93LmRhdGFMYXllcj13aW5kb3cuZGF0YUxheWVyfHxbXSx0KCJqcyIsbmV3IERhdGUpLHQoImNvbmZpZyIsZSksd2luZG93Lmd0YWc9dH0pKCdVQS0xNTg4NjYxNjgtMScpPC9zY3JpcHQ+PC9ib2R5Pg==")</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-info">
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> Все права защищены
                <a href="https://linktr.ee/fe1ix">Techfox</a>
            </p>
        </div>
    </div>
</footer>
<!-- footer section -->
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
