<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use \Milon\Barcode\DNS1D;

class CartController extends Controller
{
    public function index()
    {
        // dd('cart');
        $d = new DNS1D();
        $d->setStorPath(__DIR__ . '/cache/');

        $user = Auth::guard('buyer')->user();
        $orders = Order::where('user_id', $user->id)->get();
        return view('cart', ['orders' => $orders]);
    }
}
