<table class="table table-hover">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Временная метка</th>
        <th scope="col">Название</th>
        <th scope="col">Описание</th>
        <th scope="col">Категория</th>
        <th scope="col">Статус</th>
        <th scope="col">Фото</th>
        <th scope="col">Фото новое</th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <th scope="row">{{$order->id}}</th>
            <td>{{$order->created_at}}</td>
            <td>{{$order->name}}</td>
            <td>{{$order->description}}</td>
            <td>{{$order->category()->name}}</td>
            <td>{{$order->status()->name}}</td>
            <td><img style="max-width: 200px; max-height: 200px"
                     src="{{asset('storage/app/public/'.$order->photo)}}" alt="фотография"></td>
            <td><img style="max-width: 200px; max-height: 200px"
                     src="{{asset('storage/app/public/'.$order->photo_new)}}" alt="фотография новая"></td>
            <td><a href="{{route('update', $order->id)}}" class="btn btn-info">Редактировать</a></td>
            <td><a href="{{route('delete', $order->id)}}" class="btn btn-danger">Удалить</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
