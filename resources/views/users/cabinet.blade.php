@extends('users/aside')
@section('content_user')
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Профиль</h3>
            <p class="mb-0">
                Здесь вы можете настроить аккаунт.
            </p>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <div class="d-lg-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center mb-4 mb-lg-0">
                    <img src="../assets/images/avatar/avatar-3.jpg" id="img-uploaded"
                         class="avatar-xl rounded-circle" alt="">
                    <div class="ms-3">
                        <h4 class="mb-0">Ваш аватар</h4>
                        <p class="mb-0">
                            PNG или JPG не более 800px в ширину и высоту.
                        </p>
                    </div>
                </div>
                <div>
                    <a href="#" class="btn btn-outline-white btn-sm">Обновить</a>
                    <a href="#" class="btn btn-outline-danger btn-sm">Удалить</a>
                </div>
            </div>
            <hr class="my-5">
            <div>
                <h4 class="mb-0">Личные данные</h4>
                <p class="mb-4">
                    Редактировать личную информацию и адрес.
                </p>
                <!-- Form -->
                <form class="row" id="changeUserInfoForm" action="{{route('changeUserInfo')}}" method="post">@csrf
                    <!-- First name -->
                    <div class="mb-3 col-12 col-md-6 form-group">
                        <label class="form-label" for="name">Имя</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{$user->name}}">
                    </div>
                    <!-- Last name -->
                    <div class="mb-3 col-12 col-md-6 form-group">
                        <label class="form-label" for="login">Логин</label>
                        <input type="text" id="login" name="login" class="form-control" value="{{$user->login}}">
                    </div>
                    <!-- Phone -->
                    <div class="mb-3 col-12 col-md-6 form-group">
                        <label class="form-label" for="phone">Телефон</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{$user->phone}}">
                    </div>
                    <!-- Birthday -->
                    <div class="mb-3 col-12 col-md-6 form-group">
                        <label class="form-label" for="email">E-mail</label>
                        <input class="form-control flatpickr flatpickr-input" type="email"
                               value="{{$user->email}}" id="email" name="email"
                               readonly="readonly">
                    </div>
                    <div class="col-12">
                        <!-- Button -->
                        <div class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#changePasswordModal">
                            Сменить пароль
                        </div>
                        <button  type="submit" class="btn btn-primary float-end">
                            Обновить профиль
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $("#phone").mask("89999999999");
        $('#changeUserInfoForm').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                name: {
                    required: true,
                    minlength: 3
                },
                login: {
                    required: true,
                    minlength: 3,
                },
                phone: {
                    required: true,
                    digits: true,
                }
            },
            messages:{
                email: {
                    required: 'Введите e-mail',
                    email: 'Адрес должен быть типа techfox@techfox.com'
                },
                name: {
                    required: 'Введите имя',
                    minlength: 'Минимальная длина имени 3 символов'
                },
                login: {
                    required: 'Введите логин',
                    minlength: 'Минимальная длина логина 3 символов'
                },
                phone: {
                    required: 'Введите номер телефона',
                    digits: 'Номер может включать себя только цифры'
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
            },
            submitHandler: function(form){
                $(form).ajaxSubmit({
                    success: function (data){
                        alert(data);
                    },
                    error: function (data){
                        alert(data);
                    }
                });
            }
        });
    </script>
    <!-- Modal -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Смена пароля</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="changePasswordForm" action="{{route('changePassword')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="currentPassword">Текущий пароль</label><input type="password"
                                                                                      class="form-control form_input"
                                                                                      name="currentPassword"
                                                                                      id="currentPassword">
                        </div>
                        <div class="form-group">
                            <label for="newpassword">Новый пароль</label><input type="password"
                                                                                class="form-control form_input"
                                                                                name="newpassword" id="newpassword">
                        </div>
                        <div class="form-group">
                            <label for="newpassword_confirmation">Подтверждение пароля</label><input type="password"
                                                                                                  class="form-control form_input"
                                                                                                  name="newpassword_confirmation"
                                                                                                  id="newpassword_confirmation">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Изменить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('#changePasswordForm').validate({
            rules: {
                currentPassword: {
                    required: true,
                    minlength: 6,
                },
                newpassword: {
                    required: true,
                    minlength: 6,
                },
                newpassword_confirmation: {
                    minlength: 6,
                    equalTo: "#newpassword",
                }
            },
            messages: {
                currentPassword: {
                    required: 'Введите пароль',
                    minlength: 'Минимальная длина пароля 6 символов'
                },
                newpassword: {
                    required: 'Введите пароль',
                    minlength: 'Минимальная длина пароля 6 символов'
                },
                newpassword_confirmation: {
                    required: 'Введите пароль',
                    equalTo: 'Ваш пароль должен совпадать',
                    minlength: 'Минимальная длина пароля 6 символов'
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
            },
            submitHandler: function(form){
                $(form).ajaxSubmit({
                    success: function (data){
                        alert(data);
                    }
                });
            }
        });
    </script>
@endsection
