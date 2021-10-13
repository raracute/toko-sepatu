<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokController extends Controller
{
    public function index()
    {
        $data['stok'] = DB::table('tb_stok')
            ->leftJoin('tb_sepatu', 'tb_stok.id_stok', '=', 'tb_sepatu.id_sepatu')
            ->get();
        // dd($data);
        return view('admin.page.stok.index', $data);
    }

    public function create()
    {
        $data['sepatu'] = DB::table('tb_sepatu')->get();
        return view('admin.page.stok.create', $data);
    }

    public function insert(Request $r)
    {
        $id_s = $r->id_sepatu;
        // dd($id_s);
        $t = DB::table('tb_sepatu')
            ->select('kode_sepatu', 'jumlah_Stok')
            ->where('id_sepatu', '=', $id_s)->first();

        // dd($t);
        $kode_sepatu = $t->kode_sepatu;
        $jumlah_Stok = $t->jumlah_Stok;
        $jumlah_stok_min = $r->jumlah_stok_min;
        $stok_harga_modal = $r->stok_harga_modal;
        $stok_harga_jual = $r->stok_harga_jual;
        $stok_terjual = $r->stok_terjual;
        $insert_data = DB::table('tb_stok')->insert([
            'kd_sepatu' => $kode_sepatu,
            'jml_Stok' => $jumlah_Stok,
            'jumlah_stok_min' => $jumlah_stok_min,
            'stok_harga_modal' => $stok_harga_modal,
            'stok_harga_jual' => $stok_harga_jual,
            'stok_terjual' => $stok_terjual
        ]);

        // dd($insert_data);
        return redirect()->route('stok_view');
    }


    public function delete($id)
    {
        $data_delete = DB::table('tb_stok')->where('id_stok', $id)->delete();
        return redirect()->route('stok_view');
    }
}
