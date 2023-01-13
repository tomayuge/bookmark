@extends('layouts.base')
@section('title','search')
@section('main')
    <h3>検索結果</h3>
    <a href="/">Topページに戻る</a>
    <hr>
    @isset($records)
        <p>検索ワード{{ $data->keyword }}</p>
    <br>
@endsection