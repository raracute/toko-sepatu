@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Diskon Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Diskon Page</li>
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
                <form action="{{route('diskon_update')}}" method="POST" enctype="multipart/form-data">
                    @method('GET')
                    @csrf
                    <input type="hidden" name="id" value="{{$diskon->id_diskon}}">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Speatu</label>
                        <select class="form-control" id="id_sepatu" name="id_sepatu">
                            <option value=""> pilih kode sepatu</option>
                            @foreach($sepatu as $d)
                            <option {{$d->id_sepatu == $diskon->id_sepatu ? 'selected':''}} value="{{$d->id_sepatu}}">{{$d->kode_sepatu}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">
                            @error('id_sepatu')
                            {{@message}}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Diskon Status</label>
                        <input type="text" class="form-control" name="diskon_nominal" id="exampleInputEmail1" value="{{$diskon->diskon_nominal}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Diskon Nominal</label>
                        <input type="text" class="form-control" name="diskon_status" id="exampleInputEmail1" value="{{$diskon->diskon__status}}">
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