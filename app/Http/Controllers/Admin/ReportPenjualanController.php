<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ReportPenjualanController extends Controller
{
    public function index(Request $request)
    {
        $now = Carbon::now(new DateTimeZone('Asia/Jakarta'))->format('Y-m-d');
        if ($request->query('tanggal')) {
            $now = $request->query('tanggal');
        }

        $data['tanggal'] = $now;
        $transaksi = DB::table('tb_transaksi')
            ->whereDate('tanggal_transaksi', '=', $now)
            ->get();

        $data['transaksi'] = json_decode($transaksi, true);
        return view('admin.page.report.index', $data);
    }

    public function pdf($tanggal)
    {
        $data['tanggal'] = $tanggal;
        $transaksi = DB::table('tb_transaksi')
            ->whereDate('tanggal_transaksi', '=', $tanggal)
            ->get();

        $data['transaksi'] = json_decode($transaksi, true);
        $pdf = PDF::loadView('admin.page.report.pdf', $data);
        return $pdf->download('Report Penjualan - (' . $tanggal . ') .pdf');
    }
}
