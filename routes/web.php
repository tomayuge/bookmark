<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::post('/db/login','DbController@login');//ログイン用
Route::get('/db/index','DbController@index');//ログイン後に表示するindexページ
Route::get('/db/list','DbController@list');//全件表示用のビューを呼び出す
Route::get('/db/insert','DbController@insert');//新規登録用フォーム(ISBN入力)
Route::post('/db/checkIsbn','DbController@checkIsbn');//ISBNチェック画面
Route::post('/db/confirm','DbController@confirm');//新規登録用フォーム(書籍確認)
Route::post('/db/store','DbController@store');//新規登録完了
Route::get('/db/search','DbController@search');//検索用
Route::post('/db/bookView','DbController@bookView');//bookView表示用
Route::post('/db/review','DbController@review');//レビュー用フォーム
Route::post('/db/reviewView','DbController@reviewView');//reviewのビュー表示とbook_idを渡す
Route::post('/db/editReview','DbController@editReview');//レビュー編集用フォーム
Route::get('/db/logout','DbController@logout');//ログアウト用
Route::post('/db/eraseData','DbController@eraseData');//削除する書籍の表示
Route::post('/db/bookDelete','DbController@bookDelete');//登録書籍の削除
Route::post('/db/deleteReview','DbController@deleteReview');//


