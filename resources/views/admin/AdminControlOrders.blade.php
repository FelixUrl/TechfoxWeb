@extends('admin.layout')
@section('title', 'Контроль покупок')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <h2 class="h4">Все заказы</h2>
            <form id="formFilter" name="formFilter" method="post">@csrf
                    <select name="filterStatus" onchange="ChangeFilterForm(this.form)" class="custom-select">
                        <option value="1">Создана</option>
                        <option value="4">Ожидает получения</option>
                        <option value="5">Закрыта</option>
                    </select>
            </form>
        </div>
    </div>
    <section id="adminOrdersRender">
        <div>
            @include('admin.adminOrdersRender')
        </div>

    </section>

    <script>
        function ChangeFilterForm(form) {
            let status = form.elements.filterStatus.value;
            $.ajax({
                url: '{{route('filterAdminOrderStatus')}}',
                type: "POST",
                data: {
                    status: status,
                },
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    $('#adminOrdersRender').html(data);
                },
                error: function (data) {
                    console.log(JSON.stringify(data.responseText));
                }
            });
        }
    </script>
@endsection
