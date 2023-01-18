@extends('layouts.base')
@section('title','search')
@section('main')
    <a href="/">Topページに戻る</a>

    <!-- searchページ内で再検索できるようにformを設置 検索ワードも引き継いでいる -->
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
                <star-rating v-bind:increment="0.1"
                        >
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
@endsection