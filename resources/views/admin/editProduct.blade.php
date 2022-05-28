@extends('admin.layout')
@section('title', 'Редактирование товара')
@section('content')
    <section class="container">
        <form method="post" enctype="multipart/form-data" class="form">
            @csrf
            <div class="text-h">Добавление</div>
            <div class="form-group">
                <label for="exampleInputEmail">Название</label>
                <input type="text" class="form-control form_input" id="name" aria-describedby="emailHelp"
                       value="{{$_product->name}}"
                       required
                       name="name">
            </div>
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="form-group">
                <label for="exampleInputLogin">Описание</label>
                <input type="text" class="form-control form_input" id="description" aria-describedby="loginHelp"
                       value="{{$_product->description}}"
                       placeholder="Описание" required name="description"
                       maxlength="2000"/>
            </div>
            @error('description')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="form-group">
                <label for="exampleInputPassword">Фотография</label>
                <input type="file" class="form-control-file form_input" id="photo" placeholder="Фотография"
                       name="photo">
            </div>
            @error('photo')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <label>Категория
                <select name="category_id" class="form-select form_input" id="category_id">
                    @foreach($categories as $tag)
                        <option @if($_product->CategoryProduct()->name == $tag->name) selected
                                @endif value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </label>
            <label>Вес
                <input type="number" min="0" name="weight" class="form_input" placeholder="100"
                       value="{{$_product->weight}}">
            </label>
            @error('weight')<p class="text-danger">{{$message}}</p>@enderror
            <label>Цена
                <input type="number" min="0" name="price" class="form_input" placeholder="1500"
                       value="{{$_product->price}}">
            </label>
            @error('price')<p class="text-danger">{{$message}}</p>@enderror
            <label>Удалить
                <input type="checkbox" name="delete">
            </label>
            <div class="mt-5"></div>
            <button type="submit" class="btn">Изменить</button>
        </form>
    </section>
@endsection

