@extends('layouts.base')
@section('title','search')
@section('main')
    <h1>ログインページ</h1>
    <br>

    <form action="/db/login" method="post">
    @csrf
    <p>ユーザー名<input type="text" id="user_name" name="user_name" required></p>
    <p>パスワード<input type="text" id="pass" name="pass" required></p>
    <input type="submit" value="送信"> 
    </form>
@endsection