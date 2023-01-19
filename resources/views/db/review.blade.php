@extends('layouts.base')
@section('title','search')
@section('main')
<div style="padding: 15px;">
    <h1>レビュー画面</h1>
    @if (session('ok_msg'))
    <div style="text-align:center;" p class="text-danger" text-align:center>
        {{ session('ok_msg') }}
    </div>
    @endif
    <br>


    <form action="/db/review" method="post">
        @csrf
        <div class="form-floating">
            本のレビューを書いてください
            <br>
            <!-- <textarea rows="5" id="comment" name="comment" placeholder="本のレビューを書いてください" required></textarea> -->
            <textarea class="form-control" id="comment" name="comment" placeholder="本のレビューを書いてください" required></textarea>
            <!-- <label for="comment">コメント</label> -->
        </div>
        <br>
        <p>点数を５段階で入力してください
            <br>
            <input type="radio" name="score" value="1" checked>1
            <input type="radio" name="score" value="2">2
            <input type="radio" name="score" value="3">3
            <input type="radio" name="score" value="4">4
            <input type="radio" name="score" value="5">5
        </p>
        <!-- <input type="hidden" name="account_id" value= account_id }}" readonly> -->
        <br> <input type="submit" value="登録" class="btn btn-info rounded-0">
    </form>
    <div style="text-align:right">
        <br><a href="/db/list" class="btn btn-info  rounded-circle" style="width:4rem;height:4rem;">戻る</a>
    </div>
</div>
@endsection