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
}
