<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksitmpController extends Controller
{
    public function index()
    {
        $data['transaksitmp'] = DB::table('tb_transaksi_tmp')
            ->get();
        // dd($data);
        return view('admin.page.transaksitmp.index', $data);
    }


    public function create()
    {
        $data['sepatu'] = DB::table('tb_sepatu')->get();
        $data['stok'] = DB::table('tb_stok')->get();
        $data['diskon'] = DB::table('tb_diskon')->get();
        $data['pelanggan'] = DB::table('tb_pelanggan')->get();
        return view('admin.page.transaksitmp.create', $data);
    }

    public function insert(Request $r)
    {
        $id_s = $r->id_sepatu;
        $t = DB::table('tb_sepatu')
            ->select('kode_sepatu', 'harga')
            ->where('id_sepatu', '=', $id_s)->first();

        $id_st = $r->id_stok;
        $s = DB::table('tb_stok')
            ->select('id_stok', 'stok_harga_modal', 'stok_harga_jual')
            ->where('id_Stok', '=', $id_st)->first();


        $id_d = $r->id_diskon;
        $d = DB::table('tb_diskon')
            ->select('id_diskon', 'diskon_nominal')
            ->where('id_diskon', '=', $id_d)->first();

        $id_p = $r->id_pelanggan;
        $p = DB::table('tb_pelanggan')
            ->select('id_pelanggan')
            ->where('id_pelanggan', '=', $id_p)->first();


        $kode_sepatu = $t->kode_sepatu;
        $id_stok = $s->id_stok;
        $quantity = $r->quantity;
        $harga_modal = $s->stok_harga_modal;
        $harga_jual = $s->stok_harga_jual;
        $totalharga = $t->harga;
        $id_diskon = $d->id_diskon;
        $diskon_nominal = $d->diskon_nominal;
        $id_pelanggan = $p->id_pelanggan;

        $insert_data = DB::table('tb_transaksi_tmp')->insert([
            'kd_sepatu' => $kode_sepatu,
            'stok_id' => $id_stok,
            'quantity' => $quantity,
            'harga_modal' => $harga_modal,
            'harga_jual' => $harga_jual,
            'totalharga' => $totalharga,
            'diskon_id' => $id_diskon,
            'nominal_diskon' => $diskon_nominal,
            'pelanggan_id' => $id_pelanggan

        ]);
        return redirect()->route('transaksitmp_view');
    }

    public function delete($id)
    {
        $data_delete = DB::table('tb_transaksi_tmp')->where('id', $id)->delete();
        return redirect()->route('transaksitmp_view');
    }
}
