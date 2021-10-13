@extends('admin.layouts.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pembayaran Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pembayaran Page</li>
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
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal Pembayaran</th>
                            <th scope="col">Tanggal Transaksi</th>
                            <th scope="col">Bank</th>
                            <th scope="col">Bukti</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pembayaran as $item)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['tanggal_pembayaran'] }}</td>
                            <td>{{ $item['tanggal_transaksi'] }}</td>
                            <td>{{ $item['nama_bank'] }}</td>
                            <td>
                                <a href="{{ asset('/img/'. $item['bukti_pembayaran']) }}" target="_blank">Bukti</a>
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
