@extends('layouts.base')
@section('title','Bookmark')
@section('main')

<div style="padding-right: 15px;">
    <div style="text-align:right">
        <!-- <a href="/db/insert" class="btn btn-info  rounded-circle " style="width:4rem;height:4rem;"" >新規登録</a> -->

        <a href="/db/index" class="btn btn-info  rounded-circle " style="width:4rem;height:4rem;">Top</a>
        <!-- <br> -->
        <!-- <br> -->
        <a href="/db/list" class="btn btn-info  rounded-circle" style="width:4rem;height:4rem;">全件表示</a>
        </ul>
    </div>
</div>

<div style="text-align:center;" text-align:center>

    <h2>書籍の新規登録</h2>
    <p>13桁のISBNコードを入力してください。</p>
    <!-- <form action="/db/confirm" method="post"> -->
    <br>
    <form action="/db/checkIsbn" method="post" class="needs-validation col-3 mx-auto">


        @csrf
        <div style=margin-left:-250px text-align:center>
            ISBN
        </div>
        <input class="col-8 mb-10" type="text" name="isbnSearch" placeholder="13桁のISBNを入力" required>
</div>
<br><br>
<center><input type="submit" value="検索" class="btn btn-info rounded-0 d-grid"></center>

</div>
</form>
@isset($ms)
<p>{{ $msg }}</p>
@endif
<br>
<br>

<!-- <div style="padding-right: 15px;">
    <div style="text-align:right">
        <a href="/db/index">Topページに戻る</a>
    </div>
</div> -->
</form>

<!-- <div>
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
        -->

</form>

@endsection