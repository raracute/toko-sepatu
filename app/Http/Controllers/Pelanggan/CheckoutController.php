<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $user = Auth::user();

        // sepatu yang ada di keranjang
        $sepatu = DB::table('tb_transaksi_tmp')
            ->join('tb_sepatu', 'tb_transaksi_tmp.kd_sepatu', '=', 'tb_sepatu.id_sepatu')
            ->select('tb_sepatu.merek', 'tb_sepatu.id_sepatu', 'tb_transaksi_tmp.quantity', 'tb_transaksi_tmp.harga')
            ->where('tb_transaksi_tmp.pelanggan_id', $user->id)
            ->get();

        // kurir
        $kurir = DB::table('tb_kurir')->get();

        $data['sepatu'] = json_decode($sepatu, true);
        $data['kurir'] = json_decode($kurir, true);

        // check is cart empty or not
        if (count($data['sepatu']) == 0) {
            return redirect()->route('home');
        }

        return view('pelanggan.page.checkout', $data);
    }

    public function create(Request $request)
    {
        $request->validate([
            'kurir' => 'required',
            'alamat' => 'required',
            'pembayaran' => 'required',
        ]);

        $kurirId = $request->kurir;
        $alamat = $request->alamat;
        $pembayaran = $request->pembayaran;
        $user = Auth::user();

        // ambil data sepatu yang ada di keranjang
        $sepatu = DB::table('tb_transaksi_tmp')
            ->join('tb_sepatu', 'tb_transaksi_tmp.kd_sepatu', '=', 'tb_sepatu.id_sepatu')
            ->select('tb_sepatu.jumlah_Stok', 'tb_transaksi_tmp.kd_sepatu', 'tb_transaksi_tmp.quantity', 'tb_transaksi_tmp.harga')
            ->where('tb_transaksi_tmp.pelanggan_id', $user->id)
            ->get();

        // check stock
        $overStock = [];
        foreach ($sepatu as $sepatuItem) {
            if ($sepatuItem->quantity > $sepatuItem->jumlah_Stok) {
                $overStock[] = [
                    'id' => $sepatuItem->kd_sepatu,
                    'availableStock' => $sepatuItem->jumlah_Stok,
                ];
            }
        }

        if (count($overStock) > 0) {
            return redirect()->route('checkout')->withErrors($overStock);
        }

        $kurir = DB::table('tb_kurir')
            ->where('id_kurir', $kurirId)
            ->first();

        $totalHarga = 0;
        foreach (json_decode($sepatu, true) as $sepatuItem) {
            // discount logic
            if ($sepatuItem['quantity'] > 3) {
                $totalHarga += $sepatuItem['harga'] - ($sepatuItem['harga'] * 0.15);
            } else {
                $totalHarga += $sepatuItem['harga'];
            }
        }

        // add to tb_transaksi
        // 1 menunggu pembayaran, 2 pembayaran berhasil, 3 barang dikemas, 4 barang dikirim, 5 pesanan dibatalkan
        $idTransaksi = DB::table('tb_transaksi')->insertGetId([
            'pelanggan_id' => $user->id,
            'alamat_pengiriman' => $alamat,
            'totalHarga' => $totalHarga,
            'kurir_id' => $kurir->id_kurir,
            'kurir_pengirim' => $kurir->perusahaan_kurir,
            'ongkir' => $kurir->harga,
            'metode_pembayaran' => $pembayaran,
            'tanggal_transaksi' => Carbon::now(new DateTimeZone('Asia/Jakarta'))->format('Y-m-d H:i:s'),
            'status' => 1,
        ]);

        // add to tb_transaksi_detail
        foreach (json_decode($sepatu, true) as $sepatuItem) {
            DB::table('tb_transaksi_detail')->insert([
                'id_transaksi' => $idTransaksi,
                'id_sepatu' => $sepatuItem['kd_sepatu'],
                'quantity' => $sepatuItem['quantity'],
            ]);

            // kurangi stok yang ada
            $dataSepatu = DB::table('tb_sepatu')
                ->where('id_sepatu', $sepatuItem['kd_sepatu'])
                ->first();

            $sisaStok = $dataSepatu->jumlah_Stok - $sepatuItem['quantity'];
            DB::table('tb_sepatu')
                ->where('id_sepatu', $sepatuItem['kd_sepatu'])
                ->update(['jumlah_Stok' => $sisaStok]);
        }

        // delete item in cart
        DB::table('tb_transaksi_tmp')
            ->where('pelanggan_id', $user->id)
            ->delete();

        return redirect()->route('history_detail_view', ['id_transaksi' => $idTransaksi]);
    }
}
