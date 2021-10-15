@extends('admin.layouts.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaksi Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">

            <div class="card-body">
                <a href="{{ route('transaksi_create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Email Pelanggan</th>
                            <th scope="col">Alamat Pengiriman</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Kurir</th>
                            <th scope="col">Ongkir</th>
                            <th scope="col">Metode Pembayaran</th>
                            <th scope="col">Status</th>

                            <th scope="col">aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($transaksi as $d)
                        @php
                        // 1 menunggu pembayaran, 2 pembayaran berhasil, 3 barang dikemas, 4 barang dikirim, 5 pesanan dibatalkan
                        $status = '';
                        if ($d->status == 1) {
                        $status = 'Menunggu Pembayaran';
                        } else if ($d->status == 2) {
                        $status = 'Pembayaran Berhasil';
                        } else if ($d->status == 3) {
                        $status = 'Barang Dikemas';
                        } else if ($d->status == 4) {
                        $status = 'Barang Dikirim';
                        } else if ($d->status == 5) {
                        $status = 'Pesanan Dibatalkan';
                        }
                        @endphp
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $d->email }}</td>
                            <td>{{ Str::limit($d->alamat_pengiriman, 20) }}</td>
                            <td>Rp. {{ number_format($d->totalHarga) }}</td>
                            <td>{{ $d->kurir_pengirim }}</td>
                            <td>Rp. {{ number_format($d->ongkir) }}</td>
                            <td>{{ $d->metode_pembayaran }}</td>
                            <td>{{ $status }}</td>

                            <td>
                                <a href="{{ route('transaksi_edit', $d->id_transaksi) }}" class="btn btn-warning">Proses</a>
                                <a href="{{ route('transaksi_delete', $d->id_transaksi) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

@endsection