<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Session;
use DB;


class CategoryController extends Controller
{
    public function addcategory(){
        return view('admin.addcategory');
    }
    public function category(){
        return view('admin.categories');
    }
    public function savecategory(Request $request){
        // $this->validate($request, ['category_name' => 'required|unique:categories']);

        // $category = new category();
        // $category->category_name = $request->input('category_name');
        // $category->save();

        // return back()->with('status', 'the category name has been successfully saved');
       
        $data = array();
        $data['category_name'] = $request->category_name;

        DB::table('categories')->insert($data);

        Session::put('success', 'this category has been added successfully');
        return redirect('/addcategory');
    
    }
}
