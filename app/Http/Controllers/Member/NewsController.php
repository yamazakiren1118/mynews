<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



use App\News;
// use App\User;
// use Illuminate\Support\Facades\Hash;

class NewsController extends Controller
{
    //
    public function add()
    {
        return view('member.news.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, News::$rules);

        $news = new News;
        $form = $request->all();
        // dd($form,$request);

        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
        } else {
            $news->image_path = null;
        }
        

        unset($form['_token']);
        unset($form['image']);

        $news->fill($form);
        
        $news->save();
        return redirect('member/news/create');
    }

    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        
        if ($cond_title != '') {
            $posts = News::where('title', 'like', '%' . $cond_title . '%')->get();
        } else {
            $posts = News::all();
        }
        // User::create([
        //     'name' =>'森本',
        //     'email' =>'morimoto@tech.com',
        //     'password' => Hash::make("pass"),
        // ]);
        // dd($request->remove == 'true');
        // \Debugbar::info(User::all());
        return view('member.news.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }

    public function edit(Request $request)
    {
        $news = News::find($request->id);
        
        if (empty($news)) {
            abort(404);
        }
        return view('member.news.edit', ['news_form' => $news]);
    }

    public function update(Request $request)
    {
        $this->validate($request, News::$rules);

        $news = News::find($request->id);
        $news_form = $request->all();
        if ($request->remove == 'true') {
            $news_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $news_form['image_path'] = basename($path);
        } else {
            $news_form['image_path'] = $news->image_path;
        }

        unset($news_form['image']);
        unset($news_form['remove']);
        unset($news_form['_token']);

        $news->fill($news_form)->save();

        return redirect('member/news');
    }

    function delete(Request $request)
    {
        $news = News::find($request->id);
        $news->delete();
        return redirect('admin/news/');
    }
}
