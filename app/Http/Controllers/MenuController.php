<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $added_menu = Menu::all();
        return view('admin.menu_generator.welcome', compact('added_menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $current_menu = $id;
        $order_items = [];

        $items = json_decode(collect(Menu::findOrFail($id)->items)->sortBy('order')->map->only('id', 'name', 'title', 'url' ,'parent', 'order'));

        foreach ($items as $item) { 
            $order_items1 = [];
            $order_items8 = [];

            foreach ($items as $value) {
                if($item->id == $value->parent)  {
                    foreach ($items as $key=>$test){
                        if($value->id == $test->parent) {
                            $order_items8[] = ['name'=>$test->name, 'title'=>$test->title, 'url'=>$test->url, 'id'=>$test->id, 'parent'=>$value->parent];
                            }
                    }
                        $order_items1[] = ['name'=>$value->name, 'title'=>$value->title, 'url'=>$value->url, 'id'=>$value->id, 'parent'=>$value->id, 'children'=>$order_items8];
                }
            }            
            $lastId = (isset($item->id) && !empty($item->id)) ? $item->id : NULL;
            if(!$item->parent) {
                $order_items[] = ['name'=>$item->name, 'title'=>$item->title, 'url'=>$item->url, 'id'=>$lastId, 'children'=>$order_items1];
            }
        }

        $current = Menu::findOrFail($id);
        $menu_items = $order_items;
        return view('admin.menu_generator.menu.edit', compact('current', 'menu_items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {
        Menu::create($request->all());
        return redirect()->back()->with('success', 'Menu dodane poprawnie!'); 
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $findID = Menu::findOrFail($id);
        $findID->delete();
        return redirect()->back()->with('success', 'Menu skasowane poprawnie!');
    }
}
