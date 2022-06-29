<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     /**
      * マイグレーションファイル作成コマンド
      * 年月日時分秒_create_articles_table.phpというマイグレーションファイルの作成
      *  php artisan make:migration create_articles_table
      *
      * オプション
      * -- createオプション
      * 新規テーブルを作成する際に設定する
      * (例)articleテーブルを作成したい
      * php artisan make:migration create_articles_table --create=articles
      *
      * --tableオプション
      * テーブルの構造を変更したいときに設定
      * (例):testsテーブルの構造を変更したい
      * php artisan make:migration add_column_to_tests_table --table=tests
      *
      *
      */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('body');
            $table->bigInteger('user_id');
            /**
             * 外部キー制約
             * 意味:articleテーブルのuser_idカラムは、usersテーブルのidカラムを参照すること
             */
            $table->foreign('user_id')->references('id')->on('users');
            /**
             * $table->timestamps();
             * 上記だけでcreated_atとupdated_atの二つのカラムを作成することができる
             */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
    /**
     * php artisan migrate
     * アプリケーションで用意したマイグレーションを全部実行するコマンド
     */
}
