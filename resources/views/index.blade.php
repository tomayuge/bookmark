@extends('layouts.base')
@section('title','Bookmark')
@section('main')
    
<!-- フッター -->
   <footer class="text-center bg-dark text-white">
        <p class="py-3">bookmark</p>
    </footer>
    
<h1>トップページ</h1>
    <form action="/db/search" method="post">
        @csrf
        <input type="text" name="keyword" required>
        <input type="submit" value="検索" class="btn btn-outline-dark">
        <br>
    </form>
    <ul>
        <!-- <li><a href="/db/insert" >書籍の新規登録</a></li>
        <li><a href="/db/list">全件表示</a></li> -->

        <a href="/db/insert" class="btn btn-light" >書籍の新規登録</a>
        <br><br>
        <a href="/db/list" class="btn btn-light">全件表示</a>
    </ul>
@endsection