@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Data Pengguna </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('user') }}">User</a></li>
              <li class="breadcrumb-item active">Detail</li>
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
              <h3 class="card-title">Detail Data Pengguna</h3>

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
                <form method="POST" action="{{ url('user/update/'.$data->id) }}">
                @csrf
                    <div class="form-group">
                        <label for="inputName">Nama Pengguna</label>
                        <input type="text" name="name" value="{{ $data->name }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="text" name="email" value="{{ $data->email }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" name="password" value="{{ $data->password }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Tanggal Bergabung</label>
                        <input type="text" name="email" value="{{ $data->created_at }}" class="form-control" readonly>
                    </div>

                    <a href="{{ url('user') }}" class="btn btn-secondary">Kembali</a>
                    
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

