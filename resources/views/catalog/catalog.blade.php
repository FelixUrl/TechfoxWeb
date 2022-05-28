@extends('welcome')
@section('title', 'Каталог')
@section('content')
    <script type="text/javascript">
        function searchInput(e) {
            let searchResult = document.getElementById('search-output');
            let output = document.getElementById('hide-me');

            searchResult.innerHTML = '';
            if (e !== "") {

                $.ajax({
                    url: '{{route('searchCatalog')}}',
                    type: "GET",
                    data: {
                        term: e
                    },
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        let searchResult = document.getElementById('search-output');
                        searchResult.innerHTML = '';
                        output.style.display = 'block';
                        if (data.length === 0) {
                            searchResult.innerHTML += '<a href="" class="search-item">' + 'Ничего не найдено' + '</a>';
                        }
                        var arrayLength = data.length;
                        for (var i = 0; i < arrayLength; i++) {
                            searchResult.innerHTML += '<a href="/catalog/detail/' + data[i]['id'] + '" class="search-item">' + data[i]['name'] + '</a>';
                        }
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            } else {
                $('#search-output').html();
                output.style.display = 'none';
            }
        }


        $(document).ready(function () {

            $(document).on('click', '.pagination a', function (event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
                topFunction();
            });

            function fetch_data(page) {
                var arr = $('input[name="mark[]"]:checked').map(function(){
                    return $(this).val();
                }).get();
                var e = document.getElementById('sort');
                var sort = e.value;
                $.ajax({
                    url: '/catalog/getCatalog?page=' + page,
                    type: "GET",
                    data: {sort: sort, filter: arr},
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (products) {
                        $('#grid').html(products);
                    },
                    error: function (msg) {
                        alert(JSON.stringify(msg.responseText));
                    }
                });
            }

            $('#sort').on('change', function () {
                event.preventDefault();
                var page = '{{request()->get('page')}}';
                fetch_data(page);
                topFunction();
            });

            $('.filterName').on('change', function (){
                event.preventDefault();
                var page = '{{request()->get('page')}}';
                var arr = $('input[name="mark[]"]:checked').map(function(){
                    return $(this).val();
                }).get();
                console.log(arr);
                fetch_data(page);
            })
        });

        function topFunction() {
            $("html").animate({scrollTop: 0}, 210);
        }


    </script>
    <section class="container">
        <section class="grid-control flex jcsb aic mt-10">
            <div class="search-box">
                <input type="search" name="search" class="search-catalog" id="search" onkeyup="searchInput(this.value)">
                <a href="">
                    <i class="fas fa-search"></i>
                </a>
                <div class="search-output" id="hide-me">
                    <div class="output-content">
                        <div id="search-output">

                        </div>
                    </div>
                </div>
            </div>
            <div class="control-pagination">

            </div>
            <div class="selector-filter">
                <div>
                    <select name="sort" id="sort" class="form-select">
                        <option @if(request()->get('sort') == 'null') selected @endif value="" disabled>Сортировать
                        </option>
                        <option @if(request()->get('sort') == 'default') selected @endif value="default">По умолчанию
                        </option>
                        <option @if(request()->get('sort') == 'asc') selected @endif value="asc">Сначала дешевле
                        </option>
                        <option @if(request()->get('sort') == 'desc') selected @endif  value="desc">Сначала дороже
                        </option>
                        <option @if(request()->get('sort') == 'ascA') selected @endif  value="ascA">От А до Я</option>
                        <option @if(request()->get('sort') == 'descA') selected @endif value="descA">От Я до А</option>
                        <option @if(request()->get('sort') == 'new') selected @endif value="new">Новинки</option>
                    </select>
                </div>
            </div>
        </section>

        <section class="row flex jcsb pt-5">

            <div class="col-lg-12 pb-12">
                <div class="container">
                    <div class="row">
                        <section class="grid row mt-5" id="grid">
                            @include('catalog.products')
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
