@extends('admin.layout')
@section('content')
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<section class="container">
    <form method="post" class="form" enctype="multipart/form-data">
        @csrf
        <div class="text-h">Добавление</div>
        <label>
            Марка
            <select name="mark_id" class="form-select form_input" id="mark_id">
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
            <select name="type_technic_id" class="form-select form_input" id="type_technic_id">
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
            <input type="text" class="form-control form_input" id="name" aria-describedby="emailHelp" required
                   name="name">
        </div>
        @error('name')
        <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="form-group">
            <label for="exampleInputEmail">Номер телефона</label>
            <input type="text" class="form-control form_input" id="phone" aria-describedby="emailHelp" required
                   name="phone" maxlength="12">
        </div>
        <div class="form-group">
            <label for="exampleInputLogin">Описание</label>
            <input type="text" class="form-control form_input" id="description" aria-describedby="loginHelp"
                       required name="description" maxlength="2000"/>
        </div>
        @error('description')
        <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="form-group">
            <label for="exampleInputPassword">Фотография</label>
            <input type="file" class="form-control-file form_input" id="photo" placeholder="Фотография" name="photo">
        </div>
        @error('photo')
        <p class="text-danger">{{$message}}</p>
        @enderror
        <label>
            Категория
            <select name="category_id" class="form-select form_input" id="category_id">
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
        <button type="submit" class="btn">Отправить</button>
    </form>
</section>
</body>
</html>
@endsection
