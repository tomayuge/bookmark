@extends('layouts.base')
@section('title','search')
@section('main')
    <a href="/">Topページに戻る</a>

    <form action="/db/search" method="post">
        @csrf
        <input type="text" name="keyword" value="{{ $keyword }}">
        <input type="submit" value="検索">
    </form>    

    <p>{{ $count }}件</p>

    <table class="table">
        @foreach($records as $record)
        <tr>{{ $record -> img }}</tr>
        <tr>{{ $record -> book_name }}</tr>
        <tr>{{ $score }}</tr>
        <tr>{{ $record -> writer }}</tr>
        <tr>{{ $record -> publisher }}</tr>
        <tr>{{ $record -> ISBN }}</tr>
        <tr>{{ $record -> price }}</tr>
        @endforeach
    </table>
    {{ $records->links() }} 
@endsection