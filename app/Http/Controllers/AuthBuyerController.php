<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyerLoginRequest;
use App\Models\User;
use App\Models\Buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class AuthBuyerController extends Controller
{
    public function index()
    {

        return view('login.login');
    }

    public function register()
    {
        return view('login.register');
    }

    public function postlogin(BuyerLoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('website.frontend', absolute: false));
        // $request->validate([
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);

        // $credentials = $request->only('email', 'password');
        // if ($credentials) {
        //     return redirect()->intended(route('website.frontend'))
        //         ->withSuccess('You have Successfully loggedin');
        // }
        // dd('GAGAL LOGIN');
        // return redirect("buyer.login")->withError('Oppes! You have entered invalid credentials');
    }

    public function postRegister(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = $request->all();
        $buyer = $this->create($data);

        Auth::login($buyer);

        return view('login.login');
    }

    public function create(array $data)
    {
        return Buyer::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect("buyer.login")->withSuccess('Great! You have Successfully loggedin');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('buyer')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->back();
    }
}
