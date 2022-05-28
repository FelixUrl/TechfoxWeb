@extends('users/aside')
@section('content_user')
    @if(sizeof($orders)<=0)
        <div class="container">
            <div class="row flex jcc">
                <div class="col-md-6">
                    Заявок ещё нет
                </div>
            </div>
        </div>
    @endif
    @foreach($orders as $order)
        <div class="row">
            <div class="col-6 col-md-4">
                <img style="max-width: 200px; max-height: 200px;"
                     src="{{asset('storage/app/public/'.$order->photo)}}"
                     alt="фотография">
                <div>{{$order->name}}</div>
            </div>
            <div class="col-6 col-md-4">
                <p>Описание: {{$order->description}}</p>
                <p>Категория: {{$order->category()->name}}</p>
                <p>Статус: {{$order->status()->name}}</p>
            </div>
            <div class="col-6 col-md-4">
                <div class="btn-group-sm">
                    @if(Auth::user()->isAdmin == true)

                        <button class="btn btn-dark-primary"><a
                                href="{{route('update', $order->id)}}">Редактировать</a></button>
                    @endif
                    <button class="btn btn-dark-danger"><a href="{{route('delete', $order->id)}}">Удалить</a>
                    </button>
                </div>
                <p class="text-right text-info">{{$order->created_at}}</p>
            </div>
        </div>
    @endforeach
@endsection

