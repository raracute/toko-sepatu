@extends('admin.layouts.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>sepatu Page</h1>
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
                <a href="{{route('sepatu_create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Merek</th>
                            <th scope="col">Kode Sepatu</th>
                            <th scope="col">Ukuran</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah stok</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($sepatu as $d)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$d->merek}}</td>
                            <td>{{$d->kode_sepatu}}</td>
                            <td>{{$d->ukuran}}</td>
                            <td>{{$d->kategori}}</td>
                            <td>{{$d->harga}}</td>
                            <td>{{$d->jumlah_Stok}}</td>
                            <td><img src="{{asset('img/'.$d->gambar)}}" alt="No Image" width="100"></td>
                            </td>
                            <td>
                                <a href="{{route('sepatu_edit', $d->id_sepatu)}}" class="btn btn-warning">edit</a>
                                <a href="{{route('sepatu_delete', $d->id_sepatu)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">delete</a>
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