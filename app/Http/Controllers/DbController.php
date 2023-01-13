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

    //検索フォームのデータを取得し、該当する既存のデータを取得するアクションメソッド
    //複数キーワードにも対応
    public function search(Request $req)
    {
        $keyword = $req -> keyword;
        $query = Book::query() -> paginate(5); //Bookモデルのクエリビルダを開始、ページネーションを[5]で指定
        if(isset($keyword)){
            $array_words = preg_split( '/\s+/ui' , $keyword , -1 ,PREG_SPLIT_NO_EMPTY); //スペース区切りでキーワードを配列に格納
            foreach($array_words as $word){
                $escape_word = addcslashes($word,'\\_%'); //エスケープ処理
                $query = $query->where('book_name','LIKE',"%$keyword%")->orWhere('writer','LIKE',"%$keyword%")->orWhere('publisher','LIKE',"%$keyword%")->get();
            }
        }

        //クエリビルダの結果を取得。複数カラムで検索しているので重複がある場合はdistinctではじく。($keywordが無い場合は全て取得)
        //distinctいるかはテストで確認
        $records = $query -> distinct() -> get(); 
        
        //レビュー点数の平均点を出す
        $score = $record -> review -> score / count($records);
        

        $data=[
            'records' => $records,
            'score' => $score,
            'count' => $result->count(),
            'keyword' => $keyword
        ];
        return view('db.search',$data);
    }

    //
    
}
