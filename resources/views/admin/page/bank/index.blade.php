@extends('admin.layouts.index')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Rekening Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Rekening Page</li>
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
        <a href="{{route('bank_create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Bank</th>
              <th scope="col">Atas Nama</th>
              <th scope="col">Rekening</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($bank as $b)
            <tr>
              <th scope="row">{{ $loop->index + 1}}</th>
              <td>{{ $b->nama_bank }}</td>
              <td>{{ $b->atas_nama }}</td>
              <td>{{ $b->norek }}</td>
              <td>
                <a href="{{route('bank_edit', $b->id)}}" class="btn btn-warning">edit</a>
                <a href="{{route('bank_delete', $b->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">delete</a>
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