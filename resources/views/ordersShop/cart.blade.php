@extends('welcome')
@section('title', 'Корзина')
@section('content')
    <?php
    $priceAll = 0;
    $sum = 0;
    $shipping = 0;
    $tax = 0;
    $count = 0;
    $total = 0;
    $total_sum = 0;
    \Gloudemans\Shoppingcart\Facades\Cart::setGlobalTax(20);
    ?>
    <section class="pt-7 pb-12">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Heading -->
                    @guest()
                        <h1 class="mb-10 text-center">Вы не сможете сделать заказ, пока не будете авторизированы</h1>
                    @endguest
                    @auth()
                        <h2 class="mb-10 text-center">Корзина</h2>
                    @endauth
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-7">
                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $product )
                    <!-- List group -->
                        <ul class="list-group list-group-lg list-group-flush-x mb-6">
                            <li class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <!-- Image -->
                                        <a href="product.html">
                                            <img src="{{asset('/storage/app/public/' . $product->options->image)}}"
                                                 alt="{{$product->name}}" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <!-- Title -->
                                        <div class="d-flex mb-2 jcsb font-weight-bold w-100">
                                            <a class="text-body"
                                               href="product.html">{{$product->options->description}}</a>
                                            <div class="float-end">{{$product->price}} руб.</div>
                                            <?php $priceAll = 0 ?>
                                            <input type="hidden" value="{{$priceAll += $product->price}}">
                                        </div>
                                        <!-- Text -->
                                        <p class="mb-7 font-size-sm text-muted">
                                            Марка: {{$product->options->marka}} <br>
                                            Модель: Red
                                        </p>
                                        <!--Footer -->
                                        <div class="d-flex align-items-center">
                                            <!-- Select -->
                                            <input type="number" value="{{$product->qty}}" min="1">
                                            <?php $count = 0 ?>
                                            <input type="hidden" value="{{$count += $product->qty}}">
                                        <?php  $total = $count * $priceAll ?>
                                        <!-- Remove -->
                                            <a class="font-size-xs text-gray-400 ml-auto" href="#!">
                                                <i class="fe fe-x"></i>
                                                <form method="post" action="{{route('Cart')}}">@csrf
                                                    <input type="hidden" name="rowId" value="{{$product->rowId}}">
                                                    <button type="submit" class="remove-product" id="removeButton">
                                                        Удалить
                                                    </button>
                                                </form>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    <?php
                    $total_sum += $total;
                    $total = 0
                    ?>
                @endforeach
                <!-- Footer -->
                    <div class="row align-items-end justify-content-between mb-10 mb-md-0">
                        <div class="col-12 col-md-7">

                            <!-- Coupon -->
                            <form class="mb-7 mb-md-0">
                                <label class="font-size-sm font-weight-bold" for="cartCouponCode">
                                    Промокод:
                                </label>
                                <div class="row form-row">
                                    <div class="col">

                                        <!-- Input -->
                                        <input class="form-control form-control-sm" id="cartCouponCode" type="text"
                                               placeholder="Введите промокод тут">

                                    </div>
                                    <div class="col-auto">

                                        <!-- Button -->
                                        <button class="btn btn-sm btn-dark" type="submit">
                                            Применить
                                        </button>

                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="col-12 col-md-auto">

                            <!-- Button -->
                            <button class="btn btn-sm btn-outline-dark">Обновить корзину</button>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-4 offset-lg-1">
                    <!-- Total -->
                    <div class="card mb-7 w-100">
                        <div class="card-body">
                            <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                                <li class="list-group-item d-flex jcsb w-100">
                                    <span>Подитог:</span> <span class="ml-auto font-size-sm ">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}} руб.</span>
                                </li>
                                <li class="list-group-item d-flex jcsb w-100">
                                    <span>Налог 20%(НДС)</span> <span class="ml-auto font-size-sm">{{\Gloudemans\Shoppingcart\Facades\Cart::tax()}} руб.</span>
                                </li>
                                <li class="list-group-item d-flex font-size-lg font-weight-bold jcsb w-100">
                                    <span>Итог</span> <span class="ml-auto font-size-sm">{{\Gloudemans\Shoppingcart\Facades\Cart::total()}} руб</span>
                                </li>
                                <li class="list-group-item font-size-sm text-center text-gray-500">
                                    Стоимость доставки будет подсчитана позже*
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex jcc">
                        <button type="button" class="btn btn-block btn-dark mb-2 w-100" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" @guest() disabled @endguest>
                            К оплате
                        </button>
                        <a class="btn btn-link btn-sm px-0 text-body w-100" href="{{route('Catalog')}}">
                            <i class="fe fe-arrow-left mr-2"></i> Продолжить покупки
                        </a>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Карта</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <form id="formCreditCard" class="card-body" method="post"
                                      action="{{route('CartSubmit')}}">@csrf
                                    <div class="modal-body">
                                        <div class="padding">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="name">Ваше имя</label>
                                                                    <input class="form-control" id="name" type="text"
                                                                           placeholder="Name Surname" name="name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="creditcardInput">Номер карты</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="text"
                                                                               placeholder="0000 0000 0000 0000"
                                                                               id="creditcardInput"
                                                                               name="creditcardInput">
                                                                        <div class="form-group input-group-append">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-credit-card"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-sm-4">
                                                                <label for="ccmonth">Месяц</label>
                                                                <input type="text" class="form-control" id="ccmonth"
                                                                       maxlength="2" name="ccmonth">
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label for="ccyear">Год</label>
                                                                <input type="text" class="form-control" id="ccyear"
                                                                       maxlength="4" name="ccyear">
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="cvv">CVV/CVC</label>
                                                                    <input class="form-control" id="cvv" type="text"
                                                                           placeholder="123" maxlength="3" name="cvv">
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="sum" value="{{\Gloudemans\Shoppingcart\Facades\Cart::total()}}">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена
                                        </button>
                                        <button type="submit" class="btn btn-primary">Оплатить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $.validator.addMethod("checkYear", function (value, element) {
            let year = $(element).val();
            return (year >= (new Date()).getFullYear());
        }, "Неверный год");
        $.validator.addMethod("checkMonth", function (value, element) {
            let month = $(element).val();
            return (month <= 12);
        }, "Неверный месяц");
        $('#creditcardInput').mask('9999 9999 9999 9999');
        $('#ccyear').mask('2099');
        $('#formCreditCard').validate({
            rules: {
                name: {
                    required: true,
                },
                creditcardInput: {
                    required: true,
                    minlength: 16,
                },
                ccmonth: {
                    required: true,
                    digits: true,
                    minlength: 2,
                    checkMonth: true,
                },
                ccyear: {
                    required: true,
                    digits: true,
                    minlength: 4,
                    checkYear: true,
                },
                cvv: {
                    required: true,
                    digits: true,
                    minlength: 3,
                }
            },
            messages: {
                name: {
                    required: 'Введите имя с карты',
                },
                creditcardInput: {
                    required: 'Введите логин',
                    minlength: 'Некорректная карта',
                    digits: 'Номер может включать себя только цифры'
                },
                ccmonth: {
                    required: 'Введите месяц',
                    minlength: 'Длина 2 цифры'
                },
                ccyear: {
                    required: 'Введите год',
                    digits: 'Номер может включать себя только цифры',
                    minlength: 'Длина 4 цифры'
                },
                cvv: {
                    required: 'Введите cvv код',
                    digits: 'Номер может включать себя только цифры',
                    minlength: 'Длина 3 цифры'
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
            }, submitHandler: function (form) {
                $(form).ajaxSubmit({
                    success: function (data) {
                        $.alert(data);
                        document.location.reload();
                    },
                    error: function (data) {
                        $.alert({
                            title: 'Ошибка',
                            content: " "+ JSON.stringify(data.message) + " ",
                            backgroundDismiss: true,
                        });
                    }
                });
            }
        });
    </script>
@endsection
