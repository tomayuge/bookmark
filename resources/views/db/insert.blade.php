@extends('layouts.base')
@section('title','Bookmark')
@section('main')
<h2>書籍の新規登録</h2><br>
    <form action="/db/confirm" method="post">
        @csrf
        <div>
            <label for="isbn" class="form_label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required><br>
        </div>
        <div>
            <label for="book_name" class="form_label">書籍名</label>
            <input type="text" class="form-control" id="book_name" name="book_name" required><br>
        </div>
        <div>
            <label for="writer" class="form_label">著者名</label>
            <input type="text" class="form-control" id="writer" name="writer" required><br>
        </div>
        <div>
            <label for="publisher" class="form_label">出版社名</label>
            <input type="text" class="form-control" id="publisher" name="publisher" required><br>
        </div>
        <div>
            <label for="price" class="form_label">価格</label>
            <input type="text" class="form-control" id="price" name="price" required><br>
        </div>
        <div>
            <label for="img" class="form_label">画像</label>
            <input type="text" class="form-control" id="img" name="img" required><br>
        </div><br>
        <input class="btn btn-info w-45" type="submit" value="確認">
    </form>
    <br>
    <a href="/">Topページに戻る</a>
@endsection