@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Transaksi Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Transaksi Page</li>
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
                <form action="{{ route('transaksi_update') }}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id_transaksi" value="{{ $transaksi->id_transaksi }}">

                    @php
                        // 1 menunggu pembayaran, 2 pembayaran berhasil, 3 barang dikemas, 4 barang dikirim, 5 pesanan dibatalkan
                        $status = '';
                        if ($transaksi->status == 1) {
                        $status = 'Menunggu Pembayaran';
                        } else if ($transaksi->status == 2) {
                        $status = 'Pembayaran Berhasil';
                        } else if ($transaksi->status == 3) {
                        $status = 'Barang Dikemas';
                        } else if ($transaksi->status == 4) {
                        $status = 'Barang Dikirim';
                        } else if ($transaksi->status == 5) {
                        $status = 'Pesanan Dibatalkan';
                        }
                    @endphp
                    <div class="form-group">
                        <label>Status saat ini</label>
                        <input type="text" class="form-control" value="{{ $status }}" disabled>
                    </div>

                    <div class="form-group">
                        <label>Metode Pembayaran</label>
                        <input type="text" class="form-control" value="{{ $transaksi->metode_pembayaran }}" disabled>
                    </div>

                    @if ($transaksi->status == 2 || $transaksi->status == 3 || ($transaksi->metode_pembayaran == 'cod' && $transaksi->status == 1))
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pilih Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="3">Barang Dikemas</option>
                                <option value="4">Barang Dikirim</option>
                                <option value="5">Pesanan Dibatalkan</option>
                            </select>
                        </div>
                    @endif


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection
