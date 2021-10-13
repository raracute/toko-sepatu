<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SepatuController extends Controller
{
    public function index()
    {
        $data['sepatu'] = DB::table('tb_sepatu')
            ->leftJoin('tb_kategori', 'tb_sepatu.kategori_id', '=', 'tb_kategori.id_kategori')
            ->get();
        // dd($data);
        return view('admin.page.sepatu.index', $data);
    }

    public function create()
    {
        $data['kategori'] = DB::table('tb_kategori')->get();
        return view('admin.page.sepatu.create', $data);
    }

    public function insert(Request $r)
    {
        // dd($r->all());
        $merek = $r->merek;
        $kd_sepatu = $r->kode_sepatu;
        $ukuran = $r->ukuran;
        $id_kategori = $r->id_kategori;
        $harga = $r->harga;
        $jumlahstok = $r->jumlah_Stok;

        $filename = time() . "." . $r->gambar->getClientOriginalExtension();
        $r->file('gambar')->move('img', $filename);
        $save = DB::table('tb_sepatu')->insert([
            'merek' => $merek,
            'kode_sepatu' => $kd_sepatu,
            'ukuran' => $ukuran,
            'kategori_id' => $id_kategori,
            'harga' => $harga,
            'jumlah_Stok' => $jumlahstok,
            'gambar' => $filename
        ]);

        // dd($save);
        //return redirect()->route('sepatu_view');
        if ($save == TRUE) {
            return redirect()->route('sepatu_view')->with('success', 'Data Berhasil Disimpan');
        } else {
            return back()->with('error', 'Data Gagal Disimpan');
        }
    }

    public function edit($id)
    {
        $data['sepatu'] = DB::table('tb_sepatu')->where('id_sepatu', $id)->first();
        $data['kategori'] = DB::table('tb_kategori')->get();
        return view('admin.page.sepatu.edit', $data);
    }

    public function update(Request $r)
    {
        // dd($r->all());
        $merek = $r->merek;
        $kd_sepatu = $r->kode_sepatu;
        $ukuran = $r->ukuran;
        $id_kategori = $r->id_kategori;
        $harga = $r->harga;
        $jumlahstok = $r->jumlah_Stok;
        $id = $r->id;


        if ($r->file('gambar') == NULL) {
            $update = DB::table('tb_sepatu')->where('id_sepatu', $id)->update([
                'merek' => $merek,
                'kode_sepatu' => $kd_sepatu,
                'ukuran' => $ukuran,
                'kategori_id' => $id_kategori,
                'harga' => $harga,
                'jumlah_Stok' => $jumlahstok

            ]);
        } else {
            File::delete('img/' . $r->fotolama);

            $filename = time() . "." . $r->gambar->getClientOriginalExtension();
            $r->file('gambar')->move('img', $filename);

            $merek = $r->merek;
            $kd_sepatu = $r->kode_sepatu;
            $ukuran = $r->ukuran;
            $id_kategori = $r->id_kategori;
            $harga = $r->harga;
            $jumlahstok = $r->jumlah_Stok;
            $id = $r->id;

            $update = DB::table('tb_sepatu')->where('id_sepatu', $id)->update([
                'merek' => $merek,
                'kode_sepatu' => $kd_sepatu,
                'ukuran' => $ukuran,
                'kategori_id' => $id_kategori,
                'harga' => $harga,
                'jumlah_Stok' => $jumlahstok,
                'gambar' => $filename
            ]);
        }

        // dd($update);

        if ($update == TRUE) {
            return redirect('admin/sepatu')->with('success', 'Data Berhasil Diperbarui');
        } else {
            return back()->with('error', 'Data Gagal Diperbarui');
        }
    }

    public function delete($id)
    {
        $data_delete = DB::table('tb_sepatu')->where('id_sepatu', $id)->delete();
        return redirect()->route('sepatu_view');
    }
}
