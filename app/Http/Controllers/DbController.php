<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Account;
use App\Models\Review;
use GuzzleHttp\Client;

class DbController extends Controller
{
    public function index()
    {
        return view('db.index');
    }

    //新規登録画面
    public function insert()
    {
        return view('db.insert');
    }

    public function confirm(Request $req)
    {
        $isbn = $req -> isbnSearch;
        //$Url = 'https://iss.ndl.go.jp/api/sru?operation=searchRetrieve&query=isbn=';
        //$Url = 'https://www.googleapis.com/books/v1/volumes?q=isbn:';
        $Url = 'https://api.openbd.jp/v1/get?isbn=';
        $searchData = $Url."{$isbn}";

       
        $proxy = array(
        "http" => array(
        "proxy" => "tcp://172.16.71.20:3128",
        "request_fulluri" => true
        )
        );
        $proxy_context = stream_context_create($proxy);
        $json = file_get_contents($searchData, false, $proxy_context);
        $items = json_decode($json);
        //$items = $jdata->items;

        //dd($items);

        $isbn=$items[0]->summary->isbn;
        $book_name=$items[0]->summary->title;
        $writer=$items[0]->summary->author;
        $publisher=$items[0]->summary->publisher;
        $price=$items[0]->onix->ProductSupply->SupplyDetail->Price[0]->PriceAmount;
        $img=$items[0]->summary->cover;

        $data=[
            'isbn'=>$isbn,
            'book_name'=>$book_name,
            'writer'=>$writer,
            'publisher'=>$publisher,
            'price'=>$price,
            'img'=>$img,
        ];
        //dd($data);
         return view('db.confirm',$data);
    }

    public function store(Request $req)
    {
        //dd($req);
        $book = new Book();
        $book->isbn = $req->isbn;
        $book->book_name = $req->book_name;
        $book->writer = $req->writer;
        $book->publisher = $req->publisher;
        $book->price = $req->price;
        $book->img = $req->img;

        $book->save();

        //dd($book);

        $data = [
            'isbn' => $req->isbn,
            'book_name' => $req->book_name,
            'writer' => $req->writer,
            'publisher'=> $req->publisher,
            'price'=> $req->price,
            'img'=> $req->img
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

    //レビュー投稿
    public function review(Request $req)
    {

    }

    //全レコードを取得するモデル内のメソッドを実行
    public function list()
    {
        $data = [
            //全レコードを取得するモデル内のメソッドを実行し保存
            'records' => Book::paginate(2)
        ];
        return view('db.list',$data);
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
            return view('/db/index');
        }else{
            session()->flash('err_msg', '入力に誤りがあります。');
            //\Session::flash('err_msg', '入力に誤りがあります。');
            return redirect('/');
        }
        
    }   
}
