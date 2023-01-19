@extends('layouts.base')
@section('title','search')
@section('main')
<form action="/db/search" method="post">
    @csrf
    <input type="text" name="keyword">
    <input type="submit" value="検索" class="btn btn-info rounded-0">
</form>

    <hr>

    <table class="table" border="1">
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
        <td><p>{{ $record -> reviews -> average('score') }}</p>{{ $record -> reviews -> count() }}件</td>
        <td>{{ $record -> writer }}</td>
        <td>{{ $record -> publisher }}</td>
        <td>{{ $record -> ISBN }}</td>
        <td>￥{{ $record -> price }}</td>
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
@endsection