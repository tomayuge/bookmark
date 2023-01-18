@extends('layouts.base')
@section('title','Bookmark')
@section('main')
<br>
<h3>データを登録しました</h3>

<br><div style="text-align:center" >
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
    <td><img src="{{ $img }}"></td>
</tr>
</table>
</div>
    <br>
    <a href="/db/bookView"  class="btn btn-info rounded-0">書籍のページを見る</a>
    <a href="/db/insert"  class="btn btn-info rounded-0">続けて新規登録する</a>
    <a href="/db/index"  class="btn btn-info rounded-0">Topページに戻る</a>
@endsection