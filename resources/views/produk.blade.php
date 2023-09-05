@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Produk</li>
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
                <h3 class="card-title">List data produk Market-TANI</h3>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Add item</button>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">Id</th>
                      <th>Nama produk</th>
                      <th>Harga produk</th>
                      <th>Stock produk</th>
                      <th>Kategori produk</th>
                      <th>Gambar produk</th>
                      <th>Deskripsi produk</th>
                      <th>Pembaharuan produk</th>
                      <th style="width: 10px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                @foreach($listproduk as $data)
                    <tr>
                      <td>{{$data->id}}</td>
                      <td>{{$data->namaproduk}}</td>
                      <td>{{"Rp. ".number_format($data->hargaproduk)}}</td>
                      <td>{{$data->stockproduk ."Kg"}}</td>
                      <td>{{$data->kategoriproduk}}</td>
                      <td>{{$data->gambarproduk}}</td>
                      <td>{{$data->deskripsiproduk}}</td>
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
              <h5 class="modal-title" id="exampleModalLabel">Tambah item produk</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data">
              @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label>Nama produk</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan nama produk ..." name="namaproduk">
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" placeholder="Masukan harga produk ..."name="hargaproduk">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Stock produk</label>
                        <input type="text" class="form-control" placeholder="Masukan stock produk ..."name="stockproduk">
                      </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kategori produk</label>
                        <select class="form-control"name="kategoriproduk">
                          <option value="1">option 1</option>
                          <option value="1">option 2</option>
                          <option value="1">option 3</option>
                          <option value="1">option 4</option>
                          <option value="1">option 5</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Gambar produk</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="gambarproduk">
                        <label class="custom-file-label" for="exampleInputFile">Masukan file gambar produk ...</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Deskripsi produk</label>
                        <textarea class="form-control" rows="3" placeholder="Masukan deskripsi produk ..." style="width: 460px"name="deskripsiproduk"></textarea>
                      </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Tambah</button>
                </div>

              </form>  
          
        </div>
      </div>
    </div>
      <!-- /.container-fluid -->
        
    </section>
    <!-- /.content -->
@endsection
