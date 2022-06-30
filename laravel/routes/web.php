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

/**
 * Routeファサードのgetメソッドの呼び出し
 * 第一引数:URL 第二引数:どのコントローラーで何のメソッドを実行するかを記載
 * コントローラーとメソッドの間には@を入れる
 *
 */

/**
 * 設定されているroute一覧取得コマンド
 * php artisan route:list
 */
Route::get('/', 'ArticleController@index');

/**
 * Laravel標準で設定されている認証関連のrouteを使えるようにするには
 * 下記の記述を追加すればよい。
 */
Auth::routes();
