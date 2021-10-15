<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    public function index()
    {
        $data['pelanggan'] = DB::table('tb_pelanggan')->get();
        return view('admin.page.pelanggan.index', $data);
    }

    public function create()
    {
        return view('admin.page.pelanggan.create');
    }

    public function insert(Request $r)
    {
        $nama = $r->nama;
        $nama_lengkap = $r->nama_lengkap;
        $alamat = $r->alamat;
        $notelp = $r->notelp;
        $email = $r->email;
        $username = $r->username;
        $password = $r->password;
        $insert_data = DB::table('tb_pelanggan')->insert([
            'nama' => $nama,
            'nama_lengkap' => $nama_lengkap,
            'alamat' => $alamat,
            'notelp' => $notelp,
            'email' => $email,
            'username' => $username,
            'password' => $password
        ]);
        return redirect()->route('pel_view');
    }

    public function edit($id_pel)
    {
        $data['pelanggan'] = DB::table('tb_pelanggan')->where('id', $id_pel)->first();
        return view('admin.page.pelanggan.edit', $data);
    }

    public function update(Request $r)
    {
        $nama = $r->nama;
        $nama_lengkap = $r->nama_lengkap;
        $alamat = $r->alamat;
        $notelp = $r->notelp;
        $email = $r->email;
        $username = $r->username;
        $password = $r->password;
        $id_pel = $r->id_pel;

        $data_update = DB::table('tb_pelanggan')->where('id', $id_pel)->update([
            'nama' => $nama,
            'nama_lengkap' => $nama_lengkap,
            'alamat' => $alamat,
            'notelp' => $notelp,
            'email' => $email,
            'username' => $username,
            'password' => $password
        ]);
        return redirect()->route('pel_view');
    }
}
