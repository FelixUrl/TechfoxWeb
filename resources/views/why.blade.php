@extends('welcome')
@section('title', 'Почему мы')
@section('content')
    <div class="py-8 bg-colors-gradient">
        <div class="container">
            <div class="row">
                <div class="offset-md-2 col-md-8 col-12">
                    <!-- caption-->
                    <h1 class="fw-bold mb-1 display-4">Почему именно мы</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="py-10">
        <div class="container">
            <div class="row">
                <div class="offset-md-2 col-md-8 col-12">
                    <div class="mb-4">
                        <h2 class="mb-0 fw-semi-bold">Самые популярные вопросы</h2>
                    </div>
                    <div class="accordion accordion-flush" id="accordionExample">
                        <div class="border p-3 rounded-3 mb-2" id="headingOne" data-aos="fade-up" data-aos-once="true" data-aos-duration="900">
                            <h3 class="mb-0 fs-4">
                                <a href="#"
                                   class="d-flex align-items-center text-inherit text-decoration-none active collapsed"
                                   data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                                   aria-controls="collapseOne">
                    <span class="me-auto">
                      Что такое Techfox?
                    </span>
                                    <span class="collapse-toggle ms-4">
                      <i class="fa fa-chevron-down text-muted"></i>
                    </span>
                                </a>
                            </h3>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                 data-bs-parent="#accordionExample" style="">
                                <div class="pt-2">
                                    Это сервисный центр, который осуществляет ремонт и обслуживание техники как
                                    цифрового, так и бытового направлений.
                                </div>
                            </div>
                        </div >
                        <div class="border p-3 rounded-3 mb-2" id="headingTwo" data-aos="fade-up" data-aos-once="true" data-aos-duration="1100">
                            <h3 class="mb-0 fs-4">
                                <a href="#"
                                   class="d-flex align-items-center text-inherit text-decoration-none collapsed"
                                   data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                   aria-controls="collapseTwo">
                    <span class="me-auto">
                      Почему именно с нами стоит заключить долгосрочный договор на ремонт и обслуживание техники?
                    </span>
                                    <span class="collapse-toggle ms-4">
                      <i class="fa fa-chevron-down text-muted"></i>
                    </span>
                                </a>
                            </h3>

                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                 data-bs-parent="#accordionExample" style="">
                                <div class="pt-3">
                                    На территории Челябинска имеется ряд сервисных центров предоставляющих подобные
                                    услуги, однако, только наш многолетний опыт работ по ремонту и обслуживанию
                                    позволяет предоставить качество и кратчайшие сроки выполнения работ подобного рода.
                                    <br>
                                    <br>
                                    Заключив договор с нами, Вы доверяете свою технику профессионалам.
                                    Так же мы предоставляем скидки на проделываемые нами работы, оговоренные отдельно.

                                </div>
                            </div>

                        </div>
                        <div class="border p-3 rounded-3 mb-2" id="headingThree" data-aos="fade-up" data-aos-once="true" data-aos-duration="1300">
                            <h3 class="mb-0 fs-4">
                                <a href="#"
                                   class="d-flex align-items-center text-inherit text-decoration-none active collapsed"
                                   data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                   aria-controls="collapseThree">
                    <span class="me-auto">
                      Какие ещё есть дополнительные услуги?
                    </span>
                                    <span class="collapse-toggle ms-4">
                      <i class="fa fa-chevron-down text-muted"></i>
                    </span>
                                </a>
                            </h3>

                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                 data-bs-parent="#accordionExample" style="">
                                <div class="pt-3">
                                    - бесплатная консультация в удобное для Вас время<br>
                                    - индивидуальный подход к каждому клиенту<br>
                                    - выезд к Вам в случае экстренной необходимости<br>
                                    - бесплатная диагностика<br>
                                    - качественный ремонт на оригинальных комплектующих<br>
                                    - обширные сроки гарантии<br>
                                    - быстрые скорость проведения диагностических, ремонтных и обслуживающих работ<br>
                                    - бесплатное послеремонтное тестирование устройства<br>
                                </div>

                            </div>
                        </div>
                        <div class="border p-3 rounded-3 mb-2" id="headingFour" data-aos="fade-up" data-aos-once="true" data-aos-duration="1500">
                            <h3 class="mb-0 fs-4">
                                <a href="#"
                                   class="d-flex align-items-center text-inherit text-decoration-none active collapsed"
                                   data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                   aria-controls="collapseFour">
                    <span class="me-auto">
                      Порядок заключения договора
                    </span>
                                    <span class="collapse-toggle ms-4">
                      <i class="fa fa-chevron-down text-muted"></i>
                    </span>
                                </a>
                            </h3>

                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                 data-bs-parent="#accordionExample">
                                <div class="pt-3">
                                    Для того, чтобы обсудить условия сотрудничества и стоимости сервисного ремонта или
                                    обслуживания, Вам необходимо связаться с нами, позвонив по контактному телефону на
                                    сайте или отправив письмо на наш почтовый ящик: techfox@techfox.ru
                                </div>

                            </div>
                        </div>
                        <div class="border p-3 rounded-3 mb-2" id="headingFive" data-aos="fade-up" data-aos-once="true" data-aos-duration="1700">
                            <h3 class="mb-0 fs-4">
                                <a href="#"
                                   class="d-flex align-items-center text-inherit text-decoration-none active collapsed"
                                   data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                   aria-controls="collapseFive">
                    <span class="me-auto">
                      Сколько стоит ремонт?
                    </span>
                                    <span class="collapse-toggle ms-4">
                      <i class="fa fa-chevron-down text-muted"></i>
                    </span>
                                </a>
                            </h3>

                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                 data-bs-parent="#accordionExample">
                                <div class="pt-3">
                                    После диагностики мы озвучим окончательную стоимость ремонта. Я могу вам
                                    гарантировать, что эта стоимость не изменится в течение нашей работы. Сумма будет
                                    прописана в квитанции, которую вы получите на руки.
                                </div>

                            </div>
                        </div>
                        <div class="border p-3 rounded-3 mb-2" id="headingSix" data-aos="fade-up" data-aos-once="true" data-aos-duration="1900">
                            <h3 class="mb-0 fs-4">
                                <a href="#"
                                   class="d-flex align-items-center text-inherit text-decoration-none active collapsed"
                                   data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                                   aria-controls="collapseSix">
                    <span class="me-auto">
                      Вы используете китайские аналоги?
                    </span>
                                    <span class="collapse-toggle ms-4">
                      <i class="fa fa-chevron-down text-muted"></i>
                    </span>
                                </a>
                            </h3>

                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                 data-bs-parent="#accordionExample">
                                <div class="pt-3">
                                    Нет, мы не используем китайские компоненты. Специалисты нашей компании тщательно
                                    проверяют каждую запчасть на наличие сколов, царапин и брака перед установкой. Мы не
                                    используем дешевые китайские запчасти в ремонте и работаем только на
                                    профессиональном оборудовании.
                                </div>

                            </div>
                        </div>
                        <div class="border p-3 rounded-3 mb-2" id="headingSeven" data-aos="fade-up" data-aos-once="true" data-aos-duration="2100">
                            <h3 class="mb-0 fs-4">
                                <a href="#"
                                   class="d-flex align-items-center text-inherit text-decoration-none active collapsed"
                                   data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false"
                                   aria-controls="collapseSeven">
                    <span class="me-auto">
                      Есть ли гарантия?
                    </span>
                                    <span class="collapse-toggle ms-4">
                      <i class="fa fa-chevron-down text-muted"></i>
                    </span>
                                </a>
                            </h3>

                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                                 data-bs-parent="#accordionExample">
                                <div class="pt-3">
                                    Мы даем гарантию и исполняем ее. На технику это всегда год. На ремонт 3 месяца.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
