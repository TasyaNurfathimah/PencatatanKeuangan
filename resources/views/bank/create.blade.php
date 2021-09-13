@extends('layouts.layout')
@section('content')
<div class="">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Tambah Rekening Bank</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br/>
          <form class="form-horizontal form-label-left" method="post" action="{{ route('bank.store') }}">
            @csrf
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Bank</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" class="form-control" name="nama_bank" autocomplete="off" autofocus="" required="" placeholder="Nama bank ..">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Pemilik Rekening</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" class="form-control" name="pemilik" autocomplete="off" autofocus="" required="" placeholder="Nama Pemilik Rekening bank ..">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Nomor Rekening</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" class="form-control" name="norek" autocomplete="off" autofocus="" required="" placeholder="Nomor Rekening bank ..">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Saldo Awal</label>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="number" class="form-control" name="saldo" autocomplete="off" autofocus="" required="" placeholder="Saldo bank ..">
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