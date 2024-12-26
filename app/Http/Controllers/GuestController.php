<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        $products = Barang::all();
        if (Auth::guard('buyer')) {
            return view('index', ['products' => $products]);
        }
        // $user = Auth::user();
        // $request->session()->flush();
        // Auth::login($user);
    }
}
