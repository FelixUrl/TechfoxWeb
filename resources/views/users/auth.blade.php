@extends('welcome')
@section('auth')
    <div class="modal fade" id="regModal" tabindex="-1" aria-labelledby="regModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="authModalLabel">Авторизация</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post">
                    @csrf
                    <div class="modal-body">
                        <section class="container">
                            <div class="block-center form flex jcc">

                                <div class="form-group">
                                    <label for="exampleInputEmail">Почта</label>
                                    <input type="text" class="form-control form_input" id="email"
                                           aria-describedby="emailHelp"
                                           required name="email">
                                </div>
                                @error('email')
                                <p class="text-danger">{{$message = 'Некорректный email'}}</p>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputPassword">Пароль</label>
                                    <input type="password" class="form-control form_input" id="password" required
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
                            <button type="button" class="btn btn-outline-info w-50" data-bs-dismiss="modal"
                                    data-bs-toggle="modal"
                                    data-bs-target="#regModal">Регистрация
                            </button>
                            <button type="submit" class="btn btn-outline-info w-50">Войти</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
