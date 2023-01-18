@extends('layouts.base')
@section('title','Bookmark')
@section('main')
<h2>データを登録しました</h2>
<table class="table">
<tr>
    <th>id</th>
    <th>書籍名</th>
    <th>著者名</th>
</tr>
<tr>
    <td>{{ $id }}</td>
    <td>{{ $book_name }}</td>
    <td>{{ $writer }}</td>
</tr>
</table>
    <br>
    <a href="/db/bookView">書籍のページを見る</a>
    <a href="/db/insert">続けて新規登録する</a>
    <a href="/db/index">Topページに戻る</a>
@endsection