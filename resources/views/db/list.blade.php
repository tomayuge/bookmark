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
        <!-- 下記でデータの受け渡しができるか。recordだけで全てのデータを受け渡しできるか検証する -->
        <!-- <tr><a href="{{route('/db/bookView',$record ->id)}}">{{ $record -> img }}</a></tr>
        <tr><a href="{{route('/db/bookView',$record)}}">{{ $record -> book_name}}</a></tr> -->
        <tr><td><div id="star">
            <star-rating v-bind:increment="0.1"
                        >

            </star-rating>
            </div>
            </td></tr>
        <tr><td>{{ $record -> writer }}</td></tr>
        <tr><td>{{ $record -> publisher }}</td></tr>
        <tr><td>{{ $record -> ISBN }}</td></tr>
        <tr><td>{{ $record -> price }}</td></tr>
        @endforeach
    </table>
    <br>
    {{ $records->links() }} 
    <a href="/">Topページに戻る</a>
@endsection