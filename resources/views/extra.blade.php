@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Soal 6 & 7</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Soal 6 & 7</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <!-- /.FORM LEFT -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Swapping Variable</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="GET" id="formSwap">
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nilai_a">Nilai A</label>
                                <input type="number" class="form-control" id="nilaiA" placeholder="Nilai A">
                            </div>
                            <div class="form-group">
                                <label for="nilai_b">Nilai B</label>
                                <input type="number" class="form-control" id="nilaiB" placeholder="Nilai B">
                            </div>

                            {{-- <div class="form-group">
                                <label for="nilai_a">Nilai A Baru</label>
                                <input type="number" class="form-control" id="nilaiBaruA" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nilai_b">Nilai B Baru</label>
                                <input type="" class="form-control" id="nilaiBaruB" readonly>
                            </div> --}}
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div><!-- /.card -->
            </div><!-- /.col -->


            <!-- /.FORM RIGHT -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Convert Variable</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="GET" id="formConvert">
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nilai_angka">Nilai Angka</label>
                                <input type="number" class="form-control" id="nilaiAngka" placeholder="Nilai Angka">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div><!-- /.card -->
            </div><!-- /.col -->

        </div>{{-- row --}}
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script>

    $("#formSwap" ).submit(function(event) {
        event.preventDefault(); // HARUS MENCARI IF DULU
        A = $("#nilaiA").val();
        B = $("#nilaiB").val();

        if($("#nilaiA").val() == "" || $("#nilaiA").val() == null) {
            return alert("Nilai A harus diisi")
        }

        if($("#nilaiB").val() == "" || $("#nilaiB").val() == null) {
            return alert("Nilai B harus diisi")
        }

        $.ajax({
            method: "GET",
            url: "/extra/swap",
            data:{
                A,
                B
            },
            success: function (response) {
                alert("Nilai A = " + response[0] + "\nNilai B = " + response[1])
            },
            error: function (e) {
                alert("Error")
            }
        });
    });

    $("#formConvert" ).submit(function(event) {
        event.preventDefault(); // HARUS MENCARI IF DULU
        angka = $("#nilaiAngka").val();

        if($("#nilaiAngka").val() == "" || $("#nilaiAngka").val() == null) {
            return alert("Nilai Angka harus diisi")
        }

        // if($("#nilaiAngka").toString().length >= 15) {
        //     return alert("TIdak boleh lebih dari 12 karakter")
        // }
        
        $.ajax({
            method: "GET",
            url: "/extra/convert",
            data: {angka},
            success: function (response) {
                alert("Nilai Konversi Angka = " + response)
            },
            error: function (e) {
                alert("Error")
            }
        });
    });


  </script>

  
@endsection

