@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="col-6">
                    <h2>Удаление заявки</h2>
                    <p>Имя заявки {{$order->name}}</p>
                    <p>Описание заявки {{$order->description}}</p>
                    <p>Категория заявки {{$order->category()}}</p>
                    <p class="text text-danger">Вы уверены что хотите удалить заявку?</p>
                    <a href="{{route('Cabinet')}}" class="btn btn-secondary">Назад</a>
                    <form method="post">
                        @csrf
                        <button type="submit" class="btn btn-warning">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection()
