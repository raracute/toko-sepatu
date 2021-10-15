@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Kurir Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Kurir Page</li>
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
                <form action="{{route('kurir_update')}}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id_kurir" value="{{$kurir->id_kurir}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">No Kendaraan Kurir</label>
                        <input type="text" class="form-control" name="no_kendaraan_kurir" id="exampleInputEmail1" value="{{$kurir->no_kendaraan_kurir}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Perusahaan Kurir</label>
                        <input type="text" class="form-control" name="perusahaan_kurir" id="exampleInputEmail1" value="{{$kurir->perusahaan_kurir}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tipe Kurir</label>
                        <input type="text" class="form-control" name="tipe_kurir" id="exampleInputEmail1" value="{{$kurir->tipe_kurir}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kurir</label>
                        <input type="text" class="form-control" name="nama_kurir" id="exampleInputEmail1" value="{{$kurir->nama_kurir}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">No Telp Kurir</label>
                        <input type="text" class="form-control" name="notelp_kurir" id="exampleInputEmail1" value="{{$kurir->notelp_kurir}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Kurir</label>
                        <input type="text" class="form-control" name="harga_kurir" id="exampleInputEmail1" value="{{$kurir->harga}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Status Kurir</label>
                        <input type="text" class="form-control" name="status_kurir" id="exampleInputEmail1" value="{{$kurir->status_kurir}}">
                    </div>


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
