@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>diskon Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">diskon Page</li>
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
                <form action="{{route('diskon_insert')}}" method="POST">
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
                        <label for="exampleInputEmail1">diskon nominal</label>
                        <input type="text" class="form-control" name="diskon_nominal" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">diskon status</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="diskon_status">
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