<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //

    public function login()
    {
        return view('login.login');
    }

    public function qrcode()
    {
        return view('filament.resources.order-resource.pages.view-qr-code');
    }
}
