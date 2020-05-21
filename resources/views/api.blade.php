@extends('layouts.app')
@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <title>Laravel</title>

<body>

<div class="container">
    <h1>Регистрация/авторизация API</h1>
<h3>Регистрация</h3>
<form action="javascript:void(null);" id="reg_form"  onsubmit="registration()">
    <input name="name" placeholder="name">
    <input name="email" placeholder="email">
    <input name="password" placeholder="password">
    <input name="c_password" placeholder="c_password">
    <input type="submit" class="btn btn-danger">
</form>

<br>
<h3>Авторизация</h3>
<form action="javascript:void(null);" id="login_form"  onsubmit="login()">
    <input name="email" placeholder="email">
    <input name="password" placeholder="password">
    <input type="submit" class="btn btn-danger">
</form>

{{--<br>--}}
{{--<h3>details</h3>--}}
{{--<form action="javascript:void(null);" id="logout_form" method="post" onsubmit="details()">--}}
    {{--<input type="submit" class="btn btn-danger">--}}
{{--</form>--}}

<br>
<h3>Выход</h3>
<form action="javascript:void(null);" id="logout_form"  onsubmit="logout()">
    <input type="submit" class="btn btn-danger">
</form>
</div>
<br>
<div class="container">
    <h1>Профиль API</h1>
    <h3>Просмотр профиля</h3>
    <form action="javascript:void(null);" id="profile_form"  onsubmit="profile()">
        <input name="profile_id" id="profile_id" placeholder="id пользователя">
        <input type="submit" class="btn btn-danger">
    </form>

    {{--<br>--}}
    {{--<h3>Обновление профиля</h3>--}}
    {{--<form action="javascript:void(null);" id="update_profile_form" name="update_profile_form" enctype="multipart/form-data" onsubmit="update_profile()">--}}
        {{--<input name="profile_id" id="profile_id_upd" placeholder="id пользователя">--}}
        {{--<input name="fio" id="fio" placeholder="fio пользователя">--}}
        {{--<input type="date" name="birthdate" id="birthdate" placeholder="дата рождения пользователя">--}}
        {{--<input class='filestyle' type="file" name="image"  data-placeholder="Изображение не выбрано" data-text='Выберите изображение' data-btnClass='btn-primary'/>--}}
        {{--<input type="submit" class="btn btn-danger">--}}
    {{--</form>--}}
</div>
<br>
<div class="container">
    <h1>Новости API</h1>
    <h3>Просмотр новостей</h3>
    <form action="javascript:void(null);" id="news_form" onsubmit="news()">
        <input type="submit" class="btn btn-danger">
    </form>

    <br>
    <h3>Добавление новости</h3>
    <form action="javascript:void(null);" id="add_news_form"  onsubmit="add_news()">
        <input name="title" placeholder="Заголовок">
        <input name="text" placeholder="Текст">
        <input type="submit" class="btn btn-danger">
    </form>

    <br>
    <h3>Обновление новости</h3>
    <form action="javascript:void(null);" id="update_news_form"  onsubmit="update_news()">
        <input  id="upd_tiding_id" placeholder="id новости">
        <input name="title" placeholder="Заголовок">
        <input name="text" placeholder="Текст">
        <input type="submit" class="btn btn-danger">
    </form>

    <br>
    <h3>Удаление новости</h3>
    <form action="javascript:void(null);" id="delete_news_form"  onsubmit="delete_news()">
        <input  id="tiding_id" placeholder="id новости">
        <input type="submit" class="btn btn-danger">
    </form>
</div>


