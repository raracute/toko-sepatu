<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function home()
    {
        $data['jumlah_transaksi'] = DB::table('tb_transaksi')->count();
        $data['jumlah_sepatu'] = DB::table('tb_sepatu')->count();
        $data['jumlah_stok_sepatu'] = DB::table('tb_sepatu')->sum('jumlah_Stok');
        $data['jumlah_bank'] = DB::table('tb_bank')->count();
        $data['jumlah_kurir'] = DB::table('tb_kurir')->count();

        // 1 menunggu pembayaran, 2 pembayaran berhasil, 3 barang dikemas, 4 barang dikirim, 5 pesanan dibatalkan
        // keuntungan di status 3 atau 4
        $data['keuntungan'] = DB::table('tb_transaksi')
            ->whereIn('status', [2, 3])
            ->sum('totalharga');

        return view('admin.page.home', $data);
    }

    public function index()
    {
        $data['admin'] = DB::table('tb_admin')->get();
        return view('admin.page.admin.index', $data);
    }

    public function create()
    {
        return view('admin.page.admin.create');
    }

    public function insert(Request $r)
    {
        $nama = $r->nama;
        $nama_lengkap = $r->nama_lengkap;
        $email = $r->email;
        $username = $r->username;
        $password = $r->password;
        $insert_data = DB::table('tb_admin')->insert([
            'nama' => $nama,
            'nama_lengkap' => $nama_lengkap,
            'email' => $email,
            'username' => $username,
            'password' => $password
        ]);
        return redirect()->route('admin_view');
    }

    public function edit($id_admin)
    {
        $data['admin'] = DB::table('tb_admin')->where('id_admin', $id_admin)->first();
        return view('admin.page.admin.edit', $data);
    }

    public function update(Request $r)
    {
        $nama = $r->nama;
        $nama_lengkap = $r->nama_lengkap;
        $email = $r->email;
        $username = $r->username;
        $password = $r->password;
        $id_admin = $r->id_admin;

        $data_update = DB::table('tb_admin')->where('id_admin', $id_admin)->update([
            'nama' => $nama,
            'nama_lengkap' => $nama_lengkap,
            'email' => $email,
            'username' => $username,
            'password' => $password
        ]);
        return redirect()->route('admin_view');
    }

    public function delete($id)
    {
        $data_delete = DB::table('tb_admin')->where('id_admin', $id)->delete();
        return redirect()->route('admin_view');
    }
}
