@extends('layouts.base')
@section('title','search')
@section('main')
    <h1>レビュー画面</h1>
    <br>
    <form action="/db/review" method="post">
    @csrf
    <p>本のレビューを書いてください
        <br><textarea rows="5" id="comment" name="comment" required></textarea>
    </p>
    <p>点数を５段階で入力してください
        <br><input type="number" max="5" id="score" name="score" required>
    </p>
    <p>名前
        <br><input type="text" id="account_id" name="account_id" required>
    </p>
    <p>パスワード
        <br><input type="password" id="pass" name="pass" required>
    </p>
    <input type="submit" value="登録"> 
    </form>
    <br><a href="/">戻る</a>
@endsection