<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function home(){
        $products = Product::paginate(4);
        return view('home.index',compact('products'));
    }

    public function product_details($id){
        
        $product = Product::find($id);
        return view('home.product_details',compact('product'));
    }
}
