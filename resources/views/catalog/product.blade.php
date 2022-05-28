@extends('welcome')
@section('title', $product[0]['description'])
@section('content')
    <div class="py-14">
        <div class="container">
            <div class="row">
                @foreach($product as $item)
                    <?php
                    $count = 1;
                    ?>
                    <div class="offset-xl-2 col-xl-8 col-md-12 ">

                        <div class="d-xl-flex ">
                            <!-- text -->
                            <div class="ms-xl-3  w-100 mt-3 mt-xl-0">
                                <div class="d-flex justify-content-between mb-5">
                                    <div>
                                        <h1 class="mb-1 h2 "> {{$item->name}}</h1>
                                        <div>
                                            <span>{{$item->mark_id()->name}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex jcc aic">
                                    <div class="item-detail-img"><img src="/storage/app/public/{{$item->photo}}"
                                                                      alt="{{$item->name}}" style="max-width: 300px"></div>
                                </div>
                                <div>
                                    <!-- year -->
                                    <div class="d-md-flex justify-content-between ">
                                        <div class="mb-2 mb-md-0">
                    <span class="me-2"> <i class="fe fe-briefcase text-muted"></i><span class="ms-1 ">{{$item->type_technic()->name}}</span></span>
                                            <!-- text -->
                                            <span class="me-2">
                      <i class="fe fe-dollar-sign text-muted"></i><span class="ms-1 ">{{$item->CategoryProduct()->name}}</span></span>
                                            <!-- location -->
                                        </div>
                                        <div>
                                            <!-- time -->
                                            <i class="fe fe-clock text-muted"></i> <span>{{date('d.m.Y', strtotime($item->created_at))}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <!-- text -->
                        <!-- list -->
                        <div class="mt-6">
                            <h2 class="mb-3 fs-3">Описание товара</h2>

                            <ul>
                                <li> Описание: {{$item->description}}</li>
                                <li> Категория: {{$item->CategoryProduct()->name}}</li>
                                <li> Вес  {{$item->weight}} гр.</li>
                                <li> Цена {{$item->price}} руб. </li>

                            </ul>
                        </div>
                        <!-- button -->
                        <div class="mt-5 d-grid">
                            <form method="post" class="flex jcc">
                                @csrf
                                <input name="quantity" class="form-check" type="number" min="1"
                                       step="1"
                                       value="{{$count}}">
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <button type="submit" class="btn btn-primary">В корзину</button>
                            </form>
                        </div>


                    </div>
{{--                    <section class="item-detail-container">--}}
{{--                        <article class="item-detail">--}}
{{--                            <div class="item-detail-header">--}}
{{--                                <h1> {{$item->name}}</h1>--}}
{{--                            </div>--}}

{{--                            <div class="item-detail-img"><img src="/storage/app/public/{{$item->photo}}"--}}
{{--                                                              alt="{{$item->name}}"></div>--}}
{{--                            <div class="item-detail-group">--}}
{{--                                <div class="item-detail-category">--}}
{{--                                    <p>{{$item->description}}</p>--}}
{{--                                    <p>Категория: {{$item->CategoryProduct()->name}}</p>--}}
{{--                                    <p></p>--}}
{{--                                </div>--}}
{{--                                <div class="item-detail-price">--}}
{{--                                    <div class="item-detail-price_before">--}}
{{--                                        <p>{{$item->price}}</p>--}}
{{--                                    </div>--}}

{{--                                    <form method="post" class="flex jcc">--}}
{{--                                        @csrf--}}
{{--                                        <input name="quantity" class="numbercard" type="number" min="1"--}}
{{--                                               step="1"--}}
{{--                                               value="{{$count}}">--}}
{{--                                        <input type="hidden" name="id" value="{{$item->id}}">--}}
{{--                                        <button type="submit" class="btn">В корзину</button>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </article>--}}
{{--                    </section>--}}
                @endforeach
            </div>
        </div>
    </div>
@endsection
