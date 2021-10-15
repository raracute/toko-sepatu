@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Pemasok Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Pemasok Page</li>
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
                <form action="{{route('pemasok_update', ['id' => $pemasok->id])}}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" required value="{{ $pemasok->nama }}">
                    </div>

                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input type="text" class="form-control" name="no_telp" id="no_telp" required value="{{ $pemasok->no_telp }}">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="10" rows="5" class="form-control" required>{{ $pemasok->alamat }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="10" rows="5" class="form-control" required>{{ $pemasok->desc }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="sepatu">Sepatu</label>
                        <select name="sepatu" id="sepatu" class="form-control">
                            @foreach ($sepatu as $sepatuItem)
                                <option value="{{ $sepatuItem->id_sepatu }}" @if($sepatuItem->id_sepatu == $pemasok->kd_sepatu) selected @endif>{{ $sepatuItem->merek }}</option>
                            @endforeach
                        </select>
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
