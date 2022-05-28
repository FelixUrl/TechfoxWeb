<script>
    function AddToCart(form) {
        let id = form.elements.id.value;
        let quantity = form.elements.quantity.value;
        let btn = form.elements.btnCart;
        $.ajax({
            url: '{{route('AddToCart')}}',
            type: "POST",
            data: {
                id: id,
                quantity: quantity,
            },
            headers: {
                'X-CSRF-Token': '{{\Illuminate\Support\Facades\Session::token()}}'
            },
            success: function () {
                btn.innerHTML = 'Добавить';
                btn.style.cursor = 'copy';
             },
        });

    }
</script>
@if(!empty($products) && $products->count())
    @foreach($products as $product)
        <?php
        $count = 1;
        $animationDuration = 1000;
        ?>
        <div class="col-xl-4 col-lg-4 col-md-6 col-12" data-aos="zoom-in"
             data-aos-duration="{{$animationDuration+=200}}" data-aos-once="true">
            <!-- Card -->
            <div class="card mb-4 shadow-lg ">
                <a href="{{route('Product', $product->id)}}" class="card-img-top">
                    <img src="{{asset('storage/app/public/'.$product->photo)}}" class="card-img-top rounded-top-md"
                         alt="{{$product->name}}"></a>
                <!-- Card body -->
                <div class="card-body">
                    <a href="#" class="fs-5 fw-semi-bold d-block mb-3 text-danger">{{$product->mark_id()->name}}</a>
                    <h3>
                        <a href="{{route('Product', $product->id)}}" class="text-inherit">
                            {{$product->name}}
                        </a>
                    </h3>
                    <p>
                        {{$product->description}}
                    </p>
                    <!-- Row  -->
                    <form method="post" class="" id="AddCart" name="form">
                        <div class="row align-items-center g-0 mt-4">
                            <div class="col-auto">
                            </div>

                            <div class="col lh-1">
                                <h5 class="mb-1">{{$product->CategoryProduct()->name}}</h5>
                                <p class="fs-6 mb-0">{{$product->price}} руб.</p>

                                <div class="item-count flex jcc"><input name="quantity" class="numbercard" id="quantity"
                                                                        type="hidden"
                                                                        min="1"
                                                                        step="1"
                                                                        value="{{$count}}"></div>
                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}" id="id">
                            </div>
                            <div class="col-auto">
                                <p class="fs-6 mb-0"> <button type="button" name="btnCart" class="btn-sm btn-outline-dark"
                                                              id="buttonAddToCart"
                                                              onclick="AddToCart(this.form)">В корзину
                                    </button></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endif
    <div class="pagination_desktop flex jcc">
        {!! $products->links() !!}
    </div>
<div class="pagination_mobile flex jcc">
    {!! $products->links('vendor.pagination.simple-bootstrap-4') !!}
</div>


