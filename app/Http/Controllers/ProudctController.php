<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProudctController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.show_products',compact('products'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::all();
        return view('admin.product.add_product',compact('category'));
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
        $validate = $request->validate([
              'title' => 'required',
               'desc' => 'required',
               'price' => 'required',
               'img' => 'required',
               'category' => 'required',
               'quantity' => 'required',
        ]
        );
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->desc;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $prodct_img = $request->img;
        $img_name = time().'.'.$prodct_img->getClientOriginalExtension();
        $request->img->move(public_path('product_img'),$img_name);
        $product->image = $img_name;
        $product->save();
        return redirect()->back()->with('success','Product Added Successfully');

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
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.product.edit_product',compact('product','category'));
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
  //   return $request->all();   
        $validate = $request->validate([
            'title' => 'required',
             'desc' => 'required',
             'price' => 'required',
             'category' => 'required',
             'quantity' => 'required',
      ]
      );
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->desc;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
       if($request->hasFile('img')){
        $prodct_img = $request->img;
        $img_name = time().'.'.$prodct_img->getClientOriginalExtension();
        $request->img->move(public_path('product_img'),$img_name);
        $product->image = $img_name;
       }
        $product->save();
        return redirect('/product')->with('success','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success','Product Deleted Successfully');
    }
}
