@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>transaksi Tmp Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">transaksi Tmp Page</li>
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
                <form action="{{route('transaksitmp_insert')}}" method="POST">
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
                        <label for="exampleInputEmail1">Id stok</label>
                        <select class="form-control" id="id_stok" name="id_stok">
                            <option value=""> pilih id stok</option>
                            @foreach($stok as $d)
                            <option value="{{$d->id_stok}}">{{$d->id_stok}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">
                            @error('id_stok')
                            {{@message}}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Id Diskon</label>
                        <select class="form-control" id="id_diskon" name="id_diskon">
                            <option value=""> pilih id diskon</option>
                            @foreach($diskon as $d)
                            <option value="{{$d->id_diskon}}">{{$d->id_diskon}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">
                            @error('id_diskon')
                            {{@message}}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Id Pelanggan</label>
                        <select class="form-control" id="id_pelanggan" name="id_pelanggan">
                            <option value=""> pilih id pelanggan</option>
                            @foreach($pelanggan as $d)
                            <option value="{{$d->id_pelanggan}}">{{$d->id_pelanggan}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">
                            @error('id_pelanggan')
                            {{@message}}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Quantity</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="quantity">
                    </div>
                    <!-- <div class="form-group">
                        <label for="exampleInputPassword1">metode pembayaran</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="metode_pembayaran">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Ongkir</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="ongkir">
                    </div> -->

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