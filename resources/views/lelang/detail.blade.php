
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
      <h3 class="box-title">Detail Barang</h3>

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
                <h3 class="box-title"></h3><br><br>
                <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
    
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>Nama Barang</th>
                    <th>Harga Awal</th>
                    <th>Deskripsi Barang</th>
                   
                  </tr>


             
                  <tr>
             
                    <td>{{ $lelang->barang->nama_barang }}</td>
                    <td>Rp.{{ number_format($lelang->barang->harga_awal) }}</td>
                    <td>{{ $lelang->barang->deskripsi_barang }}</td>
              
              
                  </tr>

                </table>
                <hr>
                <br>
                <br>

                {{-- History --}}
                <h3>History </h3>
                <table class="table table-hover">
                  <tr>
                    <th>No</th>
                    <th>Penawar</th>
                    <th>Harga Yang Ditawar</th>
                    <th>Waktu Penawaran</th>
                    <th>Status</th>
                   
                  </tr>
                  @foreach($history as $h)
                  <tr>
                    <td>{{ !empty($i) ? ++$i : $i=1}}</td>
                    <td>{{ $h->user->name }}</td>
                    <td>{{ $h->penawaran_harga}}</td>
                    <td>{{ $h->created_at}}</td>
                    <td>
                      @if($h->user->id == $h->lelang->user_id && $h->lelang->status == "dibuka")
                      <span style="background-color:rgb(0, 247, 0);color:black;border-radius:15px;padding:2px;display:inline">Sedang Menang</span>
                      @elseif($h->user->id == $h->lelang->user_id && $h->lelang->status == "ditutup")
                      <span class="badge bg-success text white">Menang Lelang</span>
                      @elseif($h->user->id != $h->lelang->user_id && $h->lelang->status == "dibuka")
                        <span class="badge bg-danger text white">Sedang Kalah</span>
                      @else
                        <span class="badge bg-secondary text white">Kalah</span>
                      @endif 
                    </td>
                  
                  </tr>
                  @endforeach
           
                </table>
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


   