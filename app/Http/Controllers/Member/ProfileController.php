<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



use App\Profile;
use App\User;

use App\HistorieProfile;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function add()
    {
        $profile = Profile::all();
        // dd($profile);
        return view('member.profile.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = new Profile;
        $form = $request->all();

        unset($form['_token']);
        $profile->fill($form);

        $profile->user_id = Auth::id();
        $profile->save();
        
        return redirect('member/profile/create');
    }

    public function edit(Request $request)
    {
        // dd(Auth::user()->profile);
        // $profile = Profile::where('user_id', $request->id)->get();
        $profile = Auth::user()->profile;

        $history = new HistorieProfile;
        if(empty($profile)){
            abort(404);
        }
        return view('member.profile.edit', ['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id); 

        $form = $request->all();
        unset($form['_token']);
        // dd($profile);
        $profile->fill($form)->save();

        $history = new HistorieProfile;
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();

        return redirect('member/news');
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
