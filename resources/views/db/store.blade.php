@extends('layouts.base')
@section('title','Bookmark')
@section('main')
<h2>データを登録しました</h2>
<table class="table">
<tr>
    <th>ISBN</th>
    <th>書籍名</th>
    <th>著者名</th>
    <th>出版社名</th>
    <th>価格</th>
    <th>画像</th>
</tr>
<tr>
    <td>{{ $isbn }}</td>
    <td>{{ $book_name }}</td>
    <td>{{ $writer }}</td>
    <td>{{ $publisher }}</td>
    <td>{{ $price }}</td>
    <td>{{ $img }}</td>
</tr>
</table>
    <br>
    <a href="/db/bookView">書籍のページを見る</a>
    <a href="/db/insert">続けて新規登録する</a>
    <a href="/db/index">Topページに戻る</a>
@endsection