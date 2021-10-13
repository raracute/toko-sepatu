<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        $data['kategori'] = DB::table('tb_kategori')->get();
        return view('admin.page.kategori.index', $data);
    }

    public function create()
    {
        return view('admin.page.kategori.create');
    }

    public function insert(Request $r)
    {
        $kategori = $r->kategori;
        $ket = $r->ket;
        $insert_data = DB::table('tb_kategori')->insert([
            'kategori' => $kategori,
            'ket' => $ket
        ]);
        return redirect()->route('kat_view');
    }

    public function edit($id_kat)
    {
        $data['kategori'] = DB::table('tb_kategori')->where('id_kategori', $id_kat)->first();
        return view('admin.page.kategori.edit', $data);
    }

    public function update(Request $r)
    {
        // dd($r->all());

        $kategori = $r->kategori;
        $ket = $r->ket;
        $id_kat = $r->id;

        $data_update = DB::table('tb_kategori')->where('id_kategori', $id_kat)->update([
            'kategori' => $kategori,
            'ket' => $ket
        ]);
        return redirect()->route('kat_view');
    }

    public function delete($id_kat)
    {
        $delete = DB::table('tb_kategori')->where('id_kategori', $id_kat)->delete();
        return redirect()->route('kat_view');
    }
}
