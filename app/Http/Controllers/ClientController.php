<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Client;
use App\Models\Order;
use App\Cart;
use DB;
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
        $product = Product::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart', $cart);

        // dd(Session::get('cart'));
        return redirect('/shop');
    }

    public function cart(){
        if(!Session::has('cart')){
            return view('client.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('client.cart', ['products' => $cart->items]);
    }

    public function update_qty(Request $request, $id){
        // return('the product id is '.$request->id.' And the product qty is '.$request->quantity);
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->updateQty($request->id, $request->quantity);
        Session::put('cart', $cart);

        // dd(Session::get('cart'));
        return redirect('/cart');
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
        return redirect('/cart');
    }
    public function checkout(){
        if(!Session::has('client')){
            return view('client.signin');
        }

        if(!Session::has('cart')){
            return view('client.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('client.checkout',['products' => $cart->items]);
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
        $this->validate($request,['email'=>'email|required','password'=>'required']);
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
        $orders = Order::All();
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('admin.orders')->with('orders', $orders);
    }
    public function postcheckout(Request $request){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);

        $order=new Order();
        $order->name=$request->input('name');
        $order->address=$request->input('address');
        $order->cart = serialize($cart);

        $order->save();
        Session::forget('cart');
        return redirect('/cart');
    }
}
