@extends('layouts.member')
@section('title', 'ニュースの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ニュースの編集</h2>
                <form action="{{ action('Member\NewsController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label for="title" class="col-md-2">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $news_form->title}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="body" class="col-md-2">本文</label>
                        <div class="col-md-10">
                            <textarea rows="20" class="form-control" name="body" >{{ $news_form->body}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $news_form->image_path}}
                                <img src="{{asset('storage/image/' . $news_form->image_path)}}" alt="">
                            </div>
                            <div class="form-check">
                                <label for="" class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="body" class="col-md-2">本文</label>
                        <div class="col-md-10">
                            <input type="hidden" name="id" value={{ $news_form->id }}>
                            {{ csrf_field() }}
                            <input type="submit" value="更新" class="btn btn-primary">
                        </div>
                    </div>
                </form>
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($news_form->histories != NULL)
                                @foreach($news_form->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection