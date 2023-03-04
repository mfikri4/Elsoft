@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Pengguna </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('user') }}">User</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content container">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Data Pengguna</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            @if (Session::has('status'))
                <div class="alert alert-danger">
                    {{ session::get('status') }}
                </div>
            @endif
            <div class="card-body">
                <form method="POST" action="{{ url('user/update-pass/'.$data->id) }}">
                @csrf
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" name="password" value="{{ $data->password }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputRepassword">Password Konfirmasi</label>
                        <input type="password" name="password_confirmation" value="{{ $data->password }}" class="form-control">
                    </div>

                    <a href="{{ url('user/edit/'.$data->id) }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Edit Data</button>
                </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

