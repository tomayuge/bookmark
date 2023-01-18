@extends('layouts.base')
@section('title','search')
@section('main')
    <a href="/db/index">Topページに戻る</a>
    <form action="/db/search" method="post">
        @csrf
        <input type="text" name="keyword">
        <input type="submit" value="検索">
    </form>

    <hr>

    <table class="table">
        @foreach($records as $record)
        
        <tr>
            <td>{{ $record -> img }}</td>
            <td><a href="/db/bookView">{{ $record -> book_name }}</a></td>
            <td>{{ $record -> reviews -> average('score') }}</td>
            <td>{{ $record -> writer }}</td>
            <td>{{ $record -> publisher }}</td>
            <td>{{ $record -> ISBN }}</td>
            <td>{{ $record -> price }}</td>
        </tr>
        @endforeach
    </table>
    <br>
    {{ $records->links() }} 
    <a href="/db/index">Topページに戻る</a>
    <script src="https://unpkg.com/vue-star-rating/dist/star-rating.min.js"></script>
@endsection