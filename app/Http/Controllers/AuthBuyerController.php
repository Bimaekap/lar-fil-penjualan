<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthBuyerController extends Controller
{
    public function index()
    {
        $content = require 'frontend/index.blade.php';
        return $content;
    }

    public function register()
    {
        $content = require 'frontend/register.blade.php';
        return $content;
    }

    public function loginpost(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('You have Successfully loggedin');
        }

        return redirect("buyer.login")->withError('Oppes! You have entered invalid credentials');
    }
}
