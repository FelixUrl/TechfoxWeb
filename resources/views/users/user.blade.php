@extends('welcome')
@section('title', 'Мой профиль')
@section('content')
    <section class="container">
        <div class="block-center form flex jcc">
            <form method="post">
                @csrf
                <div class="text-h">Мой профиль</div>
                <div class="form-group">
                    <label for="exampleInputEmail">Почта</label>
                    <input type="email" class="form_input" id="email" aria-describedby="emailHelp" placeholder="Enter email" required name="email" value="{{$user[0]['email']}}" disabled>
                </div>
                @error('email')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <label for="exampleInputLogin">Логин</label>
                    <input type="text" class="form-control form_input" id="login" aria-describedby="loginHelp" placeholder="Enter login" value="{{$user[0]['login']}}" required name="login" disabled>
                </div>
                @error('login')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <label for="exampleInputPassword">Смена пароля</label>
                    <input type="password" class="form_input" id="password" placeholder="Password" required name="password">
                </div>
                @error('password')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <label for="exampleInputPassword">Подтвердить пароль</label>
                    <input type="password" class="form-control form_input" id="password_confirmation" placeholder="Password" required name="password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Подтвердить</button>
            </form>
        </div>
    </section>
@endsection
