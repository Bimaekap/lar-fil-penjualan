<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyerLoginRequest;
use App\Models\User;
use App\Models\Buyer;
use App\userType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

use function Laravel\Prompts\alert;

class AuthBuyerController extends Controller
{
    public function login()
    {

        return view('login.login');
    }

    public function website()
    {
        return view('index');
    }
    public function register()
    {
        return view('login.register');
    }

    public function postlogin(Request $request)
    {
        // if (User::select('usertype') === 'buyer') {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->select('password')->get($request->email)->pluck('password');
        // dd($user[0]);
        Hash::check($request->password, $user[0]);
        if (Auth::attempt($credentials)) {
            // if (Auth::user()->usertype === 'buyer') {
            // dd('berhasil login');
            return redirect()->route('website.frontend');
        } else {
            dd('gagal login');
            return redirect()->back();
        }

        // $request->authenticate();

        // $request->session()->regenerate();

        // return redirect()->intended(route('website.frontend', absolute: false));
        // }

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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = $request->all();
        $buyer = $this->create($data);

        Auth::login($buyer);
        // dd('ok');
        return view('login.login');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'usertype' => userType::buyer->value,
            'password' => Hash::make($data['password'])
        ]);

        return redirect("buyer.login")->withSuccess('Great! You have Successfully loggedin');
    }

    public function logout(Request $request)
    {
        // dd('keluar');
        if (Auth::user()->usertype === 'buyer') {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
        }


        return redirect()->route('website.frontend');
    }
}
