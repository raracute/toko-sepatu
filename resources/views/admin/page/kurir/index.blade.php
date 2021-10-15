@extends('admin.layouts.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kurir Page</h1>
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
                <a href="{{route('kurir_create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">No Kendaraan Kurir</th>
                            <th scope="col">Perusahaan Kurir</th>
                            <th scope="col">Tipe Kurir</th>
                            <th scope="col">Nama Kurir</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Status</th>
                            <th scope="col">aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($kurir as $d)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$d->no_kendaraan_kurir}}</td>
                            <td>{{$d->perusahaan_kurir}}</td>
                            <td>{{$d->tipe_kurir}}</td>
                            <td>{{$d->nama_kurir}}</td>
                            <td>{{$d->notelp_kurir}}</td>
                            <td>Rp. {{ number_format($d->harga) }}</td>
                            <td>{{$d->status_kurir}}</td>
                            </td>
                            <td>
                                <a href="{{route('kurir_edit', $d->id_kurir)}}" class="btn btn-warning ">edit</a>
                                <a href="{{route('kurir_delete', $d->id_kurir)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">delete</a>
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
