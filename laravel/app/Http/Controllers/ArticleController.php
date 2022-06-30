<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Articleモデルを使用するためにimport 以後Articleという名前でArticleモデルを使用できる
use App\Article;

class ArticleController extends Controller
{
    /**
     * コントローラーの雛形作成コマンド
     * php artisan make:controller コントローラー名
     *
     */

    // インデックスアクションを定義する
    public function index() {
        /**
         * allメソッド
         * モデルテーブルの全レコードを結果として返すメソッド
         *
         * sortByDesc
         * 降順にソートして取得する
         * 
         * コレクション
         * PHPの配列を拡張したものでLaravelに用意されたクラス
         * コレクションは配列と同じように扱うことができるが、配列にはない様々なメソッドを使用することができる
         */
        $articles = Article::all()->sortByDesc('created_at');

        /**
         * viewメソッド
         * 第一引数:ビューファイル (今回はresources/views/articles/index)
         * 第二引数:ビューファイルに渡す変数の名称と、その変数の値を連想配列形式で指定する
         *
         * withメソッド
         * withメソッドの引数にビューファイルに渡す変数の名称とその連想配列を指定することで返すことができる
         * return view('articles.index')->with(['articles' => $articles]);
         *
         * compact関数
         * compact関数を使うと変数を連想配列形式で記述する必要がなくなる。コードがすっきりする。
         * viewの変数とcontrollerで定義した変数の名前が一致する際、compact関数を使って返すことができる。
         * return view('articles.index', compact('articles'));
         */
        return view('articles.index', ['articles' => $articles]);

    }
}
