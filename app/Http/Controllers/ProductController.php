<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Barang::get();
        dd($products);
        return view('detail');
    }

    public function showProduct(string $id)
    {

        return view('detail');
    }
}
