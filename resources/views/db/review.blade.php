@extends('layouts.base')
@section('title','search')
@section('main')
    <h1>レビュー画面</h1>
    <br>
    <form action="/db/review" method="post">
    @csrf
    <p>本のレビューを書いてください
        <br><textarea rows="5" id="review" name="review" required></textarea>
    </p>
    <input type="submit" value="登録"> 
    <br><a href="/">戻る</a>
    </form>
@endsection