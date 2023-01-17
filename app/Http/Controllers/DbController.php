<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Account;
use App\Models\Review;
use GuzzleHttp\Client;

class DbController extends Controller
{
    //新規登録画面
    public function insert()
    {
        return view('db.insert');
    }

    public function confirm(Request $req)
    {
        // $client = new Client();
        // $isbn = $req -> isbnSearch;
        // $Url = 'https://api.openbd.jp/v1/get?isbn=';
        // $searchData = $Url."{$isbn}";
        // $response = $client->request("get",$searchData);
        // $return = json_decode($response->getBody(),true);
        // $return_summary = $return[0]['summary'];
        // $return_title = $return_summary['title'];
        // $return_author = $return_summary['author'];

        // $data = [
        //     'title' => $return_title,
        //     'author' => $return_author,
        //     'isbn' => $isbn
        // ];
        //  dd($data);

        $isbn=$req->isbn;
        $book_name=$req->book_name;
        $writer=$req->writer;
        $publisher=$req->publisher;
        $price=$req->price;
        $img=$req->img;

        $data=[
            'isbn'=>$isbn,
            'book_name'=>$book_name,
            'writer'=>$writer,
            'publisher'=>$publisher,
            'price'=>$price,
            'img'=>$img,
        ];
        
         return view('db.confirm',$data);
         
    }

    public function store(Request $req)
    {
        $book = new Book();
        $book->isbn = $req->isbn;
        $book->book_name = $req->book_name;
        $book->writer = $req->writer;
        $book->publisher = $req->publisher;
        $book->price = $req->price;
        $book->img = $req->img;

        $book->save();


        //$bookmark->save();
        $data = [
            'id' => $req->id,
            'book_name' => $req->book_name,
            'writer' => $req->writer
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

    //ログイン処理
    public function login(Request $req)
    {
        //アカウント情報とパスでログイン処理
        $data = [
            'username' => $req->user_name,
            'pass' => $req->pass,
        ];
        $name = account::find($req->user_name);
        $pass = account::find($req->pass);
        if($data->username === $name){
            if($data->pass === $pass){
                return view('db.index');
            }else{
                return view('db.login');
            }
        }else{
            return view('db.login');
        }
    }   
}
