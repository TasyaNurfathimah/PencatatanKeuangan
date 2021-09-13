@extends('layouts.layout')
@section('content')
<div class="">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Tambah Data Hutang</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br/>
          <form class="form-horizontal form-label-left" method="post" action="{{ route('hutang.store') }}">
            @csrf
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="date" class="form-control @error('tgl') is-invalid @enderror" name="tgl" autocomplete="off" autofocus="" value="{{ old('tgl') }}">
                @error('tgl')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Nominal</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="number" class="form-control @error('bayar') is-invalid @enderror" name="bayar" autocomplete="off" autofocus="" value="{{ old('bayar') }}">
                @error('bayar')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Keterangan</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" class="form-control @error('ket') is-invalid @enderror" name="ket" autocomplete="off" autofocus="" value="{{ old('ket') }}">
                @error('ket')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="ln_solid"></div>

            <div class="form-group row">
              <div class="col-md-9 offset-md-3">
                <button type="reset" class="btn btn-primary">Reset</button>
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection