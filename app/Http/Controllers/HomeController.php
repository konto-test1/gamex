<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;
use App\Blog;
use App\Menu_builder;
use App\Menu_items;
use App\Category;
use Auth;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) 
    {
        // uprawnienia ! dla każdego sprawdzam w ten sposób!!!!!!
        //  $request->user()->authorizeRoles(['admin', 'moderator', 'user']);

            $pages = Pages::all();
            // $menuInfo = Menu_builder::where('menu_title', 'test')->firstorfail();
            // $menu = Menu_builder::where('menu_title', 'test')->firstorfail()->children;
            $products = Blog::all();
            if(count(Menu_builder::all())){
                $menuInfo = Menu_builder::all()->first(); 
                $menu = Menu_builder::all()->first()->children;
                $categories = Category::all();
                // dd($menu);
            } else {
                $menuInfo = null;
                $menu = null;
            }
    
            return view('home', compact('pages', 'menu', 'menuInfo', 'categories', 'products'));
            // return view('home', compact('pages', 'menu', 'menuInfo'));
    }
    public function contact(Request $request) 
    {
        // uprawnienia ! dla każdego sprawdzam w ten sposób!!!!!!
        //  $request->user()->authorizeRoles(['admin', 'moderator', 'user']);

            $pages = Pages::all();
            // $menuInfo = Menu_builder::where('menu_title', 'test')->firstorfail();
            // $menu = Menu_builder::where('menu_title', 'test')->firstorfail()->children;

            // dd($menu);
            if(count(Menu_builder::all())){
                $menuInfo = Menu_builder::all()->first();
                $menu = Menu_builder::all()->first()->children;
                // $children = Menu_builder::all()->first()->children->where('parents_items', '==',null);
                $categories = Category::all();
                // dd($menu);
            } else {
                $menuInfo = null;
                $menu = null;
            }
    
            return view('contact', compact('pages', 'menu', 'menuInfo', 'categories'));
            // return view('home', compact('pages', 'menu', 'menuInfo'));
    }

    public function show($slug = null)
    {
        $pages = Pages::all();
        $current = Pages::where('slug', $slug)->first(); 
        if($slug == null) {
            $current = Pages::where('slug', 'home')->firstorfail();
        }
        $products = Blog::all();

        if(!$current) {
            return abort(404);
        } else {
            if(count(Menu_builder::all())){
                $menuInfo = Menu_builder::all()->first();
                $menu = Menu_builder::all()->first()->children;
                $categories = Category::all();
            } else {
                $menuInfo = null;
                $menu = null; 
            } 
            
            return view('templates.'.$current->templates, compact('pages', 'current', 'categories', 'products'));
        } 
    }

    public function childshow($slug, $childslug)
    {
        $current = Pages::where('slug', $childslug)->firstorfail();
        $pages = Pages::all();
        return view('test', compact('pages', 'current'));
    }

    

    public function changepass(Request $request){
        return view('admin.changePassword');
    }
    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Twoje obecne hasło nie jest zgodne z podanym hasłem. Proszę spróbuj ponownie.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Nowe hasło nie może być takie samo, jak aktualne hasło. Wybierz inne hasło.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user(); 
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Hasło zostało zmienione pomyślnie !");

    }
}
