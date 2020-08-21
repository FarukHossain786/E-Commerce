<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order;
use App\Categorie;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('categories')->paginate(6);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    { 
        
        $categories = Categorie::all();
        return view('admin.products.create',  compact('categories','product'));
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
            'price'=>'required | numeric',
            'status'=>'required | numeric',
            'thumbnail'=>'required |image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id'=>'required',
        ]);

        $ext =".".$request->thumbnail->getClientOriginalExtension();
        $name =basename($request->thumbnail->getClientOriginalName(), $ext).time();
        $name =$name.$ext;
        
        $path = $request->thumbnail->storeAs('images', $name, 'public');

        $products = Product::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'discount'=>($request->discount) ? $request->discount:0,
            'discount_price'=>($request->discount_price) ? $request->discount_price:0,
            'thumbnail'=>$path,
            'options'=>'',
            'featured'=>($request->featured) ? $request->featured:0,
            'status'=>$request->status,
            
            
        ]);
        if($products){
            $products->categories()->attach($request->category_id);
            return back()->with('message','Product successfully added');
        }
        else{
            return back()->with('error','Something going Wrong');
        }

    //    // $categories->child()->attach($request->parent_id,['created_at'=>now(), 'updated_at'=>now()]);
    //     return back()->with('success','Category Added Successfully!');
    //     dd( $request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $categories= Categorie::all();
        $products= Product::paginate(9);
        return view('products.all', compact('categories','products'));
    }
    public function single(Product $product){
        return view('products.single', compact('product'));
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $products = Product::with('categories')->paginate(3);
        return view('admin.products.edit', compact('products', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // $request->validate([
        //     'title'=>'required',
        //     'description'=>'required',
        //     'price'=>'required | numeric',
        //     'status'=>'required | numeric',
        //     //'thumbnail'=>'required |image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //    // 'category_id'=>'required',
        // ]);
  
        // $product->update($request->all());
  
        // return redirect()->route('admin.product.index')
        //                 ->with('success','Category updated successfully');

        if($request->has('thumbnail')){
            Storage::delete($product->thumbnail);
           $extension = ".".$request->thumbnail->getClientOriginalExtension();
           $name = basename($request->thumbnail->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->thumbnail->storeAs('images', $name, 'public');
           $product->thumbnail = $path;
         }
        $product->title =$request->title;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->featured = ($request->featured) ? $request->featured : 0;
        $product->price = $request->price;
        $product->discount = $request->discount ? $request->discount : 0;
        $product->discount_price = ($request->discount_price) ? $request->discount_price : 0;
        $product->categories()->detach();
        
        if($product->save()){
            $product->categories()->attach($request->category_id, ['created_at'=>now(), 'updated_at'=>now()]);
            return redirect(route('admin.product.index'))->with('success', "Product Successfully Updated!");
        }else{
            return back()->with('error', "Error Updating Product");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
  
        return redirect()->route('admin.product.index')
                        ->with('delete','Product deleted successfully');
    }
//  function for searching product
    public function searchProducts(Request $request)
    {
        $request->validate([
            'query'=>'required|min: 3'
        ]);
        $query =$request->input('query');
        $products =Product::where('title','like', "%$query%")
                            ->orWhere('description','like', "%$query%")
                            ->paginate(9);
       return view('products.searchProducts')->with('products', $products);
    }
// end serch

// Category by for navber
    public function headphoneProduct()
    {
        $category = Categorie::find(27);
        $products = $category->productsCat;
        return view('subCat.headphone', compact('products'));
        
    }

    public function mobileProduct()
    {
        $category = Categorie::find(17);
        $products = $category->productsCat;
        return view('subCat.mobile', compact('products'));
        
    }

    public function laptopProduct()
    {
        $category = Categorie::find(16);
        $products = $category->productsCat;
        return view('subCat.laptop', compact('products'));
        
    }

    public function chargerProduct()
    {
        $category = Categorie::find(23);
        $products = $category->productsCat;
        return view('subCat.charger', compact('products'));
        
    }

    public function accessoriesProduct()
    {
        $category = Categorie::find(18);
        $products = $category->productsCat;
        return view('subCat.accessories', compact('products'));
        
    }
    //sub category end

    
}
