
<!-- Content Header (Page header) -->

@extends('templates/header')

@section('content')
<section class="content-header">
  <h1>
    Lelang 
    <small>AYO IKUT LELANG DISINI !</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Sistem Lelang</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Pendataan Barang</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">

       <div class="box">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Barang Lelang</h3><br><br>
                <a href="{{ route('barang.index') }}" class="btn btn-primary"><i class="fa fa-chevron-left">&nbsp;Kembali</i></a>
              </div>
              <!-- /.box-header -->
          
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Sunting DataBarang</h3>
                  </div>
                  <!-- /.box-header -->

                  {{-- Menampilkan Error Validasi --}}
                  @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                           @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                           @endforeach
                      </ul>
                  </div>
                 @endif

                  {{-- End Of ERROR --}}


                  <!-- form start -->
                  <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                    <div class="box-body">
                        @csrf
                        @method('PUT')
                      <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" placeholder="Enter NamaBarang" value="{{ $barang->nama_barang }}">
                      </div>

                      <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tgl" value="{{ $barang->tgl }}">
                      </div>

                      
                      <div class="form-group">
                        <label>Harga Awal</label>
                        <input type="text" class="form-control" name="harga_awal" placeholder="Enter HargaAwal" value="{{ $barang->harga_awal }}">
                      </div>
             
                      <div class="form-group">
                        <label>Deskripsi Barang</label>
                        <input type="text" class="form-control" name="deskripsi_barang" rows="3" placeholder="Enter HargaAwal" value="{{ $barang->deskripsi_barang }}">
                      </div>

                    </div>
                    <!-- /.box-body -->
      
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                  </form>
                </div>
        
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
            
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

@endsection


   