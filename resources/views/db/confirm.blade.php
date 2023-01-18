@extends('layouts.base')
@section('title','Bookmark')
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
    <form action="/db/store" method="post">
        @csrf
        <tr>
            <td><input type="text" name="isbn" value="{{ $isbn }}" readonly></td>
            <br><br><td><input type="text" name="book_name" value="{{ $book_name }}" readonly></td>
            <td><input type="text" name="writer" value="{{ $writer }}" readonly></td>
            <td><input type="text" name="publisher" value="{{ $publisher }}" readonly></td>
            <td><input type="text" name="price" value="{{ $price }}" readonly></td>
            <td><input type="hidden" name="img" value="{{ $img }}" readonly>
            <img src="{{ $img }}"></td>
        </tr>

</table>

<br><br><br>
<div style="text-align:center" >
    <p>登録しますか？</p>
    <input type="submit" class="btn btn-info rounded-0  type" value="登録">
</div>

<br><br><br>
<div style="text-align:right">
    <a href="/db/index">Topページに戻る</a>
</div>
</form>

@endsection