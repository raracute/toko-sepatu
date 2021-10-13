<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    public function index()
    {
        $data['bank'] = DB::table('tb_bank')->get();
        return view('admin.page.bank.index', $data);
    }

    public function create()
    {
        return view('admin.page.bank.create');
    }

    public function insert(Request $request)
    {
        $dataInsert['nama_bank'] = $request->bank;
        $dataInsert['atas_nama'] = $request->atas_nama;
        $dataInsert['norek'] = $request->rekening;

        DB::table('tb_bank')
            ->insert($dataInsert);

        return redirect()->route('bank_view');
    }

    public function edit($id_bank)
    {
        $data['bank'] = DB::table('tb_bank')
            ->where('id', $id_bank)
            ->first();

        return view('admin.page.bank.edit', $data);
    }

    public function update(Request $request)
    {
        $id = $request->id_bank;
        $dataUpdate['nama_bank'] = $request->bank;
        $dataUpdate['atas_nama'] = $request->atas_nama;
        $dataUpdate['norek'] = $request->rekening;

        DB::table('tb_bank')
            ->where('id', $id)
            ->update($dataUpdate);

        return redirect()->route('bank_view');
    }

    public function delete($id_bank)
    {
        DB::table('tb_bank')
            ->where('id', $id_bank)
            ->delete();

        return redirect()->route('bank_view');
    }
}
