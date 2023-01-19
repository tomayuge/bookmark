@extends('layouts.base')
@section('title','search')
@section('main')
<div style="padding: 15px;">
    <form action="/db/search" method="post">
        @csrf
        <input type="text" name="keyword">
        <input type="submit" value="検索" class="btn btn-info rounded-0">
    </form>

    <hr>

    <table class="table" border="1">
    <th><td>書籍名</td><td>レビュー</td><td>著者名</td><td>出版社名</td><td>価格</td></th>
        @foreach($records as $record)
        <th><td>書籍名</td><td>レビュー</td><td>著者名</td><td>出版社名</td><td>価格</td></th>
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
        <td>{{ $record -> reviews -> average('score') }} ({{ $record -> reviews -> count() }}件)</td>
        <td>{{ $record -> writer }}</td>
        <td>{{ $record -> publisher }}</td>
        <td>￥{{ $record -> price }}</td>
        <td>
                <form action="/db/eraseData" method="post">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $record -> id }}" readonly>
                    <input type="submit" value="削除">
                </form>
            </td>
    </tr>
    @endforeach
</table>
<br>
{{ $records->links() }}
<br>
<a href="/db/index">Topページに戻る</a>
<!-- <a href="/db/index" class="text-dark">Topページに戻る</a> -->
<a href="/db/review">レビューページ</a>
<!-- <a href="/db/review" class="text-dark">レビューページ</a> -->

<script src="https://unpkg.com/vue-star-rating/dist/star-rating.min.js"></script>
>>>>>>> 5662b37d8a4748e6c533b5d7a01fae2027874768
@endsection