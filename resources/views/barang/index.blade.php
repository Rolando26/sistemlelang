
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
                <a href="{{ route('barang.create') }}" class="btn btn-success"><i class="fa fa-plus-circle">&nbsp;Tambah</i></a>
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
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Tanggal</th>
                    <th>Harga Awal</th>
                    <th>Deskripsi Barang</th>
                    <th>Action</th>
                  </tr>

                  @if($barang->count()==0)
                  <div>
                    <td colspan="6">Tidak Ada Data</td>
                  </div>
                
                  @else
                  @foreach ($barang as $b)
                  <tr>
                    <td>{{ !empty($i) ? ++$i : $i=1}}</td>
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->nama_barang }}</td>
                    <td>{{ $b->tgl }}</td>
                    <td>{{ $b->harga_awal }}</td>
                    <td>{{ $b->deskripsi_barang }}</td>
                    <td>
                            <a href="{{ route('barang.edit', $b->id )}}" class="btn btn-sm btn-warning">
                            <i class="fa fa-pencil"></i></a>

                            <form action="{{ route('barang.destroy', $b->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya ?') "><i class="fa fa-trash"></i></a>
                            </form>
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
    {{ $barang->links() }}

@endsection


   