<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;

class DbController extends Controller
{
    //新規登録画面
    public function insert()
    {
        return view('db.insert');
    }

    public function confirm(Request $req)
    {
        $isbn = $req -> isbn;
        // $data-[
        //     'record'=>
        // ];
        return view('db.insert');
    }

    public function store(Request $req)
    {
        //$bookmark = new Bookmark();

        //$bookmark->save();
        $data = [
            'isbn' => $req->isbn,
            'book_name' => $req->book_name,
            'writer' => $req->writer,
            'publisher' => $req->publisher,
            'price' => $req->price,
            'img' => $req->img
        ];
        return view('db.store',$data);
    }
}
