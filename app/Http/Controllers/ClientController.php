<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Product;
use App\Models\Slider;


class ClientController extends Controller
{
    public function home(){
        $sliders = Slider::All()->where('status', 1);
        $products = Product::All()->where('status', 1);
        return view('client.home')->with('sliders', $sliders)->with('products', $products);
    }
    public function shop(){
        $products = Product::All()->where('status', 1);
        $categories = category::All();
        return view('client.shop')->with('products', $products)->with('categories', $categories);
    }
    public function cart(){
        return view('client.cart');
    }
    public function checkout(){
        return view('client.checkout');
    }
    public function signin(){
        return view('client.signin');
    } 
    public function order(){
        return view('admin.orders');
    }
}
