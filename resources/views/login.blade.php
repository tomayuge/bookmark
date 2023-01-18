@extends('layouts.base')
@section('title','search')
@section('main')
<h2 class="text-center py-3">ログイン</h2>
</p>
<br>

<!-- <style>
        body{
            margin:0;
            padding:0;
            box-sizing:border-box;
            height:100vh;
            align-items: center;
            justify-content: center;
        }
    </style> -->

<form class="needs-validation col-3 mx-auto" novalidate action="/db/login" method="post">
    @csrf

    <div style="margin-left:40px">ユーザー名<br><input class="col-10 mb-10" type="text" id="user_name" name="user_name" required></div>
    <br>

    <div style="margin-left:40px">パスワード<br><input class="col-10 mb-10" type="password" id="pass" name="pass" required></div>
    <br><center><input class="btn btn-info  w-45  " type="submit" value="送信"></center>
    <br>
</form>
@if (session('err_msg'))
<div style="text-align:center;" p class="text-danger" text-align:center>
    {{ session('err_msg') }}
</div>
@endif
@endsection
