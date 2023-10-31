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
        $categories = category::All();
        return view('admin.categories')->with('categories',$categories);
    }
    public function savecategory(Request $request){
        $data = array();
        $data['category_name'] = $request->category_name;

        DB::table('categories')->insert($data);

        return redirect('/addcategory');
    
    }
    public function editcategory(Request $request, $id){
        $category = category::find($id);
        return view('admin.edit_category')->with('category', $category);
    }
    public function updatecategory(Request $request){
        $category = category::find($request->input('id'));
        $category->category_name = $request->input('category_name');
        $category->update();

        return redirect('/categories');
    }
    public function deletecategory(Request $request, $id){
        $category = category::find($id);
        $category->delete();

        return redirect('/categories');
    }
}
