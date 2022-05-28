@extends('users/aside')
@section('content_user')
    <section class="container">
        <h1>Мои заказы</h1>

        <div class="shopping-cart">
            <div class="column-labels">
                <label class="product-image">Image</label>
                <label class="product-details">Product</label>
                <label class="product-price">Цена</label>
                <label class="product-quantity">Кол-во</label>
                <label class="product-removal">Удалить</label>
                <label class="product-line-price">Сумма</label>
            </div>
            @foreach($cart as $key => $item)
                <h4>Номер заказа: {{$item->id}}</h4>
                <h4>Дата заказа: {{$item->created_at}}</h4>
                @foreach($item->products as $key => $product)
                    <div class="product" id="product">
                        <div class="product-image">
                            <img src='/storage/app/public/{{$product['photo']}}'
                                 style="max-width: 100px; max-height: 100px">
                        </div>
                        <div class="product-details">
                            <div class="product-title">{{$product['name']}}</div>
                            <p class="product-description">{{$product['description']}}</p>
                        </div>
                        <div class="product-price">{{$product['price']}}</div>
                        <?php $priceAll = 0 ?>
                        <input type="hidden" value="{{$priceAll += $product['price']}}">
                        <div class="product-quantity">
                            <input type="number" disabled value="{{$product['count']}}" min="1">
                            <?php $count = 0 ?>
                            <input type="hidden" value="{{$count += $product['count']}}">
                        </div>
                        <?php $total = 0 ?>
                        <div
                            class="product-line-price">{{$total += $count * $priceAll + ($count * $priceAll) * 0.2 + ($count * $priceAll)*0.02}}</div>
                    </div>
                @endforeach
                <div class="totals">
                    <div class="totals-item">
                        <div class="totals-value">
                            Способ оплаты: {{$item->Payment()[0]->name}}
                        </div>
                    </div>
                    <div class="totals-item">
                        <div class="totals-value">
                            Статус: {{$item->StatusProduct()[0]->name}}
                        </div>
                    </div>
                    <div class="totals-item">
                        <div class="totals-value rub">
                            Сумма: {{$item->price}}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
@endsection
