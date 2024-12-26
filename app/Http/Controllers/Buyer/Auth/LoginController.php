<?php

namespace App\Http\Controllers\Buyer\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\Barang;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::guard('buyer')->guest()) {
            return view('buyer.layout.login');
        }
    }

    public function shop()
    {
        $products = Barang::all();
        // dd('ok');
        return view('index', ['products' => $products]);
    }

    public function postLogin(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = Buyer::where('email', $request->email)->select('password')->get($request->email)->pluck('password');
        Hash::check($request->password, $user[0]);
        if (Auth::guard('buyer')->guest()) {
            if (Auth::guard('buyer')->attempt($credentials)) {
                return redirect()->route('buyers.index');
                // if (Auth::user()->usertype === 'buyer') {
            } else {
                dd('gagal login');
                // return redirect()->intended(back());
            }
        } else {
            dd('gagal');
        }
    }


    public function logout(Request $request)
    {
        if (Auth::guard('buyer')->guest()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('buyers.index');
        }
    }
}
