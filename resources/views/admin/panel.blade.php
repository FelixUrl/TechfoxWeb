@extends('admin.layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="btn-toolbar">
            <button class="btn btn-primary btn-sm mr-2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><span class="fas fa-plus mr-2"></span>Добавить
            </button>
            <div class="dropdown-menu dashboard-dropdown dropdown-menu-left mt-2"><a
                    class="dropdown-item font-weight-bold" href="#"><span class="fas fa-tasks mr-2"></span>Добавить</a>
                <a class="dropdown-item font-weight-bold" href="#"><span
                        class="fas fa-cloud-upload-alt mr-2"></span>Upload Files</a> <a
                    class="dropdown-item font-weight-bold" href="#"><span class="fas fa-user-shield mr-2"></span>Preview
                    Security</a>
                <div role="separator" class="dropdown-divider"></div>
                <a class="dropdown-item font-weight-bold" href="#"><span
                        class="fas fa-rocket text-danger mr-2"></span>Upgrade to Pro</a></div>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-light shadow-sm">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon icon-shape icon-md icon-shape-primary rounded mr-4 mr-sm-0"><span
                                    class="fas fa-chart-line"></span></div>
                            <div class="d-sm-none"><h2 class="h5">Уникальных пользователей</h2>
                                <h3 class="mb-1">{{$occupations->count() ?? 'Нет данных'}}</h3></div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block"><h2 class="h5">Уникальных пользователей</h2>
                                <h3 class="mb-1">{{$occupations->count() ?? 'Нет данных'}}</h3></div>
                            <small>За все время </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-light shadow-sm">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon icon-shape icon-md icon-shape-primary rounded mr-4 mr-sm-0"><span
                                    class="fas fa-chart-line"></span></div>
                            <div class="d-sm-none"><h2 class="h5">Заказов</h2>
                                <h3 class="mb-1">{{$carts->count() ?? 'Нет данных'}}</h3></div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block"><h2 class="h5">Заказов</h2>
                                <h3 class="mb-1">{{$carts->count() ?? 'Нет данных'}}</h3></div>
                            <small>За все время </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-light shadow-sm">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon icon-shape icon-md icon-shape-tertiary rounded mr-4"><span
                                    class="fas fa-users"></span></div>
                            <div class="d-sm-none"><h2 class="h5">Пользователей</h2>
                                <h3 class="mb-1">{{$users->count() ?? 'Нет данных'}}</h3></div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block"><h2 class="h5">Пользователей</h2>
                                <h3 class="mb-1">{{$users->count() ?? 'Нет данных'}}</h3></div>
                            <small>За все время </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-6 mb-4">
            <div class="card border-light shadow-sm">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon icon-shape icon-md icon-shape-tertiary rounded mr-4"><span
                                    class="fas fa-users"></span></div>
                            <div class="d-sm-none"><h2 class="h5">Проданных услуг</h2>
                                <h3 class="mb-1">{{$orders->count() ?? 'Нет данных'}}</h3></div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block"><h2 class="h5">Проданных услуг</h2>
                                <h3 class="mb-1">{{$orders->count() ?? 'Нет данных'}}</h3></div>
                            <small>За все время </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-6 mb-4">
            <div class="card border-light shadow-sm">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon icon-shape icon-md icon-shape-tertiary rounded mr-4"><span
                                    class="fas fa-users"></span></div>
                            <div class="d-sm-none"><h2 class="h5">Товаров и запчастей</h2>
                                <h3 class="mb-1">{{$products->count() ?? 'Нет данных'}}</h3></div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block"><h2 class="h5">Товаров и запчастей</h2>
                                <h3 class="mb-1">{{$products->count() ?? 'Нет данных'}}</h3></div>
                            <small>За все время </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row min-vh-36">

    </div>
@endsection
