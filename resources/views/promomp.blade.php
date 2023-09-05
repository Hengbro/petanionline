@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Promo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Promo</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="card">
         <div class="card-header">
                <h3 class="card-title">List data promo Market-TANI</h3>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Add item</button>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">Id</th>
                      <th>Nama promo</th>
                      <th>Deskripsi promo</th>
                      <th>Syarat dan ketentuan</th>
                      <th>Periode promo</th>
                      <th>Nominal promo</th>
                      <th>Kode promo</th>
                      <th>Gambar promo</th>
                      <th>Pembaharuan promo</th>
                      <th style="width: 10px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                @foreach($listpromomp as $data)
                    <tr>
                      <td>{{$data->id}}</td>
                      <td>{{$data->namapromomp}}</td>
                      <td>{{$data->deskripsipromomp}}</td>
                      <td>{{$data->syaratdanketentuan}}</td>
                      <td>{{$data->periodepromomp ." Hari"}}</td>
                      <td>{{"Rp. ".number_format($data->nominalpromomp)}}</td>
                      <td>{{$data->kodepromomp}}</td>
                      <td>{{$data->gambarpromomp}}</td>
                      <td>{{$data->updated_at}}</td>
                      <td>
                          <a href="#">
                          <i class="fa fa-edit"></i>
                            </a>
                            /
                            <a href="#">
                              <i class= "fa fa-trash-alt"></i>
                            </a>
                      </td>
                    </tr>
                @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
      </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah item promo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="{{ route('promomp.store') }}" enctype="multipart/form-data">
              @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label>Nama promo</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan nama promo ..." name="namapromomp">
                  </div>
                  
                  <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Deskripsi promo</label>
                        <textarea class="form-control" rows="3" placeholder="Masukan deskripsi promo ..." style="width: 460px"name="deskripsipromomp"></textarea>
                      </div>
                    </div>
                    
                  <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Syarat dan ketentuan</label>
                        <textarea class="form-control" rows="5" placeholder="Masukan syarat an ketentuan ..." style="width: 460px"name="syaratdanketentuan"></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Periode promo</label>
                        <input type="text" class="form-control" placeholder="Masukan periode promo ..."name="periodepromomp">
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nominal promo</label>
                        <input type="text" class="form-control" placeholder="Masukan nominal promo ..."name="nominalpromomp">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Kode promo</label>
                        <input type="text" class="form-control" placeholder="Masukan kode promo..."name="kodepromomp">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Gambar promo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="gambarpromomp">
                        <label class="custom-file-label" for="exampleInputFile">Masukan file gambar promo ...</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

              </form>  
          
        </div>
      </div>
    </div>
      <!-- /.container-fluid -->
        
    </section>
    <!-- /.content -->
@endsection
