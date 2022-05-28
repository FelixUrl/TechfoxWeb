@extends('welcome')
@section('title', 'О нас')
@section('content')
    <section class="min-vh-36">
        <div class="py-10 bg-white">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-2 col-lg-8 col-md-12 col-12 mb-12">
                        <!-- caption-->
                        <h1 class="display-2 fw-bold mb-3">Привет! Мы <span class="text-primary">Tech</span>fox</h1>
                        <!-- para -->
                        <p class="h2 mb-3 ">«Techfox» - это коллектив профессионалов, которые любят свою работу,
                            постоянно совершенствуются в практических навыках и углубляют знания для оказания услуг по
                            высшему разряду. На вооружении у инженеров специализированное оборудование, которое
                            позволяет оперативно решать проблемы с неисправностями любого уровня сложности.</p>
                        <p class="mb-0 h4 text-body lh-lg">За длительный период деятельности «Techfox» сформировал
                            полноценный склад комплектующих и запчастей для техники любой категории. Благодаря этому
                            ремонт будет выполнен оперативно. Чтобы гарантировать многолетнюю службу после устранения
                            неполадок «Techfox» использует оригинальные детали.</p>
                    </div>
                </div>
                <!-- gallery -->
                <div class="gallery mb-12">
                    <!-- gallery-item -->
                    <figure class="gallery__item gallery__item--1 mb-0" data-aos-once="true" data-aos="zoom-in"  data-aos-easing="ease"
                            data-aos-duration="1000">
                        <img src="{{asset('/public/images/about1.jpg')}}" alt="Gallery image 1"
                             class="gallery__img rounded-3">
                    </figure>
                    <!-- gallery-item -->
                    <figure class="gallery__item gallery__item--2 mb-0" data-aos-once="true" data-aos="zoom-in"  data-aos-easing="ease"
                            data-aos-duration="1100">
                        <img src="{{asset('/public/images/about2.png')}}" alt="Gallery image 2"
                             class="gallery__img rounded-3">
                    </figure>
                    <!-- gallery-item -->
                    <figure class="gallery__item gallery__item--3 mb-0" data-aos-once="true" data-aos="zoom-in"  data-aos-easing="ease"
                            data-aos-duration="1200">
                        <img src="{{asset('/public/images/about3.jpg')}}" alt="Gallery image 3"
                             class="gallery__img rounded-3">
                    </figure>
                    <!-- gallery-item -->
                    <figure class="gallery__item gallery__item--4 mb-0" data-aos-once="true" data-aos="zoom-in"  data-aos-easing="ease"
                            data-aos-duration="1300">
                        <img src="{{asset('/public/images/about4.jpg')}}" alt="Gallery image 4"
                             class="gallery__img rounded-3">
                    </figure>
                    <!-- gallery-item -->
                    <figure class="gallery__item gallery__item--5 mb-0" data-aos-once="true" data-aos="zoom-in"  data-aos-easing="ease"
                            data-aos-duration="1400">
                        <img src="{{asset('/public/images/about5.jpg')}}" alt="Gallery image 5"
                             class="gallery__img rounded-3">
                    </figure>
                    <!-- gallery-item -->
                    <figure class="gallery__item gallery__item--6 mb-0" data-aos-once="true" data-aos="zoom-in"  data-aos-easing="ease"
                            data-aos-duration="1500">
                        <img src="{{asset('/public/images/about6.jpg')}}" alt="Gallery image 6"
                             class="gallery__img rounded-3">
                    </figure>
                </div>
                <div class="row">
                    <!-- row -->
                    <div class="col-md-6 offset-right-md-6 w-100">
                        <!-- heading -->
                        <h1 class="display-4 fw-bold mb-3">Наши достижения</h1>
                        <!-- para -->
                        <p class="lead">Techfox один из самых лучших сервисов по ремонту техники.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- counter -->
                        <div class="border-top pt-4 mt-6 mb-5" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000">
                            <h1 class="display-3 fw-bold mb-0">120.000</h1>
                            <p class="text-uppercase text-muted">Клиентов</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- counter -->
                        <div class="border-top pt-4 mt-6 mb-5" data-aos="fade-up" data-aos-once="true" data-aos-duration="1100">
                            <h1 class="display-3 fw-bold mb-0">430.000</h1>
                            <p class="text-uppercase text-muted">Устройств</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- counter -->
                        <div class="border-top pt-4 mt-6 mb-5" data-aos="fade-up" data-aos-once="true" data-aos-duration="1200">
                            <h1 class="display-3 fw-bold mb-0">24</h1>
                            <p class="text-uppercase text-muted">Специалиста</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- counter -->
                        <div class="border-top pt-4 mt-6 mb-5" data-aos="fade-up" data-aos-once="true" data-aos-duration="1300">
                            <h1 class="display-3 fw-bold mb-0">12</h1>
                            <p class="text-uppercase text-muted">Филиалов</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
