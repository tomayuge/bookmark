@extends('layouts.base')
@section('title','search')
@section('main')
<a href="/db/index">Topページに戻る</a>
<table>
    <tr><td rowspan="6"><img src="{{ $records -> img }}" height="400"></td></tr>
    <tr><td>{{ $records -> book_name }}</td></tr>
    <tr><td>{{ $records -> reviews -> average('score') }}</td></tr>
    <tr><td>{{ $records -> writer }}</td></tr>
    <tr><td>{{ $records -> publisher }}</td></tr>
    <tr><td>￥{{ $records -> price }}</td></tr>
    <tr>
        <td colspan="2">
            <!-- reviewページに飛ぶボタンを作る -->
            <form action="/db/reviewView" method="post">
                @csrf
                <input type="hidden" name="book_id" value="{{ $records -> id }}">
                <input type="submit" class="btn btn-outline-primary" value="レビューを登録する">
            </form>
        </td>
    </tr>
</table>    
<hr>
<p>Reviews</p>
<table>
    @foreach($reviews as $review)
    <tr>
            <td>{{ $review -> account -> user_name }}</td>
            <td>
                         {{ $review -> score }}</td>
            <td>{{ $review -> comment }}</td>
            <td>
                <form action="/db/review" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $records -> id }}">
                <input type="submit" class="btn btn-outline-success" value="EDIT"></form>

                <form action="/db/eraseReview" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $records -> id }}">
                <input type="submit" class="btn btn-outline-danger" value="ERASE"></form>
            </td>
            <td>
                <!-- モーダルを開くボタン -->
            <div class="container">
                <div class="row my-3">
                    <h1>モーダルを開く</h1>
                </div>
                <div class="row mb-5">
                    <div class="col-2">
                        <button type="button" class="btn btn-primary mb-12" data-toggle="modal" data-target="#editModal" data-backdrop="false">EDIT</button>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-danger mb-12" data-toggle="modal" data-target="#eraseModal" data-backdrop="false">ERASEく</button>
                    </div>
                </div>
            </div>
            <!-- ボタンクリック後に表示される画面の内容 編集用モダール -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                 <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- ここからformタグ -->
                        <form action="/db/editReview" method="post">
                        @csrf
                            <h4>class="modal-title" id="myModalLabel">EDIT REVIEW</h4></h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{ $review -> id }}">
                            <input type="textarea" name="comment" value="{{ $review -> comment }}">
                            <p>Please enter a score of 1 to 5.
                                <br><input type="number" max="5" id="score" name="score" required>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                            <input type="submit" class="btn btn-success" value="EDIT">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ボタンクリック後に表示される画面の内容 削除用モダール -->
            <div class="modal fade" id="eraseModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                 <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- ここからformタグ -->
                        <form action="/db/editReview" method="post">
                        @csrf
                            <h4>class="modal-title" id="myModalLabel">EDIT REVIEW</h4></h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{ $review -> id }}">
                            <p>{{ $review -> comment }}</p>
                            <p>
                                <br><input type="number" max="5" id="score" name="score" required>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                            <input type="submit" class="btn btn-danger" value="ERASE">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            </td>
        </tr>
    @endforeach
</table>
    


@endsection