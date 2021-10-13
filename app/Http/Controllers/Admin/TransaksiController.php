<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $data['transaksi'] = DB::table('tb_transaksi')
            ->join('users', 'tb_transaksi.pelanggan_id', '=', 'users.id')
            ->select(
                'users.email',
                'tb_transaksi.id_transaksi',
                'tb_transaksi.status',
                'tb_transaksi.alamat_pengiriman',
                'tb_transaksi.kurir_pengirim',
                'tb_transaksi.totalHarga',
                'tb_transaksi.ongkir',
                'tb_transaksi.metode_pembayaran',
            )
            ->get();

        return view('admin.page.transaksi.index', $data);
    }

    public function create()
    {
        $data['sepatu'] = DB::table('tb_sepatu')->get();
        $data['pelanggan'] = DB::table('tb_pelanggan')->get();
        $data['kurir'] = DB::table('tb_kurir')->get();
        return view('admin.page.transaksi.create', $data);
    }



    public function insert(Request $r)
    {
        $id_s = $r->id_sepatu;
        $t = DB::table('tb_sepatu')
            ->select('merek', 'harga')
            ->where('id_sepatu', '=', $id_s)->first();

        $id_p = $r->id_pelanggan;
        $p = DB::table('tb_pelanggan')
            ->select('id_pelanggan', 'alamat')
            ->where('id_pelanggan', '=', $id_p)->first();

        $id_k = $r->id_kurir;
        $k = DB::table('tb_kurir')

            ->select('id_kurir', 'perusahaan_kurir')
            ->where('id_kurir', '=', $id_k)->first();


        $id_pelanggan = $p->id_pelanggan;
        $merek = $t->merek;
        $alamat_pengiriman = $p->alamat;
        $totalharga = $t->harga;
        $kurir_id = $k->id_kurir;
        $kurir_pengirim = $k->perusahaan_kurir;
        $ongkir = $r->ongkir;
        $metode_pembayaran = $r->metode_pembayaran;

        $insert_data = DB::table('tb_transaksi')->insert([
            'pelanggan_id' => $id_pelanggan,
            'merek_sepatu' => $merek,
            'alamat_pengiriman' => $alamat_pengiriman,
            'totalharga' => $totalharga,
            'kurir_id' => $kurir_id,
            'kurir_pengirim' => $kurir_pengirim,
            'ongkir' => $ongkir,
            'metode_pembayaran' => $metode_pembayaran

        ]);

        // dd($insert_data);
        return redirect()->route('transaksi_view');
    }

    public function edit($id_transaksi)
    {
        $transaksi = DB::table('tb_transaksi')
            ->where('id_transaksi', $id_transaksi)
            ->first();

        $data['transaksi'] = $transaksi;
        return view('admin.page.transaksi.edit', $data);
    }

    public function update(Request $request)
    {
        DB::table('tb_transaksi')
            ->where('id_transaksi', $request->id_transaksi)
            ->update(['status' => $request->status]);

        return redirect()->route('transaksi_edit', ['id_transaksi' => $request->id_transaksi]);
    }

    public function delete($id)
    {
        $data_delete = DB::table('tb_transaksi')->where('id_transaksi', $id)->delete();
        return redirect()->route('transaksi_view');
    }
}
