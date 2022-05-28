<script>
    function ChangeStatus(form) {
        let status = form.elements.status.value;
        let id = form.elements.id.value;
        $.ajax({
            url: '{{route('ChangeStatus')}}',
            type: "POST",
            data: {
                status: status,
                id: id,
            },
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                picoModal({
                    content: "Статус изменён",
                    closeButton: false,
                }).show();
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
</script>
<div class="card-footer px-3 d-flex align-items-center justify-content-between">
<div class="card card-body border-light shadow-sm table-wrapper table-responsive pt-0">
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="border-0">#</th>
            <th class="border-0">Название</th>
            <th class="border-0">Описание</th>
            <th class="border-0">Цена</th>
            <th class="border-0">Кол-во</th>
            <th class="border-0">Сумма</th>
            <th class="border-0">Способ оплаты</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        @foreach($cart as $key => $item)
            <tr>
                <td><a href="../invoice.html" class="font-weight-bold">№{{$item->id}}</a></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            @foreach($item->products as $key => $product)
                <tr>
                    <td><span class="font-weight-normal">{{$product['id']}}</span></td>
                    <td><span class="font-weight-normal">{{$product['name']}}</span></td>
                    <td><span class="font-weight-normal">{{$product['description']}}</span></td>
                    <td><span class="font-weight-normal">{{$product['price']}}</span></td>
                    <?php $priceAll = 0 ?>
                    <input type="hidden" value="{{$priceAll += $product['price']}}">
                    <td><span class="font-weight-bold">{{$product['count']}}</span></td>
                    <?php $count = 0 ?>
                    <input type="hidden" value="{{$count += $product['count']}}">
                    <?php $total = 0 ?>
                    <td><span
                            class="font-weight-bold text-warning">{{$total += $count * $priceAll + ($count * $priceAll) * 0.2 + ($count * $priceAll)*0.02}}</span>
                    </td>
                    <td>
                        {{$item->Payment()[0]->name}}
                    </td>
                </tr>
            @endforeach
            <td>Заказал: </td>
            <td>{{\App\Models\User::where('id', $item->user_id)->first()->login}}</td>
            <td></td>
            <td></td>
            <form id="form" name="form" method="post">@csrf
                <input type="hidden" name="id" value="{{$item->id}}" id="id">
                <td class="totals-value">Статус:
                    <select name="status" onchange="ChangeStatus(this.form)" class="custom-select">
                        @foreach($status as $tag)

                            <option name="status_option"
                                    @if($tag->name == $item->StatusProduct()[0]->name) selected
                                    @endif value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </td>
            </form>
            <td>Сумма заказа:</td>
            <td>{{$item->price}}</td>
            </tr>
            @endforeach

        </tr>
        </tbody>
    </table>
    </div>
</div>
