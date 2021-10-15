@extends('admin.layouts.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Report Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Report Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">
                        <div>Report Penjualan - {{ $tanggal }}</div>

                        <form action="{{ route('report_view') }}" class="mt-4">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id='tanggal' name="tanggal" value="{{ $tanggal }}">
                                <button class="btn btn-primary">Cari</button>
                            </div>
                        </form>
                    </h3>
                    <div>
                        <a href="{{ route('report_pdf', ['tanggal' => $tanggal]) }}" class="btn btn-primary" target="_blank">Download PDF</a>
                    </div>
                </div>

            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Ongkir</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $jumlahTerjual = 0;
                            $pendapatan = 0;
                            $sisaStok = DB::table('tb_sepatu')
                            ->sum('jumlah_Stok');
                        @endphp
                        @foreach($transaksi as $item)
                            @php
                                $nama = DB::table('users')
                                ->where('id', $item['pelanggan_id'])
                                ->first()
                                ->name;

                                $jumlah = DB::table('tb_transaksi_detail')
                                ->where('id_transaksi', $item['id_transaksi'])
                                ->sum('quantity');

                                $jumlahTerjual += $jumlah;
                                $pendapatan += $item['totalharga'];
                            @endphp

                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $nama }}</td>
                                <td>{{ $jumlah }}</td>
                                <td>Rp. {{ number_format($item['ongkir'] ) }}</td>
                                <td>Rp. {{ number_format($item['totalharga']) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <p>Total transaksi : {{ count($transaksi) }}</p>
                <p>Total barang terjual : {{ $jumlahTerjual }}</p>
                <p>Total sisa stok : {{ $sisaStok }}</p>
                <p>Total pendapatan : {{ number_format($pendapatan) }}</p>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<script src="{{ asset('templaterades/js/bootstrap-datepicker.js') }}"></script>

<script>
    $('#tanggal').datepicker({
        format: 'mm-yyyy',
        startView: 'year',
        minViewMode: 'months',
        autoclose: true
    });

</script>

@endsection
