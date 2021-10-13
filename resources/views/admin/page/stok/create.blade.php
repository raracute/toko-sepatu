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
                        <li class="breadcrumb-item active">Stok Page</li>
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
                <form action="{{route('stok_insert')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">kode sepatu</label>
                        <select class="form-control" id="id_sepatu" name="id_sepatu">
                            <option value=""> pilih kode sepatu</option>
                            @foreach($sepatu as $d)
                            <option value="{{$d->id_sepatu}}">{{$d->kode_sepatu}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">
                            @error('id_sepatu')
                            {{@message}}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">jumlah stok minimal</label>
                        <input type="text" class="form-control" name="jumlah_stok_min" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">stok harga modal</label>
                        <input type="text" class="form-control" name="stok_harga_modal" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">stok harga jual</label>
                        <input type="text" class="form-control" name="stok_harga_jual" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">stok terjual</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="stok_terjual">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <!-- /.card-body -->

            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection