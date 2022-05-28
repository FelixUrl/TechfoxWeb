@extends('welcome')
@section('reg')
    <div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="regModalLabel">Регистрация</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post">
                    @csrf
                    <div class="modal-body">
                        <section class="container">
                            <div class="block-center form flex jcc">
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
                            <button type="button" class="btn btn-outline-info w-50" data-bs-dismiss="modal"
                                    data-bs-toggle="modal"
                                    data-bs-target="#authModal">Войти
                            </button>
                            <button type="submit" class="btn btn-outline-info w-50">Зарегистрироваться</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
