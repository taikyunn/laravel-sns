<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * モデル名は単数形で
 * モデル作成コマンド
 * docker-compose exec workspace php artisan make:model Article
 *
 * Laravelではデータベースとモデルを関連づける機能がEloquent ORM(Eloquent Object Relational Mapping)という名前絵である。
 * Eloquent=モデルだと解釈すること
 */
class Article extends Model
{
    /**
     * リレーションを返すuserメソッドを作成しておくと、$article->user->nameとコードを書くことで記事モデルから紐づくユーザーモデルのプロパティにアクセスできる
     *
     * ユーザー:記事 = 1対多 の関係
     * よって記事モデルからユーザーモデルに対するリレーションはBelongToを使用する
     *
     * 上記以外の関係は以下のメソッドを使用
     *
     * 1対1:hasOneメソッド
     * 1対多:hasManyメソッド
     * 多対多:belongsToManyメソッド
     */

    /**
     * : BelongsTo
     * これはメソッドの戻り値の型を宣言している(PHP7で使用できる)
     * ここではuserメソッドの戻り値がBelongsToクラスであることを宣言している
     * 仮に返り値がBelongsToクラスではない場合、TypeErrorが発生する
     * 型宣言を行うことで、安全性と可読性の向上が見込める
     */
    public function user(): BelongsTo
    {
        /**
         * belongsToメソッド
         * 引数には関係するモデルの名前を文字列で指定する
         * 指定するとbelongsToメソッドは関係するモデルとのリレーションを返す
         *
         * 今回はカラム名を一切設定せずに指定できている
         * これはuserテーブルの主キーはid,articleテーブルの外部キーは関連するテーブルの単数形_id(つまりuser_id)であるという前提のもとLaravel側で処理をしているため
         * このような命名規則になっていないと、belongsToメソッドについかで引数を渡す必要が出てくる
         * 
         * 公式ドキュメントの引用
         * Eloquentはリレーションメソッド名に_idのサフィックスを付けた名前をデフォルトの外部キー名とします。
         * しかしPhoneモデルの外部キーがuser_idでなければ、belongsToメソッドの第２引数にカスタムキー名を渡してください。
         * 
         * つまりLaravel側はメソッド名_idをデフォルトの外部キー名として処理する
         * 今回の場合メソッド名がuserなので、user_idであるとデフォルトで判断している
         * つまりメソッド名が違う場合はモデルとして作用しなくなる。
         * 
         * またApp\Userはおそらく相対パスを\を使って表現しているものと思われる
         * 今回は既にUserモデルがapp配下に作成済みだったため使用できた。
         */

         /**
          * ()の有無によって取得値が変わってくるので注意すること
          * 例えば、$article->user()ではUserモデルは取得できないので注意
          *
          * $article->user;         //-- Userモデルのインスタンスが返る
          * $article->user->name;   //-- Userモデルのインスタンスのnameプロパティの値が返る
          * $article->user->hoge(); //-- Userモデルのインスタンスのhogeメソッドの戻り値が返る
          * $article->user();       //-- BelongsToクラスのインスタンスが返る
          */
        return $this->belongsTo('App\User');
    }
}
