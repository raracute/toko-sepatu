<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function index($kode_sepatu)
    {
        $detail = DB::table('tb_sepatu')
            ->leftJoin('tb_diskon', 'tb_sepatu.id_sepatu', '=', 'tb_diskon.id_sepatu')
            ->join('tb_kategori', 'tb_sepatu.kategori_id', '=', 'tb_kategori.id_kategori')
            ->select(
                'tb_sepatu.id_sepatu as id_sepatu',
                'merek',
                'kode_sepatu',
                'ukuran',
                'harga',
                'jumlah_stok',
                'gambar',
                'id_diskon',
                'diskon_nominal',
                'diskon_status',
                'kategori',
                'ket'
            )
            ->where("kode_sepatu", $kode_sepatu)->first();
        // $ket_detail = DB::table('tb_kategori');
        // dd($detail);
        return view('pelanggan.page.detail', [
            'detail' => $detail,
        ]);
    }
}
