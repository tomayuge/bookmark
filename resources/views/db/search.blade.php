@extends('layouts.base')
@section('title','search')
@section('main')
    <a href="/">Topページに戻る</a>

    <!-- searchページ内で再検索できるようにformを設置 検索ワードも引き継いでいる -->
    <form action="/db/search" method="post">
        @csrf
        <input type="text" name="keyword" value="{{ $keyword }}">
        <input type="submit" value="検索">
    </form>

    <hr>
    
    <p>[ {{ $keyword }} ]の検索結果 {{ $count }}件</p>

    <table class="table">
        @foreach($records as $record)
        <!-- 下記でデータの受け渡しができるか。recordだけで全てのデータを受け渡しできるか検証する -->
        <tr><a href="{{route('/db/bookView',$record ->id)}}">{{ $record -> img }}</a></tr>
        <tr><a href="{{route('/db/bookView',$record)}}">{{ $record -> book_name}}</a></tr>
        <tr><div id="star">
            <star-rating increment="0.5"
                        >

            </star-rating>
            </div>{{ $score }}
        </tr>
        <tr>{{ $record -> writer }}</tr>
        <tr>{{ $record -> publisher }}</tr>
        <tr>{{ $record -> ISBN }}</tr>
        <tr>{{ $record -> price }}</tr>
        @endforeach
    </table>
    {{ $records->links() }} 
    <a href="/">Topページに戻る</a>
@endsection