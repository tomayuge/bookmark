@extends('layouts.base')
@section('title','Bookmark')
@section('main')
<h1>書籍の新規登録</h1>
    <form action="/db/confirm" method="post">
        @csrf
        ISBN<input type="text" name="isbnSearch" required>
        <input type="submit" value="検索">
    </form>
    <hr>
    @isset($record)
    <p>検索結果</p>
    <table class="table">
        <tr>
            <th>ISBN</th>
            <th>書籍名</th>
            <th>著者名</th>
            <th>出版社名</th>
            <th>価格</th>
            <th>画像</th>
        </tr>
        @foreach($json_decode['items'] as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->authors }}</td>
            <td>{{ $item->publisher }}</td>
            <td>{{ $item->retailPrice }}</td>
            <td>{{ $item->imageLinks }}</td>
        </tr>
        @endforeach
    </table> -->
    <form action="/db/store" method="post">
    @csrf
        <input type="submit" value="実行">
    </form>
    @endisset
    <br>
    <a href="/">Topページに戻る</a>
@endsection