
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
      <h3 class="box-title">Data Lelang</h3>

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
                <section class="invoice">
                    <!-- title row -->
                    <div class="row">
                      <div class="col-xs-12">
                        <h2 class="page-header">
                          <i class="fa fa-globe"></i> Laporan
                          <small class="pull-right">Lelang</small>
                        </h2>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- info row -->
            
              
                    <!-- Table row -->
                    <div class="row">
                      <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga Akhir</th>
                            <th>Penawar</th>
                            <th>Tanggal</th>
                          </tr>
                          </thead>
                          <tbody>
                              @foreach($lelang as $l)
                          <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $l->barang->nama_barang}}</td>
                            <td>{{ $l->harga_akhir}}</td>
                            <td>
                                @if($l->user_id == null)
                                    Belum Ada Penawar
                                @else
                                    {{ $l->user->name }}
                                @endif

                            </td>
                            <td>{{ $l->created_at}}</td>
                          </tr>
                            @endforeach
                         
                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
              
            
                    <!-- /.row -->
              
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                      <div class="col-xs-12">
                        <a href="{{ url('laporan/print') }}" target="_blank" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print</a>
                      </div>
                    </div>
                  </section>
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


   