<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Order;
use App\Models\Barang;
use Milon\Barcode\DNS2D;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Barang::all();
        return view('index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::guard('buyer')->user();
        $total = ($request->jumlah * $request->harga);
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
        ]);
        $no_pesanan = rand(200, 31512);
        $namaQrcode = $no_pesanan;
        $qrcode = QrCode::size(500)->format('png')->margin(2)->generate($no_pesanan, base_path() . '/storage/app/public/' . $namaQrcode . '.png');
        Order::create(
            [
                'user_id' => $user->id,
                'username' => $user->nama,
                'nama_barang' => $request->nama_barang,
                'harga' => 'Rp.' . $request->harga,
                'jumlah' => $request->jumlah,
                'total' => 'Rp.' . $total,
                'no_pesanan' => $no_pesanan,
                'gambar' => $request->gambar,
                'qr_code' => $namaQrcode,
            ]
        );
        return redirect()->back();
    }


    public function contact()
    {
        return view('contact');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = Barang::findOrFail($id);
        $allProducts = Barang::all();
        // dd($allProducts);
        return view('detail', ['products' => $products], ['allProducts' => $allProducts]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd('ok');
    }
}
