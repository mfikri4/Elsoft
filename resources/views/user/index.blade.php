@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content --><div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Data Pengguna</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Pengguna</h3>

          <div class="card-tools">
            <a class="btn btn-success btn-sm" href="/user/create">
                <i class="fas fa-pencil-alt">
                </i>
                Create
            </a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          No.
                      </th>
                      <th style="width: 30%">
                          Nama Pengguna
                      </th>
                      <th style="width: 30%">
                          Email
                      </th>
                      <th style="width: 20%">
                          Tanggal Daftar
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
            <?php 
            $i=0;
            ?>
            @foreach ($data as $dt)
              <tbody>
                  <tr>
                      <td>
                          {{ ++$i }}
                      </td>
                      <td>
                          {{ $dt->name }}
                      </td>
                      <td>
                          {{ $dt->email }}
                      </td>
                      <td>
                          {{ date('H:i y F Y', strtotime($dt->created_at)); }}
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="{{ ('user/edit/'.$dt->id) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          @if(auth()->user()->name != $dt->name )
                          <a class="btn btn-danger btn-sm" href="{{ url('user/delete/'.$dt->id) }}">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                          @endif

                      </td>
                  </tr>
              </tbody>
            @endforeach
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection

