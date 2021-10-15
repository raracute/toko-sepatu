@extends('admin.layouts.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pelanggan Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pelanggan Page</li>
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
                <a href="{{route('pel_create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($pelanggan as $d)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$d->nama}}</td>
                            <td>{{$d->nama_lengkap}}</td>
                            <td>{{$d->alamat}}</td>
                            <td>{{$d->notelp}}</td>
                            <td>{{$d->email}}</td>
                            <td>{{$d->username}}</td>
                            <td>{{$d->password}}</td>
                            <td>
                                <a href="{{route('pel_edit', $d->id_pelanggan)}}" class="btn btn-warning">edit</a>
                                <a href="{{route('pel_delete', $d->id_pelanggan)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">delete</a>
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
