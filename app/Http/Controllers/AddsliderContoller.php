<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddsliderContoller extends Controller
{
    
    public function addslider(){
        return view('admin.addslider');
    }
    public function slider(){
        return view('admin.sliders');
    }
}
