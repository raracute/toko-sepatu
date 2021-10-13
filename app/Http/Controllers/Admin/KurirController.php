<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KurirController extends Controller
{
    public function index()
    {
        $data['kurir'] = DB::table('tb_kurir')->get();
        return view('admin.page.kurir.index', $data);
    }

    public function create()
    {
        return view('admin.page.kurir.create');
    }

    public function insert(Request $r)
    {
        $no_kendaraan_kurir = $r->no_kendaraan_kurir;
        $perusahaan_kurir = $r->perusahaan_kurir;
        $tipe_kurir = $r->tipe_kurir;
        $nama_kurir = $r->nama_kurir;
        $notelp_kurir = $r->notelp_kurir;
        $status_kurir = $r->status_kurir;
        $harga_kurir = $r->harga_kurir;
        $insert_data = DB::table('tb_kurir')->insert([
            'no_kendaraan_kurir' => $no_kendaraan_kurir,
            'perusahaan_kurir' => $perusahaan_kurir,
            'tipe_kurir' => $tipe_kurir,
            'nama_kurir' => $nama_kurir,
            'notelp_kurir' => $notelp_kurir,
            'status_kurir' => $status_kurir,
            'harga' => $harga_kurir
        ]);
        return redirect()->route('kurir_view');
    }

    public function edit($id_kurir)
    {
        $data['kurir'] = DB::table('tb_kurir')->where('id_kurir', $id_kurir)->first();
        return view('admin.page.kurir.edit', $data);
    }


    public function update(Request $r)
    {
        $no_kendaraan_kurir = $r->no_kendaraan_kurir;
        $perusahaan_kurir = $r->perusahaan_kurir;
        $tipe_kurir = $r->tipe_kurir;
        $nama_kurir = $r->nama_kurir;
        $notelp_kurir = $r->notelp_kurir;
        $status_kurir = $r->status_kurir;
        $id_kurir = $r->id_kurir;
        $harga_kurir = $r->harga_kurir;

        $data_update = DB::table('tb_kurir')->where('id_kurir', $id_kurir)->update([
            'no_kendaraan_kurir' => $no_kendaraan_kurir,
            'perusahaan_kurir' => $perusahaan_kurir,
            'tipe_kurir' => $tipe_kurir,
            'nama_kurir' => $nama_kurir,
            'notelp_kurir' => $notelp_kurir,
            'status_kurir' => $status_kurir,
            'harga' => $harga_kurir
        ]);

        return redirect()->route('kurir_view');
    }

    public function delete($id)
    {
        $data_delete = DB::table('tb_kurir')->where('id_kurir', $id)->delete();
        return redirect()->route('kurir_view');
    }
}
