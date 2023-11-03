<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Client;
use App\Cart;
use DB;
use Illuminate\Support\Facades\Hash;
use Session;


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
    public function addToCart($id){
        $product = DB::table('tbl_products')
                    ->where('id', $id)
                    ->first();

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart', $cart);

        dd(Session::get('cart'));
        // return redirect('/shop');
    }

    public function cart(){
        if(!Session::has('cart')){
            return view('client.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('client.cart', ['products' => $cart->items]);
    }

    public function updateQty(Request $request){
        //print('the product id is '.$request->id.' And the product qty is '.$request->quantity);
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->updateQty($request->id, $request->quantity);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect::to('/cart');
    }

    public function removeItem($product_id){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($product_id);
       
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }

        //dd(Session::get('cart'));
        return redirect::to('/cart');
    }
    public function checkout(){
        if(!Session::has('client')){
            return view('client.signin');
        }
        return view('client.checkout');
    }
    public function signin(){
        return view('client.signin');
    } 
    public function signup(){
        return view('client.signup');
    }  
    public function create_account(Request $request){
        $this->validate($request,['email'=>'email|required|unique:clients',
                                'password'=>'required|min:4']);
        $client = new Client();
        $client->email = $request->input('email');
        $client->password = bcrypt($request->input('password'));

        $client->save();
        return back();
    }     
    public function access_account(Request $request){
        $this->validate($request,['email'=>'email|required',
                                'password'=>'required']);
        $client = Client::where('email', $request->input('email'))->first();

        if($client){
            if (Hash::check($request->input('password'), $client->password)) {
                Session::put('client', $client);
                return redirect('shop');
            }else{
                return back();
            }
        }else{
            return back();
        }
        return back();
    } 
    public function logout(){
        Session::forget('client');
        return redirect('/shop');
    }
    public function order(){
        return view('admin.orders');
    }
}
