<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // jika login dan admin
        if (Auth::check() && Auth::user()->status == 'admin') {
            return redirect()->route('admin_home');
        }

        // jika belum login atau pelanggan
        $produk = DB::table('tb_sepatu')->limit(6)->get();
        $data['produk'] = $produk;
        return view('pelanggan.page.home', $data);
    }
}
