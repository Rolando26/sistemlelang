
<!-- Content Header (Page header) -->

@extends('templates/header')

@section('content')
<section class="content-header">
  <h1>
    Lelang 
    <small>AYO LELANG DISINI !</small>
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
    

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">  

      @if(Auth::user()->role == 'admin' || Auth::user()->role == 'petugas')
               <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
                  {{ $barang->count() }}
              </h3>

              <p>Data Barang</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
                @foreach($user as $user)
                  @foreach($user->lelang as $l)
                    {{$l->count()}}
                  @endforeach
                @endforeach
              </h3>

              <p>Jumlah Bid</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
                {{ $user->count() }}
              </h3>

              <p>Jumlah Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="fa fa-gear"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->


    </section>
    <!-- /.content -->
      @else
      <h3>Informasi Bid</h3>
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
 
        @endif
      </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">

    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

@endsection
