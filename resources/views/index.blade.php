@extends('layouts.base')
@section('title','Bookmark')
@section('main')
    <h1>トップページ</h1>
    <form action="/db/search" method="post">
        @csrf
        <input type="text" name="keyword" required>
        <input type="submit" value="検索">
    </form>
    <ul>
        <li><a href="/db/insert">書籍の新規登録</a></li>
        <li><a href="/db/list">全件表示</a></li>
    </ul>
@endsection