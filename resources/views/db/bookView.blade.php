@extends('layouts.base')
@section('title','search')
@section('main')
<a href="/db/index">Topページに戻る</a>
<table>
    <tr><td rowspan="6"><img src="{{ $records -> img }}" height="300"></td></tr>
    <tr><td>{{ $records -> book_name }}</td></tr>
    <tr><td>{{ $records -> reviews -> average('score') }}"</td></tr>
    <tr><td>{{ $records -> writer }}</td></tr>
    <tr><td>{{ $records -> publisher }}</td></tr>
    <tr><td>{{ $records -> price }}</td></tr>
    <tr>
        <td colspan="2">
            <!-- reviewページに飛ぶボタンを作る -->
            <form action="/db/review" method="post">
                @csrf
                <input type="hidden" name="book_id" value="{{ $records -> id }}">
                <input type="submit" class="btn btn-outline-primary" value="レビューを登録する">
            </form>
        </td>
    </tr>
</table>    
<hr>
<p>Reviews</p>
<table>
    @foreach($records as $record)
        <tr>
            <td>{{ $record -> review -> account -> user_name }}</td>
            <td>{{ $record -> review -> score }} </td>
            <td>{{ $record -> review -> comment }}</td>

        </tr>
    @endforeach
</table>


@endsection