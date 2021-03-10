
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
  @include('templates/feedback')
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
                <table class="table table-hover">
                  <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Harga Akhir</th>
                    <th>Penawar</th>
                    <th>Action</th>
                  </tr>

                  @if($lelang->count()==0)
                  <div>
                    <td colspan="6" align="center"><b>Tidak Ada Lelang</b></td>
                  </div>
                
                  @else
                  @foreach ($lelang as $l)
                  <tr>
                    <td>{{ !empty($i) ? ++$i : $i=1}}</td>
                    <td>{{ $l->barang->nama_barang }}</td>
                    <td>Rp. {{ number_format($l->harga_akhir) }}</td>
                    <td>
                      @if($l->user_id==null)
                        Belum ada penawar
                      @else
                        {{ $l->user->name}}
                      @endif
                    </td>
                
                    <td>
                      <a href="/tawar-barang/{{$l->id}}"><button class="btn btn-success">Tawar</button></a>
                      <a href="/detail-barang/{{ $l->id }}" class="btn btn-primary">Detail</a>
                    </td>
                  </tr>


                  @endforeach
                  @endif
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


   