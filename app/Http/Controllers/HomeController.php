<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function home(){
        $userType = \Auth::user()->userType;
        if($userType == 1){
            return view('admin.index');
        }
        return view('home.index');
    }
}
