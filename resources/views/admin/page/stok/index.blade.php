@extends('admin.layouts.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Stok Page</h1>
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
                <a href="{{route('stok_create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Sepatu</th>
                            <th scope="col">Jumlah Stok</th>
                            <th scope="col">Jumlah Stok Minimal</th>
                            <th scope="col">Stok harga modal</th>
                            <th scope="col">Stok Harga Jual</th>
                            <th scope="col">Stok Terjual</th>
                            <th scope="col">aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($stok as $d)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$d->kd_sepatu}}</td>
                            <td>{{$d->jml_stok}}</td>
                            <td>{{$d->jumlah_stok_min}}</td>
                            <td>{{$d->stok_harga_modal}}</td>
                            <td>{{$d->stok_harga_jual}}</td>
                            <td>{{$d->stok_terjual}}</td>
                            </td>
                            <td>
                                <a href="{{route('stok_delete', $d->id_stok)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">delete</a>
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
