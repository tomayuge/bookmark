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
        $gbUrl = 'https://www.googleapis.com/books/v1/volumes?q=isbn:';
        $searchData = $gbUrl."{$isbn}";
        //dd($searchData);
        $json = file_get_contents("$searchData");
        //dd($json);
        $jdata = json_decode($json,true);
        dd($jdata);
        //$items = $jdata->items;

        //9784295007807すっきりわかるJava

        //dd($items);

        $data = [
            $jdata['isbn'],
            $jdata['title'],
            $jdata['authors'],
            $jdata['publisher'],
            $jdata['retailPrice'],
            $jdata['imageLinks']
         ];
         dd($data);
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

    //検索フォームのデータを取得し、該当する既存のデータを取得するアクションメソッド
    //複数キーワードにも対応
    public function search(Request $req)
    {
        $keyword = $req -> keyword;
        $query = Book::query(); //Bookモデルのクエリビルダを開始、ページネーションを[5]で指定
        if(isset($keyword)){
            $array_words = preg_split( '/\s+/ui' , $keyword , -1 ,PREG_SPLIT_NO_EMPTY); //スペース区切りでキーワードを配列に格納
            foreach($array_words as $word){
                $escape_word = addcslashes($word,'\\_%'); //エスケープ処理
                $query = $query->Where('book_name','LIKE',"%$keyword%")->orWhere('writer','LIKE',"%$keyword%")->orWhere('publisher','LIKE',"%$keyword%")->get();
            }
        }

        //クエリビルダの結果を取得。複数カラムで検索しているので重複がある場合はdistinctではじく。($keywordが無い場合は全て取得)
        //distinctいるかはテストで確認
        $records = $query -> distinct() -> get(); 
        $records -> paginate(5);  //※一旦5ページにしてます
        
        //レビュー点数の平均点を出す
        $score = $records -> review -> score / count($records);
        
        $data=[
            'records' => $records,
            'score' => $score,
            'count' => $records->count(),
            'keyword' => $keyword
        ];
        return view('db.search',$data);
    }

    //searchページから詳細ページに飛ぶアクションメソッド
    public function bookView(Request $req)
    {
        //受け取った値が単体か配列か検証する
        $book = Book::find($req);
        $reviews = $book -> review ->get();
        $avgScore = $book -> review -> score / count($reviews);
        
        $data =[
            'record' => $book,
            'reviews' => $reviews,
            'avgScore' => $avgScore
        ];
        return view('db.bookView',$data);
    }

    //ログイン処理
    public function login(Request $req)
    {
        //アカウント情報とパスでログイン処理
            $username = $req->user_name;
            $pass = $req->pass;

        //$name = account::find($req->user_name);
        //$pass = account::find($req->pass);
        if(($username==='akamine'&&$pass==='pass')||($username==='yuge'&&$pass==='pass')||($username==='hosomi'&&$pass==='pass')||($username==='tsumatani'&&$pass==='pass')){
            return view('index');
        }else{
            return view('loginerror');
        }
        
    }   
}
