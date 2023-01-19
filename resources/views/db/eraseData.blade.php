@extends('layouts.base')
@section('title','search')
@section('main')
<hr>
<div style="text-align:center" >
<table class="table">
    <tr>
        <th>ISBN</th>
        <th>書籍名</th>
        <th>著者名</th>
        <th>出版社名</th>
        <th>価格</th>
        <th>画像</th>
    </tr>
    <form action="/db/delete" method="post">
        @csrf
        <tr>
            <td><input type="text" name="isbn" value="{{ $record->isbn }}" readonly></td>
            <br><br><td><input type="text" name="book_name" value="{{ $record->book_name }}" readonly></td>
            <td><input type="text" name="writer" value="{{ $record->writer }}" readonly></td>
            <td><input type="text" name="publisher" value="{{ $record->publisher }}" readonly></td>
            <td><input type="text" name="price" value="{{ $record->price }}" readonly></td>
            <td><input type="hidden" name="img" value="{{ $record->img }}" readonly>
            <img src="{{ $record->img }}"></td>
        </tr>
</table>
<br><br><br>
<div style="text-align:center" >
    <p>このデータを削除しますか？</p>
    <button type="button" onClick="history.back()" class="btn btn-info rounded-0  type">戻る</button>
    <input type="submit" class="btn btn-info rounded-0  type" value="削除">
</div>

<br><br><br>
<div style="text-align:right">
    <a href="/db/index">Topページに戻る</a>
</div>
</form>
@endsection