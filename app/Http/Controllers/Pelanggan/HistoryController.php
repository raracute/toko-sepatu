<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $transaksi = DB::table('tb_transaksi')
            ->where('pelanggan_id', $user->id)
            ->orderBy('id_transaksi', 'desc')
            ->get();

        $data['transaksi'] = json_decode($transaksi, true);
        return view('pelanggan.page.history', $data);
    }

    public function detail($id_transaksi)
    {
        $user = Auth::user();

        $transaksi = DB::table('tb_transaksi')
            ->where('pelanggan_id', $user->id)
            ->where('id_transaksi', $id_transaksi)
            ->first();

        $transaksiDetail = DB::table('tb_transaksi_detail')
            ->join('tb_sepatu', 'tb_transaksi_detail.id_sepatu', '=', 'tb_sepatu.id_sepatu')
            ->select('tb_sepatu.merek', 'tb_sepatu.harga', 'tb_transaksi_detail.quantity')
            ->where('id_transaksi', $id_transaksi)
            ->get();

        $bank = DB::table('tb_bank')
            ->get();

        $data['transaksi'] = $transaksi;
        $data['transaksiDetail'] = json_decode($transaksiDetail, true);
        $data['bank'] = json_decode($bank, true);

        return view('pelanggan.page.history_detail', $data);
    }

    public function paymentInsert($id_transaksi, Request $request)
    {
        $filename = time() . "." . $request->file('bukti_pembayaran')->getClientOriginalExtension();
        $request->file('bukti_pembayaran')->move('img', $filename);

        // insert tb_pembayaran
        DB::table('tb_pembayaran')->insert([
            'tanggal_pembayaran' => Carbon::now(new DateTimeZone('Asia/Jakarta'))->format('Y-m-d H:i:s'),
            'id_bank' => $request->bank,
            'id_transaksi' => $id_transaksi,
            'bukti_pembayaran' => $filename,
        ]);

        // update status transaksi
        // 1 menunggu pembayaran, 2 pembayaran berhasil, 3 barang dikemas, 4 barang dikirim, 5 pesanan dibatalkan
        DB::table('tb_transaksi')
            ->where('id_transaksi', $id_transaksi)
            ->update(['status' => 2]);

        return redirect()->route('history_detail_view', ['id_transaksi' => $id_transaksi]);
    }
}
