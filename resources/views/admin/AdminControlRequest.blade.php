@extends('admin.layout')
@section('title', 'Просмотр заявок')
@section('content')
    <div class="">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div class="d-block mb-4 mb-md-0">
                <h2 class="h4">Все заказы</h2>
                <form id="formFilter" name="formFilter" method="post">@csrf
                    <select name="filterStatus" onchange="ChangeFilterForm(this.form)" class="custom-select">
                        <option value="all" selected>Все</option>
                        <option value="wait">В расмотрении</option>
                        <option value="finish">Расмотрена</option>
                        <option value="new">Новая</option>
                    </select>
                </form>
            </div>
        </div>
        <section id="adminRequestsRender">
            <div>
                @include('admin.adminRequestsRender')
            </div>

        </section>

        <script>
            function ChangeFilterForm(form) {
                let status = form.elements.filterStatus.value;
                $.ajax({
                    url: '{{route('filterAdminRequestStatus')}}',
                    type: "POST",
                    data: {
                        status: status,
                    },
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $('#adminRequestsRender').html(data);
                    },
                    error: function (data) {
                        console.log(JSON.stringify(data.responseText));
                    }
                });
            }
        </script>
    </div>
@endsection
