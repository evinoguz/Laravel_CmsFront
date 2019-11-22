<?php

namespace App\Http\Controllers\Cms;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;


class newsController extends Controller
{
    public function index()
    {
        $news = News::all();
        View::share('news', $news);
        return view('CMS.news.list');
    }

    public function create()
    {
        return view('CMS.news.create');
    }

    public function create_post(Request $request)
    {
        $news = new News();
        $news->title = $request->title;
        $news->content = $request->contents;

        if ($request->has('img_url')) {
            $file = $request->img_url;
            $file->move(public_path() . '/images/news', $file->getClientOriginalName());
            $news->img_url = $file->getClientOriginalName();

        }

        $news->save();
        return redirect()->route('CMS.news.list');
    }

    public function remove($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect()->route('CMS.news.list');

    }

    public function edit($id)
    {
        $news = News::find($id);
        View::share('news', $news);
        return view('CMS.news.edit');
    }

    public function edit_post($id, Request $request)
    {
        $news = News::find($id);
        $news->title = $request->title;
        $news->content = $request->contents;
        if ($request->has('image')) {
            $file = $request->image;
            $file->move(public_path() . '/images/news', $file->getClientOriginalName());
            $news->img_url = $file->getClientOriginalName();
        }
        $news->save();
        return redirect()->route('CMS.news.list');
    }


}
