<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PemasokModel;
use App\Models\SepatuModel;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    public function index()
    {
        $pemasok = PemasokModel::all();

        return view('admin/page/pemasok/index', [
            'pemasok' => $pemasok,
        ]);
    }

    public function create()
    {
        $sepatu = SepatuModel::all();

        return view('admin/page/pemasok/create', [
            'sepatu' => $sepatu,
        ]);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'sepatu' => 'required',
        ]);

        PemasokModel::create([
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'desc' => $request->deskripsi,
            'kd_sepatu' => $request->sepatu,
        ]);

        return redirect()->route('pemasok_view');
    }

    public function edit($id)
    {
        $pemasok = PemasokModel::find($id);
        $sepatu = SepatuModel::all();

        return view('admin/page/pemasok/edit', [
            'pemasok' => $pemasok,
            'sepatu' => $sepatu,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'sepatu' => 'required',
        ]);

        $pemasok = PemasokModel::find($id);
        $pemasok->nama = $request->nama;
        $pemasok->no_telp = $request->no_telp;
        $pemasok->alamat = $request->alamat;
        $pemasok->desc = $request->deskripsi;
        $pemasok->kd_sepatu = $request->sepatu;

        $pemasok->save();

        return redirect()->route('pemasok_view');
    }

    public function delete($id)
    {
        PemasokModel::destroy($id);

        return redirect()->route('pemasok_view');
    }
}
