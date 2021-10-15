<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('keyword');
        $produk = DB::table('tb_sepatu')
            ->where('merek', 'like', '%' . $keyword . '%')
            ->get();

        $data['produk'] = $produk;
        return view('pelanggan.page.product', $data);
    }
}
