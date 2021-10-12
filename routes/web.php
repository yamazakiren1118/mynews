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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'member'], function(){
    Route::get('news/create', 'Member\NewsController@add')->middleware('auth');

    // 課題追加分
    Route::get('profile/create', 'Member\ProfileController@add')->middleware('auth');
    Route::get('profile/edit', 'Member\ProfileController@edit')->middleware('auth');
});

// 課題追加分
Route::get('XXX','AAAController@bbb');


/*
URLとControllerやActionをひも付ける機能を何といいますか？
ルーティングと言います。
routes/web.phpで定義します。

あなたが考える、group化をすることのメリットを考えてみてください
admin/から始まるURLをまとめておけるため可読性が上がると考えます。
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
