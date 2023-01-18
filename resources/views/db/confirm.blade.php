@extends('layouts.base')
@section('title','Bookmark')
@section('main')
<hr>
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

    <form action="/db/store" method="post">
    @csrf
    <p>登録しますか？</p> 
    <input type="submit" value="登録">
    <br>
    <a href="/db/index">Topページに戻る</a>
    </form>
    
@endsection