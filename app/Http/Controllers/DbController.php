<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books;
use App\Models\reviews;
use App\Models\accounts;

class DbController extends Controller
{
    public function search(Request $req)
    {
        $keyword=$req->keyword;
        $data=[
            'result'=>Book::where('book_name','LIKE',"%$keyword%")->get(),
            'keyword'=>$keyword
        ];
        return view('db.search',$data);
    }
}
