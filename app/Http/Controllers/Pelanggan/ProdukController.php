<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = DB::table('tb_sepatu')->limit(50)->get();

        $data['produk'] = $produk;
        return view('pelanggan.page.product', $data);
    }
}
