<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = DB::table('tb_pembayaran')
            ->join('tb_transaksi', 'tb_pembayaran.id_transaksi', '=', 'tb_transaksi.id_transaksi')
            ->join('users', 'tb_transaksi.pelanggan_id', '=', 'users.id')
            ->join('tb_bank', 'tb_pembayaran.id_bank', '=', 'tb_bank.id')
            ->select('name', 'tanggal_pembayaran', 'tanggal_transaksi', 'nama_bank', 'bukti_pembayaran')
            ->get();

        $data['pembayaran'] = json_decode($pembayaran, true);
        return view('admin.page.pembayaran.index', $data);
    }
}
