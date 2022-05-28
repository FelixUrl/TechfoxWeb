@extends('welcome')
@section('title','Личный Кабинет')
@section('content')
    <section class="container">
        <div class="pt-5 pb-5">
            <div class="container">
                <!-- User info -->
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <!-- Bg -->
                        <div class="pt-16 rounded-top-md" style="
								background: url('/public/images/background/profile-bg.png') no-repeat;
								background-size: cover;
							"></div>
                        <div
                            class="d-flex align-items-end justify-content-between bg-white px-4 pt-2 pb-4 rounded-none rounded-bottom-md shadow-sm">
                            <div class="d-flex align-items-center">
                                <div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
                                    <img src="../assets/images/avatar/avatar-3.jpg"
                                         class="avatar-xl rounded-circle border border-4 border-white" alt="">
                                </div>
                                <div class="lh-1">
                                    <h2 class="mb-0">
                                        {{$user->name}}
                                        <a href="#" class="text-decoration-none" data-bs-toggle="tooltip"
                                           data-placement="top" title="" data-bs-original-title="Beginner">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
                                                <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                                                <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                                            </svg>
                                        </a>
                                    </h2>
                                    <p class="mb-0 d-block">{{'@' . $user->login}}</p>
                                </div>
                            </div>
                            <div>
                                @if(Auth::user()->isAdmin)
                                    <a href="{{route('Panel')}}"
                                       class="btn btn-outline-primary btn-sm d-none d-md-block">Панель
                                        администратора</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content -->
                <div class="row mt-0 mt-md-4">
                    <div class="col-lg-3 col-md-4 col-12">
                        <!-- Side navbar -->
                        <aside class="pb-5 mt-n5 pt-5">
                            <div class="border-end position-sticky top-0">
                                <div class="text-center">
                                    <button type="button" class="btn btn-secondary w-100 d-md-none mt-n2 mb-3"
                                            data-bs-toggle="collapse" data-bs-target="#account-menu"
                                            aria-expanded="true">
                                        <i class="bx bxs-user-detail fs-xl me-2"></i>
                                        Меню профиля
                                        <i class="bx bx-chevron-down fs-lg ms-1"></i>
                                    </button>
                                    <div id="account-menu" class="list-group list-group-flush d-md-block collapse show"
                                         style="">
                                        <a href="{{route('Cabinet')}}"
                                           class="list-group-item list-group-item-action d-flex align-items-center <?= ((Route::currentRouteName() == "Cabinet") ? 'active' : null) ?>">
                                            <i class="bx bx-cog fs-xl opacity-60 me-2"></i>
                                            Меню профиля
                                        </a>
                                        <a href="{{route('Orders')}}"
                                           class="list-group-item list-group-item-action d-flex align-items-center <?= ((Route::currentRouteName() == "Orders") ? 'active' : null) ?>">
                                            <i class="bx bx-lock-alt fs-xl opacity-60 me-2"></i>
                                            Заказы
                                        </a>
                                        <a href="{{route('MyRequest')}}"
                                           class="list-group-item list-group-item-action d-flex align-items-center <?= ((Route::currentRouteName() == "MyRequest") ? 'active' : null) ?>">
                                            <i class="bx bx-lock-alt fs-xl opacity-60 me-2"></i>
                                            Заявки
                                        </a>
                                        <a href="{{route('logout')}}"
                                           class="list-group-item list-group-item-action d-flex align-items-center">
                                            <i class="bx bx-log-out fs-xl opacity-60 me-2"></i>
                                            Выйти
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        @yield('content_user')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
