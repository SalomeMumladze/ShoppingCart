<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addcategory(){
        return view('admin.addcategory');
    }
    public function category(){
        return view('admin.categories');
    }
}
