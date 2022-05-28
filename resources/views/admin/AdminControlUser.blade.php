@extends('admin.layout')
@section('title', 'Просмотр пользователей')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4 ">
        <div class="d-block mb-4 mb-md-0">
            <h2 class="h4">Список пользователей</h2>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0"><a href="#" class="btn btn-sm btn-primary"><span
                    class="fas fa-plus"></span> <span>Новый пользователь</span></a>
        </div>
    </div>
    <div class="table-settings mb-4">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-md-6 col-lg-3 align-items-center d-none d-md-flex">
                <div class="form-group mb-0 mr-3">
                    <form id="formFilter" name="formFilter" method="post">@csrf
                        <select name="filterStatus" onchange="ChangeFilterForm(this.form)"  class="custom-select">
                            <option selected="selected" value="all">Все</option>
                            <option value="ban">Заблокированы</option>
                            <option value="admin">Администраторы</option>
                        </select>
                    </form></div>
                <div><a href="#" class="btn btn-md btn-white border-light">Apply</a></div>
            </div>
            <div class="col col-md-4 col-lg-3 col-xl-2 ml-auto">
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><span
                                class="fas fa-search"></span></span></div>
                    <input class="form-control" id="searchInputdashboard1" placeholder="Search" type="text"
                           aria-label="Dashboard user search"></div>
            </div>
        </div>
    </div>
    <section id="adminUsersRender">
        <div>
            @include('admin.adminUsersRender')
        </div>
    </section>
    <script>
        function ChangeFilterForm(form) {
            let status = form.elements.filterStatus.value;
            $.ajax({
                url: '{{route('filterAdminUserStatus')}}',
                type: "POST",
                data: {
                    status: status,
                },
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    $('#adminUsersRender').html(data);
                },
                error: function (data) {
                    console.log(JSON.stringify(data.responseText));
                }
            });
        }
    </script>
@endsection
