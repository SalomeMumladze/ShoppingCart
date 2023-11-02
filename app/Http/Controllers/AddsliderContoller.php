<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Slider;
use Session;
use DB;

class AddsliderContoller extends Controller
{
    
    public function addslider(){
        return view('admin.addslider');
    }
    public function sliders(){
        $sliders = Slider::All();
        return view('admin.sliders')->with('sliders', $sliders);
    }
    public function saveslider(Request $request){
        $data = array();
        $data['description1'] = $request->description1;
        $data['description2'] = $request->description2;
        $data['status'] = $request->status=0;

        if ($request->hasFile('slider_image')) {
            $originalFileName = $request->file('slider_image')->getClientOriginalName();
            $path = $request->file('slider_image')->storeAs('public/slider_images', $originalFileName);
            $fileNameToStore = $originalFileName;
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $data['slider_image'] = $fileNameToStore;
        DB::table('sliders')->insert($data);

        return redirect('/sliders');
    }
    public function activate_slider(Request $request, $id){
        $slider = Slider::find($id);
        $slider->status=1;
        $slider->update();
        return redirect('/sliders');
    }
    public function Unactivate_slider(Request $request, $id){
        $slider = Slider::find($id);
        $slider->status=0;
        $slider->update();
        return redirect('/sliders');
    }
    public function editslider($id){
        $slider = Slider::find($id);
        return view('admin.editslider')->with('slider', $slider);
    }
    public function updateslider(Request $request){
        $slider = Slider::find($request->input('id'));
        $slider->description1 = $request->input('description1');
        $slider->description2 = $request->input('description2');

        // Check if a slider_image file was uploaded
        if ($request->hasFile('slider_image')) {
            $originalFileName = $request->file('slider_image')->getClientOriginalName();
            $path = $request->file('slider_image')->storeAs('public/slider_images', $originalFileName);
            
            // Delete the old image if it's not the default 'noimage.jpg'
            if ($slider->slider_image != 'noimage.jpg') {
                Storage::delete('public/slider_images/' . $slider->slider_image);
            }
            
            $slider->slider_image = $originalFileName;
        }

        $slider->update();
        return redirect('/sliders');
    }
    public function deleteslider($id){
        $slider = Slider::find($id);
        $slider->delete();
        return redirect('/sliders');
    }
}
