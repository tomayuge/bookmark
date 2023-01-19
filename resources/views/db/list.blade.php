@extends('layouts.base')
@section('title','search')
@section('main')
<div style="padding: 15px;">
    <form action="/db/search" method="get">
        @csrf
        <input type="text" name="keyword">
        <input type="submit" value="検索" class="btn btn-info rounded-0">

        <div style="text-align:right">
            <!-- <a href="/db/insert" class="btn btn-info  rounded-circle " style="width:4rem;height:4rem;"" >新規登録</a> -->
            <!-- <a href="/db/insert" class="btn btn-info  rounded-circle " style="width:4rem;height:4rem;">新規登録</a> -->

            <!-- <br> -->
            <!-- <br> -->
            
            </ul>
        </div>
    </form>

    <hr>
    <p>全 {{ $allCount }} 件</p>
    <table class="table" border="1">
        <th>
        <td>書籍名</td>
        <td>レビュー(平均)</td>
        <td>著者名</td>
        <td>出版社名</td>
        <td>価格</td>
        <td>操作</td>
        </th>
        @foreach($records as $record)

        <tr>
            <td>
                <!-- 画像と本の名前をbookViewへのリンクにしてます -->
                <form action="/db/bookView" method="post">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $record -> id }}" readonly>
                    <input type="image" class="btn btn-link" src="{{ $record -> img }}" alt="詳細ページ" height="200">
                </form>
            </td>
            <td>
                <form action="/db/bookView" method="post">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $record -> id }}" readonly>
                    <input type="submit" class="btn btn-link" value="{{ $record -> book_name }}">
                </form>
            </td>
            <td>{{ $avg = floor($record -> reviews -> average('score')*10)/10 }} ({{ $record -> reviews -> count() }}件)</td>
            <td>{{ $record -> writer }}</td>
            <td>{{ $record -> publisher }}</td>
            <td>￥{{ $record -> price }}</td>
            <td>
                <form action="/db/eraseData" method="post">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $record -> id }}" readonly>
                    <input type="submit" value="削除" class="btn btn-danger rounded-0 d-grid">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <br>
    {{ $records->links() }}
    <br>
    <div style="padding-right: 15px;">
        <div style="text-align:right ">
            <!-- <a href="/db/index">Topページに戻る</a> -->
            <a href="/db/index" class="text-dark">Topページに戻る</a><br>
            <!-- <a href="/db/review">レビューページ</a> -->
            <!-- <a href="/db/review" class="text-dark">レビューページ</a> -->
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    @endsection