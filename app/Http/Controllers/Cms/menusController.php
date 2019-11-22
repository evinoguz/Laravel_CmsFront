<?php

namespace App\Http\Controllers\Cms;


use App\Models\Menus;
use App\Models\SubMenus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class menusController extends Controller
{
    public function index()
    {
        $menus = Menus::all();
        View::share('menus', $menus);
        return view('CMS.menu.list');
    }

    public function create()
    {
        return view('CMS.menu.create');
    }

    public function create_post(Request $request)
    {
        $menus = new Menus();
        $menus->title = $request->title;
        $menus->content = $request->contents;
        $menus->order = $request->order;
        $menus->save();
        return redirect()->route('CMS.menu.list');
    }

    public function createSub()
    {
        $menus = Menus::all();
        View::share('menus', $menus);
        return view('CMS.menu.createsub');
    }

    public function createSub_post(Request $request)
    {

        $menus = new SubMenus();
        $menus->menu_id = $request->menu_id;
        $menus->title = $request->title;
        $menus->content = $request->contents;
        $menus->order = $request->order;
        $menus->save();
        return redirect()->route('CMS.menu.list');


    }

    public function remove($id)
    {
        Menus::find($id)->delete();
        SubMenus::where('menu_id',$id)->delete();
        return redirect()->route('CMS.menu.list');
    }

    public function remove_subs($id)
    {
        SubMenus::find($id)->delete();
        return redirect()->route('CMS.menu.list');

    }

    public function edit($id)
    {
     $menus=Menus::find($id);
     View::share('menus',$menus);
     return view('CMS.menu.edit');
    }
    public function edit_post($id, Request $request)
    {
        $menus=Menus::find($id);
        $menus->title=$request->title;
        $menus->content=$request->contents;
        $menus->order=$request->order;
        $menus->save();
        return redirect()->route('CMS.menu.list');
    }


    public function  editSubs($id)
    {
        $menus=Menus::all();
        $subs=SubMenus::find($id);
        View::share('menus',$menus);
        View::share('subs',$subs);
        return view('CMS.menu.editsub');

    }
    public function editSubs_post($id, Request $request)
    {
        $subs=SubMenus::find($id);
        $subs->menu_id=$request->menu_id;
        $subs->title=$request->title;
        $subs->content=$request->contents;
        $subs->order=$request->order;
        $subs->save();
        return redirect()->route('CMS.menu.list');
    }

}
