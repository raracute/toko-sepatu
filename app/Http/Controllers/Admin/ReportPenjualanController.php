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
        $now = Carbon::now(new DateTimeZone('Asia/Jakarta'))->format('m-Y');
        $from = Carbon::now(new DateTimeZone('Asia/Jakarta'))->startOfMonth();
        $to = Carbon::now(new DateTimeZone('Asia/Jakarta'))->lastOfMonth();

        if ($request->query('tanggal')) {
            $now = $request->query('tanggal');
            $from = Carbon::createFromFormat('m-Y', $now)->startOfMonth();
            $to = Carbon::createFromFormat('m-Y', $now)->lastOfMonth();
        }

        $data['tanggal'] = $now;
        $transaksi = DB::table('tb_transaksi')
            ->whereBetween('tanggal_transaksi', [$from, $to])
            ->get();

        $data['transaksi'] = json_decode($transaksi, true);
        return view('admin.page.report.index', $data);
    }

    public function pdf($tanggal)
    {
        $data['tanggal'] = $tanggal;
        $from = Carbon::createFromFormat('m-Y', $tanggal)->startOfMonth();
        $to = Carbon::createFromFormat('m-Y', $tanggal)->lastOfMonth();
        $transaksi = DB::table('tb_transaksi')
            ->whereBetween('tanggal_transaksi', [$from, $to])
            ->get();

        $data['transaksi'] = json_decode($transaksi, true);
        $pdf = PDF::loadView('admin.page.report.pdf', $data);
        return $pdf->download('Report Penjualan - (' . $tanggal . ') .pdf');
    }
}
