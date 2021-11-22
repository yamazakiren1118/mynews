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
    Route::post('news/create', 'Member\NewsController@create');
    Route::get('news', 'Member\NewsController@index')->middleware('auth');

    Route::get('news/edit', 'Member\NewsController@edit')->middleware('auth');
    Route::post('news/edit', 'Member\NewsController@update')->middleware('auth');
    Route::get('news/delete','Member\NewsController@delete')->middleware('auth');

    // 課題追加分
    Route::get('profile/create', 'Member\ProfileController@add')->middleware('auth');
    Route::post('profile/create', 'Member\ProfileController@create');

    Route::get('profile/edit', 'Member\ProfileController@edit')->middleware('auth');
    Route::post('profile/edit', 'Member\ProfileController@update');
    
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

Route::get('/', 'NewsController@index');