</body>
<script>
    function registration() {
        var data=$('#reg_form').serialize();
        $.ajax({
            url: 'http://127.0.0.1:8000/api/register',
            data: data,
            type: "POST",
            success:function(data) {
                document.body.textContent = JSON.stringify(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Ошибка: ' + textStatus + ' | ' + errorThrown);
            }
        });
    }
    function login() {
        var data=$('#login_form').serialize();
        $.ajax({
            url: 'http://127.0.0.1:8000/api/login',
            data: data,
            type: "POST",
            success:function(data) {
                document.body.textContent = JSON.stringify(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Ошибка: ' + textStatus + ' | ' + errorThrown);
            }
        });
    }
    function details() {
        $.ajax({
            url: 'http://127.0.0.1:8000/api/details',
            type: "POST", //request type
            headers: {
                'Authorization':'Bearer {{$_COOKIE['passport'] ?? ''}}',
                'Accept':'application/json'
            },
            success:function(data) {
                document.body.textContent = JSON.stringify(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Ошибка: ' + textStatus + ' | ' + errorThrown);
            }
        });
    }
    function logout() {
        $.ajax({
            url: 'http://127.0.0.1:8000/api/logout',
            type: "POST", //request type
            headers: {
                'Authorization':'Bearer {{$_COOKIE['passport'] ?? ''}}',
                'Accept':'application/json'
            },
            success:function(data) {
                document.body.textContent = JSON.stringify(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Ошибка: ' + textStatus + ' | ' + errorThrown);
            }
        });
    }
    function profile() {
        var id=document.getElementById('profile_id').value;
        $.ajax({
            url: 'http://127.0.0.1:8000/api/profile/'+id,
            type: "GET", //request type
            headers: {
                'Authorization':'Bearer {{$_COOKIE['passport'] ?? ''}}',
                'Accept':'application/json'
            },
            success:function(data) {
                document.body.textContent = JSON.stringify(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Ошибка: ' + textStatus + ' | ' + errorThrown);
            }
        });
    }
    {{--function update_profile() {--}}
        {{--var id=document.getElementById('profile_id_upd').value;--}}
        {{--var form_data = new FormData($('#update_profile_form')[0]);--}}
        {{--$.ajax({--}}
            {{--url: 'http://127.0.0.1:8000/api/profile/'+id,--}}
            {{--type: "post", //request type--}}
            {{--data: form_data,--}}
            {{--processData: false,--}}
            {{--contentType: false,--}}
            {{--headers: {--}}
                {{--'Authorization':'Bearer {{$_COOKIE['passport'] ?? ''}}',--}}
                {{--'Accept':'application/json'--}}
            {{--},--}}
            {{--success:function(data) {--}}
                {{--document.body.textContent = JSON.stringify(data);--}}
            {{--},--}}
            {{--error: function(jqXHR, textStatus, errorThrown) {--}}
                {{--alert('Ошибка: ' + textStatus + ' | ' + errorThrown);--}}
            {{--}--}}
        {{--});--}}
    {{--}--}}
    function news() {
        $.ajax({
            url: 'http://127.0.0.1:8000/api/tiding',
            type: "GET", //request type
            headers: {
                'Authorization':'Bearer {{$_COOKIE['passport'] ?? ''}}',
                'Accept':'application/json'
            },
            success:function(data) {
                document.body.textContent = JSON.stringify(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Ошибка: ' + textStatus + ' | ' + errorThrown);
            }
        });
    }
    function add_news() {
        var form_data=$('#add_news_form').serialize();
        $.ajax({
            url: 'http://127.0.0.1:8000/api/tiding',
            type: "post", //request type
            data: form_data,
            headers: {
                'Authorization':'Bearer {{$_COOKIE['passport'] ?? ''}}',
                'Accept':'application/json'
            },
            success:function(data) {
                document.body.textContent = JSON.stringify(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Ошибка: ' + textStatus + ' | ' + errorThrown);
            }
        });
    }
    function update_news() {
        var form_data=$('#update_news_form').serialize();
        var id=document.getElementById('upd_tiding_id').value;
        $.ajax({
            url: 'http://127.0.0.1:8000/api/tiding/'+id,
            type: "PUT", //request type
            data: form_data,
            headers: {
                'Authorization':'Bearer {{$_COOKIE['passport'] ?? ''}}',
                'Accept':'application/json'
            },
            success:function(data) {
                document.body.textContent = JSON.stringify(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Ошибка: ' + textStatus + ' | ' + errorThrown);
            }
        });
    }
    function delete_news() {
        var id=document.getElementById('tiding_id').value;
        $.ajax({
            url: 'http://127.0.0.1:8000/api/tiding/'+id,
            type: "DELETE", //request type
            headers: {
                'Authorization':'Bearer {{$_COOKIE['passport'] ?? ''}}',
                'Accept':'application/json'
            },
            success:function(data) {
                document.body.textContent = JSON.stringify(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Ошибка: ' + textStatus + ' | ' + errorThrown);
            }
        });
    }
</script>
</html>
@endsection

