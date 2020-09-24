<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Gornymedia\Shortcodes\Facades\Shortcode;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $blog = category::paginate(10); 
        return view('admin.categories.index', compact('blog'))->compileShortcodes();
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $templates = $this->get_templates();
        return view('admin.categories.create', compact('templates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['slug' => str_slug($request['name'])]);
        Category::create($request->all());
        
        return redirect('admin/categories');
    }

    /**
     * Display the specified resource. 
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response 
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $templates = $this->get_templates();
        $page = $category;
        return view('admin/categories/edit', compact('page', 'templates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category = Category::findOrFail($category->id);
        $category->update( $request->all() );
        return redirect('admin/categories/'.$category->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Category $category)
    // {
    //     //
    // }
    public function destroy($id)
    {
        category::findOrFail($id)->delete();
        return redirect('/admin/categories');
    }
    public function get_templates(){
        
        // $files = File::allFiles(config('ap.default.page_templates'));
        $files = File::allFiles(resource_path('views/templates')); 
        $templates = [];

        foreach ($files as $file)
        {
            $path_info = pathinfo($file);
            $repl = str_replace('.blade', '', $path_info['filename']);
            $templates[] = $repl;
        }
        return  $templates;
    }
}
