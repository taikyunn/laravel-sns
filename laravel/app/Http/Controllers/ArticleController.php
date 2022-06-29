<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /* コントローラーの雛形作成コマンド
    php artisan make:controller コントローラー名
    */

    // インデックスアクションを
    public function index() {
        $articles =  [
            (object) [
                'id' => 1,
                'title' => 'タイトル1',
                'body' => '本文1',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 1,
                    'name' => 'ユーザー名1',
                ],
            ],
            (object) [
                'id' => 2,
                'title' => 'タイトル2',
                'body' => '本文2',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 2,
                    'name' => 'ユーザー名2',
                ],
            ],
            (object) [
                'id' => 3,
                'title' => 'タイトル3',
                'body' => '本文3',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 3,
                    'name' => 'ユーザー名3',
                ],
            ],
        ];
        /* viewメソッド
        第一引数:ビューファイル (今回はresources/views/articles/index)
        第二引数:ビューファイルに渡す変数の名称と、その変数の値を連想配列形式で指定する

        withメソッド
        withメソッドの引数にビューファイルに渡す変数の名称とその連想配列を指定することで返すことができる

        return view('articles.index')->with(['articles' => $articles]);

        compact関数
        compact関数を使うと変数を連想配列形式で記述する必要がなくなる。コードがすっきりする。
        viewの変数とcontrollerで定義した変数の名前が一致する際、compact関数を使って返すことができる。

        return view('articles.index', compact('articles'));
        */
        return view('articles.index', ['articles' => $articles]);

    }
}
