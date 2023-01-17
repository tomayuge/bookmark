@extends('layouts.base')
@section('title','search')
@section('main')
<a href="/">Topページに戻る</a>
<table>
    <tr><td rowspan="6">{{ $record -> img }}</td></tr>
    <tr><td>{{ $record -> book_name }}</td></tr>
    <tr><td>{{ $avgScore }}</td></tr>
    <tr><td>{{ $record -> writer }}</td></tr>
    <tr><td>{{ $record -> publisher }}</td></tr>
    <tr><td>{{ $record -> price }}</td></tr>
    <tr>
        <!-- reviewページに飛ぶボタンを作る -->
        <form action="/db/review"></form>
    </tr>
</table>    
<hr>
<p>Reviews</p>
<table>
    @foreach($reviews as $review)
        <tr>
            <td>{{ $review -> accounts -> user_name }}</td>
            <td>{{ $review -> score }}</td>
            <td>{{ $review -> comment }}</td>
            <td>
                <form action="/db/" method="post">
                <input type="hidden" name="id" value="{{ $record->id }}">
                <input type="submit" value="EDIT">
                <input type="submit" value="DELETE"></form>
            </td>
        </tr>
    @endforeach
</table>
    
    


@endsection