@extends('layouts.base')
@section('title','Bookmark')
@section('main')

<!-- フッター
   <footer class="text-center bg-dark text-white">
        <p class="py-3">bookmark</p>
    </footer> -->

<!-- <h1>トップページ</h1> -->
<div style="padding-right: 15px;">
@if (session('ok_msg'))
    <div style="text-align:center;" p class="text-danger" text-align:center>
        {{ session('ok_msg') }}
    </div>
    @endif
    <div style="text-align:right">
        <!-- <a href="/db/insert" class="btn btn-info  rounded-circle " style="width:4rem;height:4rem;"" >新規登録</a> -->
        <a href="/db/insert" class="btn btn-info  rounded-circle " style="width:4rem;height:4rem;">新規登録</a>

        <!-- <br> -->
        <!-- <br> -->
        <a href="/db/list" class="btn btn-info  rounded-circle" style="width:4rem;height:4rem;">全件表示</a>
        </ul>
    </div>
</div>

<div style="text-align:center;" text-align:center>
    <form class=novalidate action="/db/search" method="get">
        @csrf
        <br><br>
        <h2>Search</h2><br>
        <input type="text" name="keyword" placeholder="検索したいキーワードを入力" required>
        <input type="submit" value="検索" class="btn btn-info rounded-0">
        <br>

    </form>
    <ul>
        <!-- <li><a href="/db/insert" >書籍の新規登録</a></li>
        <li><a href="/db/list">全件表示</a></li> -->
        <br>

        @endsection