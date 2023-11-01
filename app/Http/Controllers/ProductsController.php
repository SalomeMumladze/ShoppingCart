<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Product;
use Session;
use DB;


class ProductsController extends Controller
{
    public function products(){
        $products = Product::All();
        return view('admin.products')->with('products', $products);
    }
    public function addproduct(){
        $categories= category::All();
       return view('admin.addproduct')->with('categories', $categories);
    }
    public function saveproduct(Request $request) {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_category'] = $request->product_category;
    
        // Check if a product_image file was uploaded
        if ($request->hasFile('product_image')) {
            $originalFileName = $request->file('product_image')->getClientOriginalName();
            $path = $request->file('product_image')->storeAs('public/product_images', $originalFileName);
            $fileNameToStore = $originalFileName;
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $data['product_image'] = $fileNameToStore;
        DB::table('products')->insert($data);
        return redirect('/addproduct');
    }
    
}
