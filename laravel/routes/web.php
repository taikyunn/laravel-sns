<?php

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

// Routeファサードのgetメソッドの呼び出し
// 第一引数:URL 第二引数:どのコントローラーで何のメソッドを実行するかを記載
// コントローラーとメソッドの間には@を入れる
Route::get('/', 'ArticleController@index');
