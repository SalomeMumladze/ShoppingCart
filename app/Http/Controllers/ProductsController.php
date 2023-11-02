<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $data['status'] = $request->status=0;
    
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
    public function edit_product($id){
        $product= Product::find($id);
        $categories= category::All();
        return view('admin.editproduct')->with('product', $product)->with('categories', $categories);
    }
    public function updateproduct(Request $request){
        $product = Product::find($request->input('id'));
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_category = $request->input('product_category');
    
        // Check if a product_image file was uploaded
        if ($request->hasFile('product_image')) {
            $originalFileName = $request->file('product_image')->getClientOriginalName();
            $path = $request->file('product_image')->storeAs('public/product_images', $originalFileName);
    
            // Delete the old image if it's not the default 'noimage.jpg'
            if ($product->product_image != 'noimage.jpg') {
                Storage::delete('public/product_images/' . $product->product_image);
            }
    
            $product->product_image = $originalFileName;
        }
        $product->update();
        return redirect('/products');
    }
    
    public function deleteproduct(Request $request, $id){
        $product= Product::find($id);
        $product->delete();
       return redirect('/products');
    }
    public function activate_product(Request $request, $id){
        $product = Product::find($id);
        $product->status=1;
        $product->update();
        return redirect('/products');

    }    
    public function Unactivate_product(Request $request, $id){
        $product = Product::find($id);
        $product->status=0;
        $product->update();
        return redirect('/products');

    }
}
