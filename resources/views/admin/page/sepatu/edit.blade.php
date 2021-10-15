@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit sepatu Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit sepatu Page</li>
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
                <form action="{{route('sepatu_update')}}" method="POST" enctype="multipart/form-data">
                    @method('GET')
                    @csrf
                    <input type="hidden" name="id" value="{{$sepatu->id_sepatu}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Merek Sepatu</label>
                        <input type="text" class="form-control" name="merek" id="exampleInputEmail1" value="{{$sepatu->merek}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Sepatu</label>
                        <input type="text" class="form-control" name="kode_sepatu" id="exampleInputEmail1" value="{{$sepatu->kode_sepatu}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Ukuran</label>
                        <input type="text" class="form-control" name="ukuran" id="exampleInputEmail1" value="{{$sepatu->ukuran}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">kategori</label>
                        <select class="form-control" id="id_kategori" name="id_kategori">
                            <option value=""> pilih kategori</option>
                            @foreach($kategori as $d)
                            <option {{$d->id_kategori == $sepatu->kategori_id ? 'selected':''}} value="{{$d->id_kategori}}">{{$d->kategori}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">
                            @error('id_kategori')
                            {{@message}}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga</label>
                        <input type="text" class="form-control" name="harga" id="exampleInputEmail1" value="{{$sepatu->harga}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah Stok</label>
                        <input type="text" class="form-control" name="jumlah_Stok" id="exampleInputEmail1" value="{{$sepatu->jumlah_Stok}}">
                    </div>

                    <div class="form-group">
                        <img src="{{asset('img/'.$sepatu->gambar)}}" alt="No Image" width="100">
                        <input type="hidden" class="form-control" name="fotolama" value="{{$sepatu->gambar}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" class="form-control" name="gambar">
                    </div>


                    <button type="submit" class="btn btn-primary" name="edit">Submit</button>
                </form>
            </div>

            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection