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

Route::post('/db/login','DbController@login');//新規登録用フォーム(確認)
Route::get('/index','DbController@index');
Route::get('/db/insert','DbController@insert');//新規登録用フォーム(ISBN)
Route::post('/db/confirm','DbController@confirm');//新規登録用フォーム(確認)
Route::post('/db/store','DbController@store');//新規登録
Route::post('/db/search','DbController@search');//検索用
Route::post('/db/bookView','DbController@bookView');//bookView表示用
