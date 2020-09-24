<?php

namespace App\Http\Controllers;

use App\Form;
use App\Menu;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function save_items(Request $request) {
        $current_menu = intval($request->menu_id);
        $order_items = [];
        $order_items1 = [];
        $items = json_decode($request->data);
        foreach ($items as $item) {
            $lastId = (isset($item->id) && !empty($item->id)) ? $item->id : NULL;
            if(isset($item->children) && !empty($item->children)) {
                foreach ($item->children as $item_child) {
                    $last_childId = (isset($item_child->id) && !empty($item_child->id)) ? $item_child->id : NULL;
                    $order_items[] = ['name'=>$item_child->name, 'title'=>$item_child->title, 'url'=>$item_child->url, 'id'=>$last_childId, 'parent'=>$item->id];
                }
            }
            $order_items[] = ['name'=>$item->name, 'title'=>$item->title, 'url'=>$item->url, 'id'=>$lastId, 'children'=>$order_items1];
        }
        


        foreach($order_items as $key => $site) {
            if($site['id']) {
                Form::find($site['id'])->update([
                    'name' => $site['name'],
                    'title' => $site['title'],
                    'url' => $site['url'],
                    'menu_id' => $current_menu,
                    'parent' => (isset($site['parent']) && !empty($site['parent'])) ? $site['parent'] : NULL,
                    'order' => $key,
                ]);
            } else {
                Form::create([
                    'name' => $site['name'],
                    'title' => $site['title'],
                    'url' => $site['url'],
                    'menu_id' => $current_menu,
                    'parent' => (isset($site['parent']) && !empty($site['parent'])) ? $site['parent'] : NULL,
                    'order' => $key,
                ]);
            } 
        }







        $order_items2 = [];
        
        $items = json_decode(collect(Menu::findOrFail($current_menu)->items)->sortBy('order')->map->only('id', 'name', 'title', 'url' ,'parent', 'order'));

        foreach ($items as $item) { 
            $order_items1 = [];
            foreach ($items as $value) {
                if($item->id == $value->parent)  {
                        $order_items1[] = ['name'=>$value->name, 'title'=>$value->title, 'url'=>$value->url, 'id'=>$value->id, 'parent'=>$value->id];
                }
            }            
            $lastId = (isset($item->id) && !empty($item->id)) ? $item->id : NULL;
            if(!$item->parent) {
                $order_items2[] = ['name'=>$item->name, 'title'=>$item->title, 'url'=>$item->url, 'id'=>$lastId, 'children'=>$order_items1];
            }
        }


        $current = $current_menu; 
        return $order_items2;
    }

    public function delete_items(Request $request)
    {

        $current_menu = intval($request->menu_id);
        $order_items = [];
        $order_items1 = [];
        $items = json_decode($request->data);
        foreach ($items as $item) {
            $lastId = (isset($item->id) && !empty($item->id)) ? $item->id : NULL;
            if(isset($item->children) && !empty($item->children)) {
                foreach ($item->children as $item_child) {
                    $last_childId = (isset($item_child->id) && !empty($item_child->id)) ? $item_child->id : NULL;
                    $order_items[] = ['name'=>$item_child->name, 'title'=>$item_child->title, 'url'=>$item_child->url, 'id'=>$last_childId, 'parent'=>$item->id];
                }
            }
            $order_items[] = ['name'=>$item->name, 'title'=>$item->title, 'url'=>$item->url, 'id'=>$lastId, 'children'=>$order_items1];
        }
        

        $order_items2 = [];
        
        $items = json_decode(collect(Menu::findOrFail($current_menu)->items)->sortBy('order')->map->only('id', 'name', 'title', 'url' ,'parent', 'order'));

        foreach ($items as $item) { 
            $order_items1 = [];
            foreach ($items as $value) {
                if($item->id == $value->parent)  {
                        $order_items1[] = ['name'=>$value->name, 'title'=>$value->title, 'url'=>$value->url, 'id'=>$value->id, 'parent'=>$value->id];
                }
            }            
            $lastId = (isset($item->id) && !empty($item->id)) ? $item->id : NULL;
            if(!$item->parent) {
                $order_items2[] = ['name'=>$item->name, 'title'=>$item->title, 'url'=>$item->url, 'id'=>$lastId, 'children'=>$order_items1];
            }
        }


        $all_id = [];
        $all_database = [];
        $test = json_decode($request->data);
        foreach($test as $arr2){
            if(isset($arr2->id) && !empty($arr2->id)){
                if(isset($arr2->children) && !empty($arr2->children)) {
                    foreach($arr2->children as $test2){
                        $all_id[] = $test2->id;
                    }
                }
                $all_id[] = $arr2->id;
            }
        }
        $wszystkie = Menu::findOrFail($current_menu)->items->map->only('id')->all();
        foreach ($wszystkie as $key => $value) {
            $all_database[] = $value['id'];
        }

        //różnice pomiędzy baza, a przesłanymi 
        $result = array_diff($all_database, $all_id);
        foreach ($result as $key => $value) {
            $find = Form::find($value);
            $find->delete();
        }
  
        $order_items2 = [];
        
        $items = json_decode(collect(Menu::findOrFail($current_menu)->items)->sortBy('order')->map->only('id', 'name', 'title', 'url' ,'parent', 'order'));

        foreach ($items as $item) { 
            $order_items1 = [];
            foreach ($items as $value) {
                if($item->id == $value->parent)  {
                        $order_items1[] = ['name'=>$value->name, 'title'=>$value->title, 'url'=>$value->url, 'id'=>$value->id, 'parent'=>$value->id];
                }
            }            
            $lastId = (isset($item->id) && !empty($item->id)) ? $item->id : NULL;
            if(!$item->parent) {
                $order_items2[] = ['name'=>$item->name, 'title'=>$item->title, 'url'=>$item->url, 'id'=>$lastId, 'children'=>$order_items1];
            }
        }

        $current = $current_menu; 
        return $order_items2;
    }
}
