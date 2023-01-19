@extends('layouts.base')
@section('title','search')
@section('main')
    <!-- searchページ内で再検索できるようにformを設置 検索ワードも引き継いでいる -->
    <form action="/db/search" method="get">
        @csrf
        <input type="text" name="keyword" value="{{ $keyword }}">
        <input type="submit" value="検索">
    </form>

    <hr>
    
    <p>[ {{ $keyword }} ]の検索結果 {{ $count }}件</p>

    <table class="table">
    <th><td>書籍名</td><td>レビュー</td><td>著者名</td><td>出版社名</td><td>価格</td><td>操作</td></th>
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
    {{ $records->links() }} 
    <a href="/">Topページに戻る</a>
@endsection