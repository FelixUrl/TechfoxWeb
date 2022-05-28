@extends('welcome')
@section('title', 'TechFox')
@section('content')
    <form id="occupationForm">@csrf
        <input type="hidden" value="{{$_SERVER['REMOTE_ADDR']}}" class="ip" name="id">
        <input type="hidden" value="{{$_SERVER['HTTP_USER_AGENT']}}" class="user_agent" name="user_agent">
    </form>
    <script>
        $(document).ready(function () {
            let formData = new FormData($('#occupationForm').get(0));
            $.ajax({
                url: '{{route('occupationData')}}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                headers: '{{\Illuminate\Support\Facades\Session::token()}}',
                success: function (data) {
                    console.log(data);
                }
            });
        });
    </script>
    <div class="hero_area">
        <!-- slider section -->
        <section class="slider_section ">
            <div class="slider-bg">
                <img src="/public/images/slider-bg.jpg" alt="">
            </div>
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container ">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="detail-box">
                                        <h1>
                                            Проблемы с техникой? <br>
                                            Мы поможем!
                                        </h1>
                                        <p>
                                        </p>
                                        <a href="">
                                            Узнать больше
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container ">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="detail-box">
                                        <h1>
                                            Нужно восстановить данные? <br>
                                            Мы восстановим!
                                        </h1>
                                        <p>
                                        </p>
                                        <a href="">
                                            Узнать больше
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container ">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="detail-box">
                                        <h1>
                                            Не можете найти запчасти? <br>
                                            Закажите у нас!
                                        </h1>
                                        <p>
                                        </p>
                                        <a href="">
                                            Узнать больше
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end slider section -->
    </div>
    <!-- service section -->
    <section class="service_section layout_padding">
        <div class="service_container">
            <div class="container ">
                <div class="heading_container heading_center">
                    <h2>
                        Наши <span>услуги</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="col-md-6" data-aos="fade-down-right" data-aos-once="true" data-aos-duration="1200">
                        <div class="box ">
                            <div class="img-box">
                                <img src="/public/images/s1.png" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Ремонт различной техники
                                </h5>
                                <p>
                                    Ремонт техники Xiaomi, Samsung, Asus, Honor, и пр.
                                </p>
                                <a href="">
                                    Подробнее
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-down-left" data-aos-once="true" data-aos-duration="1200">
                        <div class="box ">
                            <div class="img-box">
                                <img src="/public/images/s2.png" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Замена комплектующих
                                </h5>
                                <p>
                                    Заменим сломанные или несправные комплектующие вашего девайса.
                                </p>
                                <a href="">
                                    Подробнее
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-up-right" data-aos-once="true" data-aos-duration="1200">
                        <div class="box ">
                            <div class="img-box">
                                <img src="/public/images/s3.png" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Восстановление данных
                                </h5>
                                <p>
                                    Восстановим данные с ваших носителей данных.
                                </p>
                                <a href="">
                                    Подробнее
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-up-left" data-aos-once="true" data-aos-duration="1200">
                        <div class="box ">
                            <div class="img-box">
                                <img src="/public/images/s4.png" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Обновление ПО
                                </h5>
                                <p>
                                    Обновление программного обеспечения вашего девайса.
                                </p>
                                <a href="">
                                    Подробнее
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-box">
                    <a href="">
                        Посмотреть всё
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end service section -->
    <!-- about section -->
    <section class="about_section">
        <div class="container ">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                Мы предоставляем лучший сервис
                            </h2>
                        </div>
                        <p>
                            Вам не придется платить за диагностику даже в том случае, если вы захотите отказаться от
                            ремонта!
                            <br>
                            За 10 минут определим неисправность, оценим стоимость без завышения цены и наметим перечень
                            работ
                            <br>
                            Вы можете быть уверены, что эта стоимость не изменится в течение нашей работы
                        </p>
                        <a href="">
                            Подробнее
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="/public/images/about-img.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->
    <!-- why us section -->
    <section class="why_us_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Почему нас выбирают
                </h2>
            </div>
            <div class="row">
                <div class="col-md-4" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000">
                    <div class="box ">
                        <div class="img-box">
                            <img src="/public/images/w1.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Бесплатная диагностика
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-once="true" data-aos-duration="1450">
                    <div class="box ">
                        <div class="img-box">
                            <img src="/public/images/w2.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Быстрый ремонт
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-once="true" data-aos-duration="1800">
                    <div class="box ">
                        <div class="img-box">
                            <img src="/public/images/w3.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Гарантия низких цен
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end why us section -->
    <!-- client section -->
    <section class="client_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Что о нас говорят клиенты
                </h2>
            </div>
            <div class="carousel-wrap">
                <div class="">
                    <div class="item" data-aos="fade-right" data-aos-once="true" data-aos-duration="1100">
                        <div class="box">
                            <div class="client_id">
                                <div class="img-box">
                                    <img src="/public/images/client-danil.png" alt="">
                                </div>
                                <div class="client_detail">
                                    <div class="client_info">
                                        <h6>
                                            Данил Мурдид
                                        </h6>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="client_text">
                                <p>
                                    Я уже не в первый раз сталкиваюсь с этим сервисным центром. Я наткнулся на него
                                    случайно, когда искал в Интернете качественный и доступный сервис по ремонту iPad. Я
                                    нашел несколько странных компаний, или цена была настолько высока, что проще было
                                    купить
                                    новый продукт. В конце концов я отнес его в компанию Techfox. Они предупредили меня
                                    о
                                    возможных проблемах с ремонтом. Они сделали все быстро, и когда я забрал его, я не
                                    мог
                                    нарадоваться - он выглядел как новый. Дополнительным плюсом была приятная стоимость
                                    ремонта.
                                    Персонал очень приятный.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item" data-aos="fade-left" data-aos-once="true" data-aos-duration="1200">
                        <div class="box">
                            <div class="client_id">
                                <div class="img-box">
                                    <img src="/public/images/client-2.jpg" alt="">
                                </div>
                                <div class="client_detail">
                                    <div class="client_info">
                                        <h6>
                                            Кто то
                                        </h6>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="client_text">
                                <p>
                                    бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла
                                    бла бла бла
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item" data-aos="fade-right" data-aos-once="true" data-aos-duration="1300">
                        <div class="box">
                            <div class="client_id">
                                <div class="img-box">
                                    <img src="/public/images/client-1.jpg" alt="">
                                </div>
                                <div class="client_detail">
                                    <div class="client_info">
                                        <h6>
                                            Кто то
                                        </h6>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="client_text">
                                <p>
                                    бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла
                                    бла бла бла
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item" data-aos="fade-left" data-aos-once="true" data-aos-duration="1400">
                        <div class="box">
                            <div class="client_id">
                                <div class="img-box">
                                    <img src="/public/images/client-2.jpg" alt="">
                                </div>
                                <div class="client_detail">
                                    <div class="client_info">
                                        <h6>
                                            Кто то
                                        </h6>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="client_text">
                                <p>
                                    бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла бла
                                    бла бла бла
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end client section -->
    <!-- contact section -->
    <section class="contact_section layout_padding">

        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Связаться с нами
                </h2>
            </div>
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div class="form_container">
                        <form method="post" action="{{route('indexMailSend')}}">
                            @csrf
                            <div class="row form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Ваше имя" required
                                           name="name"/>
                                </div>
                                @error('name')
                                {{$message = 'Неверное имя'}}
                                @enderror
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" placeholder="Ваша почта" required name="email"/>
                                </div>
                                @error('email')
                                {{$message = 'Неверный емайл'}}
                                @enderror
                            </div>
                            <div class="form-group ">
                                <input type="text" class="message-box" placeholder="Сообщение" required name="message"/>
                                @error('message')
                                {{$message = 'Некорректное сообщение'}}
                                @enderror
                            </div>
                            <div class="btn-box">
                                <button type="submit">Отправить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact section -->
@endsection
