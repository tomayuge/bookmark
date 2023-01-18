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
    return view('review');
});

Route::post('/db/login','DbController@login');//ログイン用
Route::get('/db/index','DbController@index');//ログイン後に表示するindexページ
Route::get('/db/list','DbController@list');//全件表示用のビューを呼び出す
Route::get('/db/insert','DbController@insert');//新規登録用フォーム(ISBN)
Route::post('/db/confirm','DbController@confirm');//新規登録用フォーム(確認)
Route::post('/db/store','DbController@store');//新規登録
Route::post('/db/search','DbController@search');//検索用
Route::post('/db/bookView','DbController@bookView');//bookView表示用
Route::post('/db/review','DbController@review');//レビュー用フォーム