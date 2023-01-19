@extends('layouts.base')
@section('title','search')
@section('main')
    <h1>レビュー画面</h1>
    @if (session('ok_msg'))
<div style="text-align:center;" p class="text-danger" text-align:center>
    {{ session('ok_msg') }}
</div>
@endif
    <br>
    <form action="/db/review" method="post">
    @csrf
    <p>本のレビューを書いてください
        <input type="hidden" name="book_id" value="{{ $book_id }}">
        <br><textarea rows="5" id="comment" name="comment" required></textarea>
    </p>
    <p>点数を５段階で入力してください
        <br>
        <input type="radio" name="score" value="1" checked>1
        <input type="radio" name="score" value="2">2
        <input type="radio" name="score" value="3">3
        <input type="radio" name="score" value="4">4
        <input type="radio" name="score" value="5">5
    </p>
    <!-- <input type="hidden" name="account_id" value= account_id }}" readonly> -->
    <input type="submit" value="登録"> 
    </form>
    <br><a href="/db/list">戻る</a>
@endsection