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
    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="text-secondary">Редактирование</div>
        <div class="form-group">
            <label for="exampleInputEmail">Название</label>
            <input type="text" class="form-control form_input" id="name" aria-describedby="emailHelp" placeholder="Напиши" required
                   name="name"
                   value="{{$order->name}}">
        </div>
        @error('name')
        <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="form-group">
            <label for="exampleInputLogin">Описание</label>
            <textarea type="text" class="form-control form_input" id="description" aria-describedby="loginHelp"
                      placeholder="Описание" required name="description" style="max-height: 400px; min-height: 75px"
                      maxlength="2000">{{$order->description}}</textarea>
        </div>
        @error('description')
        <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="form-group">
            <label for="exampleInputPassword">Фотография</label>
            <input type="file" class="form-control-file custom-file" id="photo" placeholder="Фотография" required name="photo">
        </div>
        @error('photo')
        <p class="text-danger">{{$message}}</p>
        @enderror
        <select name="category_id" class="custom-select form-group" id="category_id">
            @foreach($categories as $tag)
                <option value="{{ $tag->id }}" @if($tag->name == $order->category()) selected @endif>
                    {{ $tag->name }}
                </option>
            @endforeach
        </select>
        @if(Auth::user()->isAdmin == true)
            <select name="category_id" class="custom-select" id="category_id">
                @foreach($status as $tag)
                    <option value="{{ $tag->id }}" @if($tag->name == $order->status()) selected @endif>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        @endif
        <div class="mt-5"></div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>
</body>
</html>
@endsection
