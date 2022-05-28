<h1>Форма обратной связи</h1>

<p><strong>Имя:</strong> {{ $data->name }}</p>
<p><strong>Почта:</strong> {{ $data->email }}</p>
<p><strong>Сообщение:</strong> {{ $data->message }}</p>
<p>Дата отправки: <strong>{{date('d.m.Y H:i:s',time())}}</strong></p>
