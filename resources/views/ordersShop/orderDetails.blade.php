@extends('welcome')
@section('title', 'Оформление заказа')
@section('content')

    <h1>Оформление заказа</h1>

    <div class="shopping-cart">
        <div class="column-labels">
            <label class="product-image">Image</label>
            <label class="product-details">Product</label>
            <label class="product-price">Цена</label>
            <label class="product-quantity">Кол-во</label>
            <label class="product-removal">Удалить</label>
            <label class="product-line-price">Сумма</label>
        </div>
        <?php
        $priceAll = 0;
        $sum = 0;
        $shipping = 0;
        $tax = 0;
        $count = 0;
        $total = 0;
        $total_sum = 0;
        ?>
        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $product )
            <div class="product" id="product">
                <div class="product-image">
                    <img src='/storage/app/public/{{$product->options->image}}'
                         style="max-width: 100px; max-height: 100px">
                </div>
                <div class="product-details">
                    <div class="product-title">{{$product->name}}</div>
                    <p class="product-description">{{$product->options->description}}</p>
                </div>
                <div class="product-price">{{$product->price}}</div>
                <?php $priceAll = 0 ?>
                <input type="hidden" value="{{$priceAll += $product->price}}">
                <div class="product-quantity">
                    <span>{{$product->qty}}</span>
                    <?php $count = 0 ?>
                    <input type="hidden" value="{{$count += $product->qty}}">
                </div>
                <div class="product-removal hide">
                    <form method="post">@csrf
                        <button type="submit" class="remove-product" id="removeButton">Удалить
                        </button>
                    </form>
                </div>
                <?php $total = 0 ?>
                <div class="product-line-price">{{$total += $count * $priceAll}}</div>
            </div>
            <?php
            $total_sum += $total;
            ?>
        @endforeach

        <div class="totals">
            <div class="totals-item">
                <label>Итог</label>
                <div class="totals-value" id="cart-subtotal">{{$total_sum}} руб.</div>
            </div>
            <div class="totals-item">
                <label>НДС (20%)</label>
                <div class="totals-value" id="cart-tax">{{$tax = $total_sum * 0.2}} руб.</div>
            </div>
            <div class="totals-item">
                <label>Сервисные сборы</label>
                <div class="totals-value"
                     id="cart-shipping">@if($total_sum == 0) {{$shipping = 0}} @else {{ $shipping += $total_sum * 0.001 + 50}}  @endif руб.</div>
            </div>
            <div class="totals-item totals-item-total">
                <label>Сумма</label>
                <?php
                $sum = $total_sum + $tax + $shipping;
                ?>
                <div class="totals-value" id="cart-total">{{$sum}} руб.</div>
            </div>
        </div>
        <form method="post">@csrf
            <input type="hidden" name="tax" value="{{$tax}}">
            <input type="hidden" name="servicesum" value="{{$shipping}}">
            <input type="hidden" name="sum" value="{{$total_sum}}">
            <button type="submit" class="checkout">Заказать</button>
        </form>
    </div>
@endsection
