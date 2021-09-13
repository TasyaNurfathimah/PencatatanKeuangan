@extends('layouts.layout')
@section('content')
<div class="">
  <div class="clearfix"></div>  
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Table Data Bank</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <a href="{{ route('bank.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> TAMBAH</a>
          <div class="row">
            <div class="col-sm-12">
              <div class="card-box table-responsive">
               <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr align="center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>NO Rekening</th>
                    <th>Saldo</th>
                    <th>Opsi</th>
                  </tr>
                </thead>

                <tbody>
                  @php $no=1; @endphp
                  @foreach ($data as $dataBank)
                  <tr align="center">
                    <td>{{ $no++ }}</td>
                    <td>{{ ($dataBank -> pemilik) }}</td>
                    <td>{{ ($dataBank -> norek) }}</td>
                    <td>{{ "Rp. ".number_format <span id="total">0</span> ." ,-" }}</td>
                    <td>
                      <a href="{{ route('bank.edit', $dataBank->id_bank) }}" class="btn btn-primary"><i class="fa fa-pencil-square"></i> Edit</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <script>
                setInterval(function (){
                  $.ajax({
                    url: '/index/total',
                    type: 'get',
                    success: function (result){
                      $('#total').html(result.total)
                    }
                  });
                }, 1000);
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection