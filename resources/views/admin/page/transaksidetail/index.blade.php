@extends('admin.layouts.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaksi Detail Page</h1>
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
                <a href="{{route('transaksidet_create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Sepatu</th>
                            <th scope="col">Stok Id</th>
                            <th scope="col">Pelanggan Id</th>
                            <th scope="col">Harga Modal</th>
                            <th scope="col">Harga Jual</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Diskon Id</th>
                            <th scope="col">Nominal Diskon</th>

                            <th scope="col">aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($transaksidetail as $d)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$d->kd_sepatu}}</td>
                            <td>{{$d->stok_id}}</td>
                            <td>{{$d->pelanggan_id}}</td>
                            <td>{{$d->harga_modal}}</td>
                            <td>{{$d->harga_jual}}</td>
                            <td>{{$d->totalharga}}</td>
                            <td>{{$d->diskon_id}}</td>
                            <td>{{$d->nominal_diskon}}</td>

                            </td>
                            <td>
                                <a href="{{route('transaksidet_delete', $d->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">delete</a>
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
