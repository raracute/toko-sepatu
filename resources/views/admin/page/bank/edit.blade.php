@extends('admin.layouts.index')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Bank Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Bank Page</li>
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
        <form action="{{route('bank_update')}}" method="POST">
          @method('PUT')
          @csrf
          <input type="hidden" name="id_bank" value="{{$bank->id}}">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" name="bank" id="exampleInputEmail1" value="{{$bank->nama_bank}}">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Atas Nama</label>
            <input type="text" class="form-control" name="atas_nama" id="exampleInputEmail1" value="{{$bank->atas_nama}}">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Rekening</label>
            <input type="number" class="form-control" name="rekening" id="exampleInputEmail1" value="{{$bank->norek}}">
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
