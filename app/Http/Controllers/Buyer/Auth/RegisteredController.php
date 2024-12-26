<?php

namespace App\Http\Controllers\Buyer\Auth;

use App\userType;
use App\Models\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredController extends Controller
{
    public function register()
    {
        return view('buyer.layout.register');
    }

    public function postRegister(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = $request->all();
        $this->create($data);
        return view('buyer.layout.login');
    }

    public function create(array $data)
    {
        return Buyer::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
