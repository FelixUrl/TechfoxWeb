@extends('admin.layout')
@section('title', 'Добавление товара')
@section('content')
    <body>
    <section class="container">
        <form method="post" enctype="multipart/form-data" class="form">
            @csrf
            <div class="text-h">Добавление</div>
            <div class="form-group">
                <label for="exampleInputEmail">Название</label>
                <input type="text" class="form-control form_input" id="name" aria-describedby="emailHelp"
                       placeholder="Напиши"
                       required
                       name="name">
            </div>
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="form-group">
                <label for="exampleInputLogin">Описание</label>
                <input type="text" class="form-control form_input" id="description" aria-describedby="loginHelp"
                       placeholder="Описание" required name="description"
                       maxlength="2000"/>
            </div>
            @error('description')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="form-group">
                <label for="exampleInputPassword">Фотография</label>
                <input type="file" class="form-control-file form_input" id="photo" placeholder="Фотография" required
                       name="photo">
            </div>
            @error('photo')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <label>Категория
                <select name="category_id" class="form-control form-select form_input" id="category_id">
                    @foreach($categories as $tag)
                        <option value="{{ $tag->id }}">
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </label>
            <label>Марка
                <select name="mark_id" class="form-control form-select form_input" id="mark_id">
                    @foreach($marks as $tag)
                        <option value="{{ $tag->id }}">
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </label>
            <label>Тип техники
                <select name="type_technic_id" class="form-control form-select form_input" id="type_technic_id">
                    @foreach($type_technic as $tag)
                        <option value="{{ $tag->id }}">
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </label>
            <label>Вес
                <input type="number" min="0" max="250" name="weight" class="form-control form_input" placeholder="100">
            </label>
            @error('weight')<p class="text-danger">{{$message}}</p>@enderror
            <label>Цена
                <input type="number" min="0" max="999999" name="price" class="form-control form_input" placeholder="1500">
            </label>
            @error('price')<p class="text-danger">{{$message}}</p>@enderror
            <div class="mt-5"></div>
            <button type="submit" class="btn">Submit</button>
        </form>
    </section>
    </body>
    </html>
@endsection

