<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * トレイトの宣言
     *
     * 以下のメソッドはこのクラス内では定義されておらず、トレイト内で記載されている
     *
     * RegisterController@showRegistrationForm
     * RegisterController@register
     *
     * メソッドが見つからなかった場合はトレイトを疑うか、関数名で検索をかけると良さそう
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     * redirectToプロパティを設定
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            /**
             * 必須・文字列・英文字であるか・3文字以上16文字まで・ユニークな名前か
             * unique:カラム名がリストされたパラメータ名と異なる場合にはテーブル名の後に間まで区切ってカラム名を指定すること
             * 'nickname' => ['unique:users,name']
            */
            'name' => ['required', 'string', 'alpha_num', 'min:3', 'max:16', 'unique:users'],
            // 必須・文字列・メールアドレス形式・最大255文字・他のメールアドレスと被らない
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 必須・文字列・最小8文字・自分の項目_confirmedという別の項目(password_confirmed)と一致
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
