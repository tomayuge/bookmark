<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Account;
use App\Models\Review;

class DbController extends Controller
{
    //新規登録画面
    public function insert()
    {
        return view('db.insert');
    }

    public function confirm(Request $req)
    {
        $isbn = $req -> isbnSearch;
        $gbUrl = 'https://www.googleapis.com/books/v1/volumes?q=isbn';
        $searchData = $gbUrl."{$isbn}";
        $json = file_get_contents($searchData);
        $jdata = json_decode($json);
        $items = $jdata->items;

        dd($items);

        $data = [
            'items' => $items
         ];
        return view('db.insert',$data);
    }

    public function store(Request $req)
    {
        $book = new Book();

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
