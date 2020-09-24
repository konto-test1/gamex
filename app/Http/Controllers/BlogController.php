<?php

namespace App\Http\Controllers;
use Request;
use App\Http\Requests\CreateBlogRequest;
use App\Blog;
use App\Menu_builder;
use App\Menu_items;
use App\Category;
use Auth;
use App\Pages;
use Session;

class BlogController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource. 
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $pages = Pages::all();
        $blog = blog::paginate(10);
        $category = Category::all();
        return view('admin.blog.index', compact('pages', 'blog', 'category'));
    }

 



// FRONT
    public function blog()
    {         
        $pages = Pages::all();
        $blog = Blog::paginate(10);
        $categories = Category::all();
        $lista_produkty = blog::all();
        return view('oferta', compact('pages', 'blog', 'categories', 'lista_produkty'));
    }
    public function blogpost($slug){
        $current = Category::where('slug', $slug)->firstorfail();


        $lista_produkty = blog::where('category', $current->id)->paginate(12);
        $categories = Category::all(); 
        return view('templates.'.$current->templates, compact('categories', 'lista_produkty', 'slug', 'current'));
        // return view('blog', compact('categories', 'lista_produkty', 'slug', 'current'));
    }




    public function produkt($slug, $product){
        $current = Category::where('slug', $slug)->firstorfail();
        $lista_produkty = Blog::where('category', $current->id)->paginate(12);
        $categories = Category::all(); 
        $produkt = Blog::where('slug', $product)->firstorfail();
        return view('produkt', compact('categories', 'lista_produkty', 'produkt'));
    }
// koniec





    public function create()
    {
        $allblog = blog::all();
        $items = Menu_items::all();
        $categories = Category::all();

        return view('admin.blog.create', compact('items', 'allblog', 'categories'));
    }

    public function store(CreateBlogRequest $request)
    {
        $request['user_id'] = Auth::id();
        $request['slug'] = str_slug($request['title']);
        blog::create($request->all());
        return redirect('admin/blog');
    }

    public function show($id)
    {
        $page = blog::findOrFail($id);
        return view('admin/blog/show')->with('page', $page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allblog = blog::all();
        $page = blog::findOrFail($id);
        // return view('admin/blog/edit')->with('page', $page);
        return view('admin/blog/edit', compact('page', 'allblog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, CreateBlogRequest $request) 
    {
        $blog = blog::findOrFail($id);
        $blog->update($request->all());
        return redirect('admin/categories/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        blog::findOrFail($id)->delete();
        return redirect('/admin/categories');
    }
}
