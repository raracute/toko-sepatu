<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index($kode_sepatu)
    {
        $cart = DB::table('tb_sepatu')->where("kode_sepatu", $kode_sepatu)->first();

        return view('pelanggan.page.cart', [
            'keranjang' => $cart,
        ]);
    }

    public function keranjang(Request $r)
    {

        $produk = $r->id_sepatu;
        $septu = DB::table('tb_sepatu')
            ->where('id_sepatu', $produk)
            ->first();


        $customer = Auth::user()->id;

        $cekproduk = DB::table('tb_transaksi_tmp')
            ->where('kd_sepatu', $produk)
            ->where('pelanggan_id', $customer)
            ->first();

        if ($cekproduk == null) {
            $customer =  DB::table('tb_transaksi_tmp')->insert([
                'quantity' => $r->quantity,
                'harga' => $r->quantity * $septu->harga,
                'kd_sepatu' => $produk,
                'pelanggan_id' => Auth::user()->id,
            ]);
        } else {

            $update = DB::table('tb_transaksi_tmp')->where('kd_sepatu', $produk)->where('pelanggan_id', $customer)->update([
                'quantity' => $r->quantity + $cekproduk->quantity
            ]);
        }

        return redirect()->route('cart_view');
    }

    public function listkeranjang()
    {
        $customer = Auth::user()->id;
        $data['cart'] = DB::table('tb_transaksi_tmp')
            ->leftJoin('tb_sepatu', 'tb_transaksi_tmp.kd_sepatu', 'tb_sepatu.id_sepatu')
            ->where('pelanggan_id', $customer)
            ->get();

        return view('pelanggan.page.cart', $data);
    }


    public function deletecart($id)
    {
        $delete = DB::table('tb_transaksi_tmp')->where('id', $id)->delete();

        if ($delete == TRUE) {
            return redirect()->route('cart_view');
        } else {
            return back()->with('error', 'Data Gagal Dihapus');
        }
    }


    public function editcart($transaksi_id)
    {
        $data = DB::table('tb_transaksi_tmp')
            ->leftJoin('tb_sepatu', 'tb_transaksi_tmp.kd_sepatu', '=', 'tb_sepatu.id_sepatu')
            ->where('id', $transaksi_id)
            ->first();

        return view('page.cart.index', ['order_tmp' => $data]);
    }

    public function updatecart(Request $r)
    {
        error_log(json_encode($r->all()));
        DB::table('tb_transaksi_tmp')
            ->where('id', $r->transaksi_id)
            ->update([
                'quantity' => $r->quantity
            ]);

        return redirect()->back();
    }
}
