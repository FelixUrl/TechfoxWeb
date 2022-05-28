@extends('admin.layout')
@section('title', 'Просмотр товаров')
@section('content')
    <div class="">
        <div class="mt-3 mb-3">
            <a href="{{route('ProductView')}}" class="btn">Создать новый товар</a>
        </div>
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="row">#</th>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Категория</th>
                <th scope="col">Фото</th>
                <th scope="col">Вес</th>
                <th scope="col">Цена</th>
                <th scope="col">Дата создания</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->CategoryProduct()->name}}</td>
                    <td><img style="max-width: 150px; max-height: 150px" src="{{asset('storage/app/public/'.$product->photo)}}" alt="фотография"></td>
                    <td>{{$product->weight}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->created_at}}</td>
                    <td><a href="{{route('EditProduct', $product->id)}}" class="btn">Редактировать</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {!! $products->links() !!}
@endsection
