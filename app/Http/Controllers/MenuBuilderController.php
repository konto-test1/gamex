<?php

namespace App\Http\Controllers;

use App\Menu_builder;
use App\Menu_items;
use Illuminate\Http\Request;

class MenuBuilderController extends Controller
{
    public function delete_menu(Request $request)
    {
        $items = Menu_builder::findOrFail($request->id)->children;
        foreach ($items as $key => $value) {
            if(isset($items) && !empty($items)){
                $items[$key]->delete();
            }
        };
        Menu_builder::findOrFail($request->id)->delete();
        return redirect()->route('menu_builder');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_list = Menu_builder::all();
        return view('admin.menu_builder.index', compact('menu_list'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register_menu()
    {
        return view('admin.menu_builder.register_menu');
    }

    public function edit_menu(Request $request)
    {
        $menu_id = $request->id;
        $menu = Menu_builder::findOrFail($menu_id);
        $items = Menu_builder::findOrFail($menu_id)->children->where('parents_items', '!=',null);
        $children = Menu_builder::findOrFail($menu_id)->children->where('parents_items', '==',null);
        // dd(Menu_builder::findOrFail($menu_id)->menu_title);
        return view('admin.menu_builder.edit_menu', compact('menu', 'items', 'children'));
    }
    public function update_menu(Request $request)
    {
        $menu_info = Menu_builder::findOrFail($request->id);
        $menu_info->menu_title = $request->menu_title;
        $menu_info->menu_desc = $request->menu_desc;
        $menu_info->update();

        $items = Menu_builder::findOrFail($request->id)->children;
        $menuID = Menu_builder::where('menu_title', $menu_info->menu_title)->first()->id;
$all = $request->page_name;
foreach ($all as $key => $value) {
    if($key < count($items) && isset(Menu_builder::findOrFail($request->id)->children[$key]) )
    {
        $menu = Menu_builder::findOrFail($request->id)->children[$key];
        $menu->page_name = $request->page_name[$key];
        $menu->page_title = $request->page_title[$key];
        $menu->page_parent = $request->page_parent[$key];
        $menu->parents_items = $request->parents_items[$key];
        $menu->page_number = $request->page_number[$key];
        $menu->update();
    }
    else {
        $menu = new Menu_items();
        $menu->menu_id = $menuID;
        $menu->page_name = $request->page_name[$key];
        $menu->page_title = $request->page_title[$key];
        $menu->page_parent = $request->page_parent[$key];
        $menu->parents_items = $request->parents_items[$key];
        $menu->page_number = $request->page_number[$key];
        $menu->save();
    }
}
        return back();
    }

    public function store_menu(Request $request)
    {
        $title_req = $request->menu_title;
        $desc_req = $request->menu_desc;

        $page_name_req = $request->page_name;
        $page_title_req = $request->page_title;
        $page_parent = $request->page_parent;
        $parents_items = $request->parents_items;
        $page_number = $request->page_number;
       
        $menu = new Menu_builder();
            $menu->menu_title = $title_req;
            $menu->menu_desc = $desc_req;
        $menu->save();

        $menuID = Menu_builder::where('menu_title', $title_req)->first()->id;
        // dd($menuID);

        foreach ($page_name_req as $key => $value) {
            $menu = new Menu_items();
            $menu->menu_id = $menuID;
            $menu->page_name = $page_name_req[$key];
            $menu->page_title = $page_title_req[$key];
            $menu->page_parent = $request->page_parent[$key];
            $menu->parents_items = $request->parents_items[$key];
            $menu->page_number = $request->page_number[$key];
            $menu->save();
        }
        
        
        // zwraca: link => nazwa
        // muszę to zapisać do bazy -> zapisywać będę napewno ID automatyczny, linki i nazwy w jednym? dopisywać mu nazwę title 

        
        // w bazie:
        // ID | LINK | NAZWA | NAZWA MENU | można jeszcze dodać kolejność | parent_id
        // 1 | /oferta | Oferta | Footer_menu | 1 | 1
        // 2 | /onas | O nas | Footer_menu  | 2 | null


        // podgląd:
        // "https://allegro.pl/" => "Allegro" 
        // "https://www.facebook.com/gradziu31" => "facebook"
        // "https://www.youtube.com" => "youtube"
        return back();
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu_builder  $menu_builder
     * @return \Illuminate\Http\Response
     */
    public function show(Menu_builder $menu_builder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu_builder  $menu_builder
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu_builder $menu_builder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu_builder  $menu_builder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu_builder $menu_builder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu_builder  $menu_builder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu_builder $menu_builder)
    {
        //
    }
}
