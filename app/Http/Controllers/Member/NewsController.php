<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    //
    public function add()
    {
        return view('member.news.create');
    }

    public function create(Request $request)
    {
        return redirect('member/news/create');
    }
}
