<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Client;

class AdminController extends Controller
{
    public function dashboard(){
        $orders = Order::All();
        $clients = Client::All();
        return view('admin.dashboard')->with('orders', $orders)->with('clients', $clients);
    }
}
