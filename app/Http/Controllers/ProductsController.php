<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function products(){
        return view('admin.products');
    }
    public function addproduct(){
        return view('admin.addproduct');
    }
}