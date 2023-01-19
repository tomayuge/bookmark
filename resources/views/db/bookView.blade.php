@extends('layouts.base')
@section('title','search')
@section('main')

<!-- <div style="text-align:center">
    <a href="/db/index" class="btn btn-info  rounded-circle " style="width:4rem;height:4rem;">Top</a>
    <a href="/db/list" class="btn btn-info  rounded-circle " style="width:4rem;height:4rem;">一覧</a>
</div> -->

<div style="text-align:right">
    <a href="/db/index" class="btn btn-info  rounded-circle " style="width:4rem;height:4rem;">Top</a>
    <a href="/db/list" class="btn btn-info  rounded-circle " style="width:4rem;height:4rem;">一覧</a>
</div>


    <br>
    <br>
    @if (session('ok_msg'))
    <div style="text-align:center;" p class="text-danger" text-align:center>
        {{ session('ok_msg') }}
    </div>
    @endif
    <center><table  >
        <tr>
            <td rowspan="6"><img src="{{ $records -> img }}" height="400"></td>
        </tr>
        <tr>
            <td>書籍名<br>{{ $records -> book_name }}</td>
        </tr>
        <tr>
            <td>平均点数<br>{{ $records -> reviews -> average('score') }}({{ $reviews -> count() }})</td>
        </tr>
        <tr>
            <td>著者名<br>{{ $records -> writer }}</td>
        </tr>
        <tr>
            <td>出版社<br>{{ $records -> publisher }}</td>
        </tr>
        <tr>
            <td>価格<br>￥{{ $records -> price }}</td>
        </tr>
        <tr>
            <td colspan="2">
                <!-- reviewページに飛ぶボタンを作る -->
                <form action="/db/reviewView" method="post">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $records -> id }}">
                    <!-- <input type="submit" class="btn btn-outline-primary" value="レビューを登録する"> -->
                    <br><input type="submit" class="btn btn-danger rounded-0" value="レビューを登録する">
                </form>
            </td>
        </tr>
    </table></center>
 
    <table class="table">
        <tr>
            <td>ユーザ名</td><td>評価点</td><td>レビュー</td><td>投稿日</td><td>操作</td>
        </tr>
        @foreach($reviews as $review)
        <tr>
            <td>{{ $review -> account -> user_name }}</td>
            <td>{{ $review -> score }}</td>
            <td class="col-5" style="word-wrap:break-word;">{{ $review -> comment }}</td>
            <td>{{ $review -> created_at }}</td>
            
                <!-- モーダルを開くボタン -->
            <div class="container">
                <div class="row my-3">
                    <div class="row mb-5">
                        <div class="col-2">
                            <td>
                            <button type="button" class="btn btn-info mb-12 rounded-0" data-toggle="modal" data-target="#editModal{{ $review->id }}" data-backdrop="false">変更</button>
                            <button type="button" class="btn btn-dark mb-12 rounded-0" data-toggle="modal" data-target="#eraseModal{{ $review->id }}" data-backdrop="false">削除</button>
                            </td>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <!-- ボタンクリック後に表示される画面の内容 編集用モーダル -->
            <div class="modal fade" id="editModal{{$review->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                 <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- ここからformタグ -->
                        <form action="/db/editReview" method="post">
                        @csrf
                            <h4 class="modal-title" id="myModalLabel">レビュー編集</h4>
                        </div>
                            <div class="modal-body">

                                <input type="hidden" name="id" value="{{ $review -> id }}">
                                <input type="textarea" name="comment" value="{{ $review -> comment }}">
                                <br><br>
                                評価編集 <br>
                                    <input type="radio" id="score" name="score" value="1" >1
                                    <input type="radio" id="score" name="score" value="2" >2
                                    <input type="radio" id="score" name="score" value="3" checked>3
                                    <input type="radio" id="score" name="score" value="4" >4
                                    <input type="radio" id="score" name="score" value="5" >5
                                        
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
            <div class="modal fade" id="eraseModal{{$review->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                 <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- ここからformタグ -->
                        <form action="/db/deleteReview" method="post">
                        @csrf
                            <h4 class="modal-title" id="myModalLabel">レビュー削除</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{ $review -> id }}">
                            <p>{{ $review -> comment }}</p>
                            <p>パスワード
                                <br><input type="password" id="pass" name="pass" required>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                            <input type="submit" class="btn btn-danger" value="削除">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            </td>
        </tr>
    @endforeach
</table>


<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
@endsection