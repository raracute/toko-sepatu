<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DiskonController extends Controller
{
    public function index()
    {
        $data['diskon'] = DB::table('tb_diskon')
            ->leftJoin('tb_sepatu', 'tb_diskon.id_sepatu', '=', 'tb_sepatu.id_sepatu')
            ->get();
        return view('admin.page.diskon.index', $data);
    }

    public function create()
    {
        $data['sepatu'] = DB::table('tb_sepatu')->get();
        return view('admin.page.diskon.create', $data);
    }

    public function insert(Request $r)
    {
        // dd($r->all());
        $id_s = $r->id_sepatu;
        $diskon_nominal = $r->diskon_nominal;
        $diskon_status = $r->diskon_status;
        $insert_data = DB::table('tb_diskon')->insert([
            'id_sepatu' => $id_s,
            'diskon_nominal' => $diskon_nominal,
            'diskon_status' => $diskon_status
        ]);

        // dd($insert_data);
        return redirect()->route('diskon_view');
    }

    public function edit($id)
    {
        $data['diskon'] = DB::table('tb_diskon')->where('id_diskon', $id)->first();
        $data['sepatu'] = DB::table('tb_sepatu')->get();
        return view('admin.page.diskon.edit', $data);
    }


    public function delete($id)
    {
        $data_delete = DB::table('tb_diskon')->where('id_diskon', $id)->delete();
        return redirect()->route('diskon_view');
    }
}
