<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Account;
use App\Models\Review;

class DbController extends Controller
{
    //トップページ
    public function index()
    {
        return view('db.index');
    }

    //新規登録画面
    public function insert()
    {
        return view('db.insert');
    }

    //ISBNチェック画面
    public function checkIsbn(Request $req)
    {
        $searchIsbn = $req->isbnSearch;
        $registared = Book::where('isbn',$searchIsbn)->count();
        //dd($registared);
        if(!isset($searchIsbn) || strlen($searchIsbn)!==13)
        {
            $msg="13桁のISBNコードを入力してください";
            $data =[
                'msg' => $msg
            ];
            return redirect("/db/insert",$data);//13桁以外は入力画面に強制移動
        }
        if($registared>=1){
            $msg = "既に登録済みです";
            $data =[
                'msg' => $msg
            ];
            return redirect("/db/insert",$data);//登録済の場合は強制移動
        }

        return view('db.checkIsbn');
    }

    //確認ページ
    public function confirm(Request $req)
    {
        if(mb_strlen($req->isbnSearch)!==13){
            return redirect("db/insert");
        }
        $isbn = $req -> isbnSearch;
        $url = 'https://api.openbd.jp/v1/get?isbn=';
        $searchData = $url."{$isbn}";
       
        //プロキシ設定
        $proxy = array(
        "http" => array(
        "proxy" => "tcp://172.16.71.20:3128",
        "request_fulluri" => true
        )
        );
        $proxy_context = stream_context_create($proxy);
        $json = file_get_contents($searchData, false, $proxy_context);
        $items = json_decode($json);
        //dd($items);

        //openBDで取得したデータをdataに格納
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

    //新規登録完了ページ
    public function store(Request $req)
    {
        $book = new Book();
        $book->isbn = $req->isbn;
        $book->book_name = $req->book_name;
        $book->writer = $req->writer;
        $book->publisher = $req->publisher;
        $book->price = $req->price;
        $book->img = $req->img;

        //Booksテーブルにデータを保存
        $book->save();

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

    public function eraseData(Request $req)
    {
        $id=$req->book_id;
        $data=[
            'record'=>Book::find($id),
            'id'=>$id
        ];
        //dd($id);
        session()->put('bookId',$id);
        return view('db.eraseData',$data);
    }

    public function bookDelete(Request $req)
    {
        //dd($req);
        $bookId=session()->get('bookId');
        $book = Book::find($bookId);
        $book->delete();
        return view('db.bookDelete');
    }


    //検索フォームのデータを取得し、該当する既存のデータを取得するアクションメソッド
    //複数キーワードにも対応
    public function search(Request $req)
    {
        $keyword = $req -> keyword;
        $query = Book::all(); //Bookモデルのクエリビルダを開始
        //dd($query);
        //dd($keyword);
        if(isset($keyword)){
            $array_words = preg_split( '/\s+/ui' , $keyword , -1 ,PREG_SPLIT_NO_EMPTY); //スペース区切りでキーワードを配列に格納
            
            foreach($array_words as $word){
                //dd($word);
                $escape_word = addcslashes($word,'\\_%'); //エスケープ処理

                //distinctいるかはテストで確認
                $query = Book::where('book_name','LIKE',"%$word%") 
                                ->orwhere('writer','LIKE',"%$word%")
                                ->orwhere('publisher','LIKE',"%$word%")
                                ->distinct();//distinctで重複データをはじく
             }
            
        }else{
            $keyword="";
        }
        //$this -> $req -> session() -> put('keyword',$keyword);                
        $data=[
            'records' => $query->paginate(5) ,
            'count' => $query -> count(),
            'keyword' => $keyword,
            'this' => $this
        ];
        return view('db.search',$data);
    }

    //全レコードを取得するモデル内のメソッドを実行
    public function list()
    {
        $book = Book::all();
        $allCount = $book -> count();
        
        $data = [
            'reviews' => Review::all(),
            //全レコードを取得するモデル内のメソッドを実行し保存
            'records' => Book::paginate(5), //※動作確認のため、5つで1ページにしてます
            'allCount' => $allCount
        ];
        //dd($data);
        return view('db.list',$data);
    }

    //searchページから詳細ページに飛ぶアクションメソッド
    public function bookView(Request $req)
    {
        //受け取った値が単体か配列か検証する
        $book_id = $req->book_id;
        
        $book = Book::Where('id','=',$book_id)->first();
        
        $reviews = Review::Where('book_id','=',$book_id)->get();
        session()->put('book_id',$book_id);
        $data =[
            'records' => $book,
            'reviews' => $reviews
        ];
       
        return view('db.bookView',$data);
    }


    public function reviewView(Request $req)
    {
        $book_id = $req->book_id;
        $data =[
            'book_id' => $book_id
        ];
        return view('db.review',$data);
    }

    //レビュー投稿
    public function review(Request $req)
    {
        if(session()->get('account_id')===null){
            return view('login');
        }
        $book_id = session()->get('book_id');
        $review = new Review();
        $review->book_id = $book_id;
        $review->score = $req->score;
        $review->comment = $req->comment;
        $review->account_id = session()->get('account_id');
        $review->save();
        $book = Book::Where('id','=',$book_id)->first();
        $reviews = Review::Where('book_id','=',$book_id)->get();
        //Booksテーブルにデータを保存
         $data =[
            'records' => $book,
            'reviews' => $reviews
        ];
        session()->flash('ok_msg', '登録しました。');
        return view('db.bookView',$data);
    }

    public function editReview(Request $req)
    {   
        $book_id = session()->get('book_id');
        $editReview = Review::find($req -> id);
        $editReview -> score = $req -> score;
        $editReview -> comment = $req -> comment;

        //reviewテーブルにデータを保存
        $editReview->save();

        
        $book = Book::where('id','=',session()->get('book_id'))->first();
        $reviews = Review::Where('book_id','=',$book_id)->get();
        $data = [
            'reviews' => $reviews,
            'records' => $book
        ];

        

        session()->flash('ok_msg', 'レビューを編集しました。');
        return view('db.bookView',$data);
    }

    public function deleteReview(Request $req)
    {   
        $book_id = session()->get('book_id');
        $id=$req->id;//レビューのid取得

        $review = Review::find($id);
        $review->delete();
        $book = Book::where('id','=',session()->get('book_id'))->first();
        $reviews = Review::Where('book_id','=',$book_id)->get();
        $data = [
            'reviews' => $reviews,
            'records' => $book
        ];
        session()->flash('ok_msg', 'レビューを削除しました。');
        return view('db.bookView',$data);
    }

    //ログイン処理
    public function login(Request $req)
    {
        //アカウント情報とパスでログイン処理
        $username = $req->user_name;
        $pass = $req->pass;
        //$account = Account::all();
        //$password = $account->pass;
        $account = Account::where('user_name', $username)->first();
        //dd($account);
        //dd($account->id);
        $password = $account->pass;
  

        //$name = Account::find($req->user_name);
        //$pass = Account::find($req->pass);
        if($password===$pass){
            session()->put('account_id',$account->id);
            return view('/db/index');
        }else{
            session()->flash('err_msg', '入力に誤りがあります。');
            //\Session::flash('err_msg', '入力に誤りがあります。');
            return redirect('/');
        }
    }   

    //ログアウト処理
    public function logout()
    {
        return view('login');
    }
}
