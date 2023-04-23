<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function view_category(){
        $categories = Category::all();
        return view('admin.category',compact('categories'));
    }

    public function add_category(Request $req){
        $category= new Category();
        $category->category_name=$req->category;
        $category->save();
        return redirect()->back();
    }

    public function delete_category($id){
        $category= Category::find($id);
        $category->delete();
        return redirect()->back();
    }
}
