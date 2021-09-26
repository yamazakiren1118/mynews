<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create()
    {
        return redirect('admin/profile/create');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update()
    {
        return redirect('admin/profile/edit');
    }
}
/*
・ControllerとRoutingについてわからないこと
publicという記載はこのclassメソッドがどこからでも参照できます
みたいな認識なのですがpublicとつけない場合もあるのでしょうか？

・Controllerの役割
コントローラーはMVCのアプリでは処理全般を定義する部分であり
データを受け渡す、保存するといった処理のみを行います。
画面の部分の処理などはviewが担当するといった形にすることで
コードがわかりやすくなると認識しています。

・ControllerとRoutingの役割
前述のとおりコントローラーが処理を行いviewを呼び出すもので
ルーティングはどのようなhttp通信が来た場合にどのコントローラーに
処理を渡すかを定義するものであると認識しています。
ルーティング→コントローラー→view
の順番で処理が行われると考えています。

*/
