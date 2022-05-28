@extends('welcome')
@section('title', 'Сервисы')
@section('content')
    <section class="min-vh-36">
        <div class="pt-lg-8 pb-lg-16 pt-8 pb-12">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-7 col-md-12">
                        <div>
                            <h1 class="text-black display-4 fw-semi-bold">Здесь вы можете оставить заявку на ремонт</h1>
                            <p class="text-black mb-6 lead">
                                Мы предоставляем широкий спектр услуг по сервисному ремонту и обслуживанию техники.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pb-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-12 mt-n8 mb-4 mb-lg-0" data-aos="fade-up" data-aos-once="true" data-aos-duration="1050">
                        <!-- Card -->
                        <div class="card rounded-3">
                            <!-- Card header -->
                            <div class="card-header border-bottom-0 p-0">
                                <div>
                                    <!-- Nav -->
                                    <ul class="nav nav-lb-tab" id="tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="text-blue nav-link active" id="table-tab" data-bs-toggle="pill"
                                               href="#table"
                                               role="tab" aria-controls="table" aria-selected="false">Оформить
                                                заявку</a>
                                        </li>
                                        <li class="nav-item">
                                        <li class="nav-item">
                                            <a class="text-blue nav-link" id="review-tab" data-bs-toggle="pill"
                                               href="#review"
                                               role="tab" aria-controls="review" aria-selected="false">Оценки</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="text-blue nav-link" id="faq-tab" data-bs-toggle="pill" href="#faq" role="tab" aria-controls="faq" aria-selected="false">Описание</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="tab-content" id="tabContent">
                                    <div class="tab-pane fade active show" id="table" role="tabpanel" aria-labelledby="table-tab">
                                        <!-- Card -->
                                        <div class="accordion" id="courseAccordion">
                                            <div>
                                                <!-- List group -->
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item px-0 pt-0">
                                                        <!-- Toggle -->
                                                        <a class="h4 mb-0 d-flex align-items-center text-inherit text-decoration-none active"
                                                           data-bs-toggle="collapse" href="#courseTwo"
                                                           aria-expanded="true" aria-controls="courseTwo">
                                                            <div class="me-auto">
                                                                Заявка
                                                            </div>
                                                            <!-- Chevron -->
                                                            <span class="chevron-arrow ms-4">
                                                              <i class="fa fa-chevron-down fs-4"></i>
                                                            </span>
                                                        </a>
                                                        <!-- Row -->
                                                        <!-- Collapse -->
                                                        <div class="collapse show" id="courseTwo"
                                                             data-bs-parent="#courseAccordion" style="">
                                                            <div class="pt-3 pb-2">
                                                                <form method="post" class="form"
                                                                      enctype="multipart/form-data" id="serviceForm"
                                                                      action="{{route('addService')}}">
                                                                    @csrf
                                                                    <label>
                                                                        Марка
                                                                        <select name="mark_id"
                                                                                class="form-select form_input"
                                                                                id="mark_id">
                                                                            <option value="default">Выберите марку
                                                                            </option>
                                                                            @foreach($mark as $tag)
                                                                                <option value="{{ $tag->id }}">
                                                                                    {{ $tag->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </label>
                                                                    @error('mark_id')
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                    <label>
                                                                        Тип техники
                                                                        <select name="type_technic_id"
                                                                                class="form-select form_input"
                                                                                id="type_technic_id">
                                                                            <option value="default">Выберите тип
                                                                                техники
                                                                            </option>
                                                                            @foreach($type as $tag)
                                                                                <option value="{{ $tag->id }}">
                                                                                    {{ $tag->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </label>
                                                                    @error('type_technic_id')
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail">Название</label>
                                                                        <input type="text"
                                                                               class="form-control form_input" id="name"
                                                                               aria-describedby="emailHelp" required
                                                                               name="name">
                                                                    </div>
                                                                    @error('name')
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail">Номер
                                                                            телефона</label>
                                                                        <input type="text"
                                                                               class="form-control form_input"
                                                                               id="phoneform"
                                                                               aria-describedby="emailHelp"
                                                                               required
                                                                               name="phoneform" maxlength="12">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputLogin">Описание</label>
                                                                        <input type="text"
                                                                               class="form-control form_input"
                                                                               id="description"
                                                                               aria-describedby="loginHelp"
                                                                               name="description"
                                                                               maxlength="2000"/>
                                                                    </div>
                                                                    @error('description')
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                    @error('photo')
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                    <label>
                                                                        Категория
                                                                        <select name="category_id"
                                                                                class="form-select form_input"
                                                                                id="category_id">
                                                                            <option value="default">Выберите категорию
                                                                            </option>
                                                                            @foreach($categories as $tag)
                                                                                <option value="{{ $tag->id }}">
                                                                                    {{ $tag->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </label>
                                                                    @error('category_id')
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                    <div class="mt-5"></div>
                                                                    <button type="submit"
                                                                            class="btn btn-outline-secondary">Отправить
                                                                    </button>
                                                                </form>
                                                                <script>
                                                                    $("#phoneform").mask("89999999999");
                                                                    $.validator.addMethod("valueNotEquals", function (value, element, arg) {
                                                                        return arg !== value;
                                                                    }, "Value must not equal arg.");
                                                                    $('#serviceForm').validate({
                                                                        rules: {
                                                                            mark_id: {
                                                                                valueNotEquals: 'default'
                                                                            },
                                                                            type_technic_id: {
                                                                                valueNotEquals: 'default'
                                                                            },
                                                                            category_id: {
                                                                                valueNotEquals: 'default'
                                                                            },
                                                                            name: {
                                                                                required: true,
                                                                                minLength: 6,
                                                                            },
                                                                            phoneform: {
                                                                                required: true,
                                                                                digits: true,
                                                                            },
                                                                        },
                                                                        messages: {
                                                                            mark_id: {
                                                                                valueNotEquals: 'Не выбрана марка'
                                                                            },
                                                                            type_technic_id: {
                                                                                valueNotEquals: 'Не выбран тип техники'
                                                                            },
                                                                            category_id: {
                                                                                valueNotEquals: 'Не выбрана категория'
                                                                            },
                                                                            name: {
                                                                                required: 'Введите название',
                                                                                minlength: 'Минимальная длина названия 6 символов'
                                                                            },
                                                                            phoneform: {
                                                                                required: 'Введите номер телефона',
                                                                                digits: 'Номер может включать себя только цифры'
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
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                        <!-- Reviews -->
                                        <div class="mb-3">
                                            <h3 class="mb-4">Как нас оценивают клиенты</h3>
                                            <div class="row align-items-center">
                                                <div class="col-auto text-center">
                                                    <h3 class="display-2 fw-bold">4.5</h3>
                                                    <i class="fa fa-star me-n1 text-warning"></i>
                                                    <i class="fa fa-star me-n1 text-warning"></i>
                                                    <i class="fa fa-star me-n1 text-warning"></i>
                                                    <i class="fa fa-star me-n1 text-warning"></i>
                                                    <i class="fa fa-star me-n1-half text-warning"></i>
                                                    <p class="mb-0 fs-6">(На основе 29 отзывов)</p>
                                                </div>
                                                <!-- Progress bar -->
                                                <div class="col pt-3 order-3 order-md-2">
                                                    <div class="progress mb-3" style="height: 6px;">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                             style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                    <div class="progress mb-3" style="height: 6px;">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                             style="width: 80%;" aria-valuenow="80" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                    <div class="progress mb-3" style="height: 6px;">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                             style="width: 70%;" aria-valuenow="70" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                    <div class="progress mb-3" style="height: 6px;">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                             style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                    <div class="progress mb-0" style="height: 6px;">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                             style="width: 50%;" aria-valuenow="50" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-auto col-6 order-2 order-md-3">
                                                    <!-- Rating -->
                                                    <div>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <span class="ms-1">53%</span>
                                                    </div>
                                                    <div>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-light"></i>
                                                        <span class="ms-1">36%</span>
                                                    </div>
                                                    <div>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-light"></i>
                                                        <i class="fa fa-star me-n1 text-light"></i>
                                                        <span class="ms-1">9%</span>
                                                    </div>
                                                    <div>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-light"></i>
                                                        <i class="fa fa-star me-n1 text-light"></i>
                                                        <i class="fa fa-star me-n1 text-light"></i>
                                                        <span class="ms-1">3%</span>
                                                    </div>
                                                    <div>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-light"></i>
                                                        <i class="fa fa-star me-n1 text-light"></i>
                                                        <i class="fa fa-star me-n1 text-light"></i>
                                                        <i class="fa fa-star me-n1 text-light"></i>
                                                        <span class="ms-1">2%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- hr -->
                                        <hr class="my-5">
                                        <div class="mb-3">
                                            <div class="d-lg-flex align-items-center justify-content-between mb-5">
                                                <!-- Reviews -->
                                                <div class="mb-3 mb-lg-0">
                                                    <h3 class="mb-0">Отзывы</h3>
                                                </div>
                                            </div>
                                            <!-- Rating -->
                                            <div class="d-flex border-bottom pb-4 mb-4">
                                                <img src="../assets/images/avatar/avatar-2.jpg" alt=""
                                                     class="rounded-circle avatar-lg">
                                                <div class=" ms-3">
                                                    <h4 class="mb-1">
                                                        Максим Хоткинс
                                                        <span class="ms-1 fs-6 text-muted">2 дня назад</span>
                                                    </h4>
                                                    <div class="fs-6 mb-2">
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                    </div>
                                                    <p>Очень хорошо.</p>
                                                </div>
                                            </div>
                                            <!-- Rating -->
                                            <div class="d-flex border-bottom pb-4 mb-4">
                                                <img src="../assets/images/avatar/avatar-3.jpg" alt=""
                                                     class="rounded-circle avatar-lg">
                                                <div class=" ms-3">
                                                    <h4 class="mb-1">Артур Вилламос <span
                                                            class="ms-1 fs-6 text-muted">3 дня назад</span>
                                                    </h4>
                                                    <div class="fs-6 mb-2">
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                    </div>
                                                    <p>Its pretty good.Just a reminder that there are also students with
                                                        Windows, meaning Figma its a bit different of yours. Thank
                                                        you!</p>
                                                </div>
                                            </div>
                                            <!-- Rating -->
                                            <div class="d-flex border-bottom pb-4 mb-4">
                                                <img src="../assets/images/avatar/avatar-4.jpg" alt=""
                                                     class="rounded-circle avatar-lg">
                                                <div class=" ms-3">
                                                    <h4 class="mb-1">Клара Джонс <span class="ms-1 fs-6 text-muted">4 дня назад</span>
                                                    </h4>
                                                    <div class="fs-6 mb-2">
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                    </div>
                                                    <p>
                                                        Great course for learning Figma, the only bad detail would be
                                                        that some icons are not included in the assets. But 90% of the
                                                        icons needed are included, and the voice of the instructor was
                                                        very clear and easy to understood.
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- Rating -->
                                            <div class="d-flex">
                                                <img src="../assets/images/avatar/avatar-5.jpg" alt=""
                                                     class="rounded-circle avatar-lg">
                                                <div class=" ms-3">
                                                    <h4 class="mb-1">
                                                        Бессие Пена
                                                        <span class="ms-1 fs-6 text-muted">5 дня назад</span>
                                                    </h4>
                                                    <div class="fs-6 mb-2">
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                        <i class="fa fa-star me-n1 text-warning"></i>
                                                    </div>
                                                    <p>
                                                        I have really enjoyed this class and learned a lot, found it
                                                        very inspiring and helpful, thank you!

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                                        <div class="mb-4">
                                            <h3 class="mb-2">Ваш гаджет можно доверить нам</h3>
                                            <p>
                                                После ремонта мы вручаем вам гарантийный талон.
                                            </p>
                                            <p>
                                                Если в течение 90 дней возникли неполадки — исправим все за свой счет.
                                            </p>
                                        </div>
                                        <h4 class="mb-3">Почему мы</h4>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-12">
                                                <ul class="list-unstyled">
                                                    <li class="d-flex mb-2">
                                                        <i class="fa fa-stark-circle-outline fs-4 text-success me-1 mt-2"></i>
                                                        <span>Наши специалисты не меняют ваши запчасти и комплектующие на китайские аналоги.</span>
                                                    </li>
                                                    <li class="d-flex mb-2">
                                                        <i class="fa fa-stark-circle-outline fs-4 text-success me-1 mt-2"></i>
                                                        <span>Ремонтируем то, что реально сломалось. Не ломаем то, что исправно работает.</span>
                                                    </li>
                                                    <li class="d-flex mb-2">
                                                        <i class="fa fa-stark-circle-outline fs-4 text-success me-1 mt-2"></i>
                                                        <span>Юридически подкреплённая гарантия сохранности устройства.</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12 mt-lg-n22" data-aos="fade-left" data-aos-once="true" data-aos-duration="1100">
                        <!-- Card -->
                        <div class="card mb-4">
                            <div>
                                <!-- Card header -->
                                <div class="card-header">
                                    <h4 class="mb-0">Что включает</h4>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item bg-transparent"><i
                                            class="fa fa-hammer align-middle me-2 text-primary"></i>Проверка детали на качество непосредственно производителем
                                    </li>
                                    <li class="list-group-item bg-transparent"><i
                                            class="fa fa-award me-2 align-middle text-success"></i>Надёжный поставщик подтверждает качество и отправляет деталь нам
                                    </li>
                                    <li class="list-group-item bg-transparent"><i
                                            class="fa-brands fa-searchengin align-middle me-2 text-info"></i>Перед установкой мы тщательно проверяем деталь на наличие дефектов
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Card -->
                    </div>
                </div>
                <!-- Card -->

            </div>
        </div>
    </section>
@endsection
