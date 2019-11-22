<?php

namespace App\Http\Controllers\Front;

use App\Models\Menus;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;


class newsController extends Controller
{
    public function index()
    {
        $news = News::all(); // news tablosunu kullanmak için import et
        $menus=Menus::orderBy('order')->get();

        View::share('news', $news); //view import et
        View::share('menus', $menus);
        return view('Front.News.index');
    }
    public function view($id)
    {
        $news=News::find($id);
        $menus=Menus::orderBy('order')->get();
        View::share('news',$news);
        View::share('menus', $menus);
        return view('Front.News.view');
    }
}
