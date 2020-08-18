<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::paginate(3);
        //dd($categories);

        return view('admin.category.index',[
            'categories'=>$categories
        ]);
       // return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('admin.category.create',  compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title'=>'required',
            'description'=>'required',

        ]);
        $categories = Categorie::create($request->only('title','description'));
       // $categories->child()->attach($request->parent_id,['created_at'=>now(), 'updated_at'=>now()]);
       if($categories){
        return back()->with('success','Category Added Successfully!');
       }else{
        return back()->with('error','Category Added Failed!');
       }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $category)
    {
        $categories = Categorie::all();
        return view('admin.category.edit',['categories'=>$categories, 'category'=>$category]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $category)
    {
        $request->validate([
            'title' => 'required',
        ]);
  
        $category->update($request->all());
  
        return redirect()->route('admin.category.index')
                        ->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $category)
    {
        $category->delete();
  
        return redirect()->route('admin.category.index')
                        ->with('delete','Category deleted successfully');
    }
}
