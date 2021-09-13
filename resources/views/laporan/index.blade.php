@extends('layouts.layout')
@section('content')
<div class="">
  <div class="clearfix"></div>  
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel"> 
        <div class="x_title">
          <h2>Laporan Transaksi</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="row">
            <div class="col-sm-12">
              <div class="card-box table-responsive">
                <div class="col-sm-6">
                  <form action="" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="tgl_awal">Dari Tanggal</label>
                      <input type="date" name="tgl_awal" id="tgl_awal" class="form-control form-control-sm" required="">
                    </div>
                    <div class="form-group">
                      <label for="tgl_awal">Sampai Tanggal</label>
                      <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control form-control-sm" required="">
                    </div>
                    <a href="" onclick="this.href='/cetak/'+document.getElementById('tgl_awal').value + '/' + document.getElementById('tgl_akhir').value" target="_blank" class="btn btn-primary col-sm-6">Ekspor PDF Pertanggal</a>
                    <a href="{{ route('pdf') }}" target="_blank" class="btn btn-primary col-sm-6"><i class="fa fa-file-pdf-o"></i>Ekspor PDF</a>
                  </form>
                </div>
               <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr align="center">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Uraian</th>
                    <th>Pemasukan</th>
                    <th>Pengeluaran</th>
                    <th>Saldo</th>
                  </tr>
                </thead>

                <tbody>
                  @php $no=1; $saldo=0; @endphp
                  @foreach ($data as $dataLap)
                  <tr align="center">
                    <td>{{ $no++ }}</td>
                    <td>{{ ($dataLap->tanggal_trans) }}</td>
                    <td>{{ ($dataLap->uraian) }}</td>
                    <td>{{"Rp. ".number_format($dataLap->pemasukan)." ,-"}}</td>
                    <td>{{"Rp. ".number_format($dataLap->pengeluaran)." ,-"}}</td>
                    <td>
                      @if(($dataLap->pengeluaran) == 0)
                        {{ "Rp. ".number_format($saldo+=($dataLap->pemasukan))." ,-" }}
                      @else(($dataLap->pemasukan) == 0)
                        {{ "Rp. ".number_format($saldo-=($dataLap->pengeluaran))." ,-" }}
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection