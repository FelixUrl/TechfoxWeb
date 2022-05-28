<div class="card card-body border-light shadow-sm table-wrapper table-responsive pt-0">
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="border-0">Имя</th>
            <th class="border-0">Дата регистрации</th>
            <th class="border-0">Verified</th>
            <th class="border-0">Статус</th>
            <th class="border-0">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $_user)
            <tr>
                <td><a href="#" class="d-flex align-items-center"><img
                            src="{{asset("storage/app/public/{$_user->avatar}")}}"
                            class="user-avatar rounded-circle mr-3" alt="Avatar">
                        <div class="d-block"><span class="font-weight-bold">{{$_user->login}}</span>
                            <div class="small text-gray">{{$_user->email}}</div>
                        </div>
                    </a></td>
                <td><span class="font-weight-normal">{{$_user->created_at ?? 'Не задана'}}</span></td>
                <td>
                    <span class="font-weight-normal">
                        @if($_user->isAdmin)
                            <span class="fas fa-check-circle text-success mr-2"></span>
                            Админ
                        @else
                            <span class="fas fa-check-circle text-success mr-2"></span>
                            Пользователь
                        @endif
                    </span>
                </td>
                <td><span class="font-weight-normal text-success">Действующий</span></td>
                <td>
                    <form id="banForm" name="banForm" class="banForm">@csrf
                        <div onclick="banUser(this)" data-id="{{$_user->id}}"
                             class="text-danger ml-2 ban-user pointer" title="" data-toggle="tooltip"
                             data-original-title="Delete"><span class="fas fa-times-circle"></span><span
                                class="pl-1"><?= ($_user->ban) ? 'Разбан' : 'Бан';?></span></div>
                    </form>
                    <script>
                        function banUser(form) {
                            $.confirm({
                                title: 'Вы уверены?',
                                content: '',
                                cancelButton: 'Отмена',
                                confirmButton: 'Подтвердить',
                                backgroundDismiss: true,
                                buttons: {
                                    cancel: {
                                        text: 'Отмена',
                                    },
                                    confirm: {
                                        text: 'Подтвердить',
                                        btnClass: 'btn-blue',
                                        keys: ['enter', 'shift'],
                                        action: function () {
                                            let id = form.dataset.id;
                                            $.ajax({
                                                url: "{{route('banUserByAdmin')}}",
                                                type: 'POST',
                                                data: {'user_id': id},
                                                headers: {"X-CSRF-Token": "{{\Illuminate\Support\Facades\Session::token()}}"},
                                                success: function (data) {
                                                    $.alert({title: '', content: data, backgroundDismiss: true,});
                                                },
                                                error: function (data) {
                                                    $.alert({
                                                        backgroundDismiss: true,
                                                        content: 'Ошибка ' + data,
                                                        title: '',
                                                        type: 'red',
                                                        typeAnimated: true,
                                                    });
                                                }
                                            });
                                        }
                                    }
                                },
                                theme: 'supervan',
                            });
                        }
                    </script>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
