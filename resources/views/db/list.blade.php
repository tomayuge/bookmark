@extends('layouts.base')
@section('title','search')
@section('main')
    <a href="/">Topページに戻る</a>
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
            <td>{{ $record -> book_name }}</td>
            <td><div id="star">
                <star-rating :rating="{{ $record -> review -> score }}" :read-only="true" :increment="0.01">
                </star-rating>
                </div>
            </td>
            <td>{{ $record -> writer }}</td>
            <td>{{ $record -> publisher }}</td>
            <td>{{ $record -> ISBN }}</td>
            <td>{{ $record -> price }}</td>
        </tr>
        @endforeach
    </table>
    <br>
    {{ $records->links() }} 
    <a href="/">Topページに戻る</a>
    <script src="https://unpkg.com/vue-star-rating/dist/star-rating.min.js"></script>
@endsection