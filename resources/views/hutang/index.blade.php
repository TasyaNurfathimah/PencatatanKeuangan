@extends('layouts.layout')
@section('content')
<div class="">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data Hutang</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
          </ul>
          <div class="clearfix"></div>
          <span> Hutang Itu Harus di BAYAR Okayyy!!!</span>
        </div>
        <div class="x_content">
          @if(session('success'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <strong>!!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          <a href="{{ route('hutang.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> TAMBAH</a>
          <div class="row">
            <div class="col-sm-12">
              <div class="card-box table-responsive">
               <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr align="center">
                    <th>No</th>
                    <th>Kode</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Nominal</th>
                    <th colspan="2">Opsi</th>
                  </tr>
                </thead>

                <tbody>
                  @php $no=1; @endphp
                  @foreach ($data as $dataH)
                  <tr align="center">
                    <td>{{ $no++ }}</td>
                    <td>{{ "WBH-".($dataH -> id_hutang) }}</td>
                    <td>{{ ($dataH -> tgl) }}</td>
                    <td>{{ ($dataH -> ket) }}</td>
                    <td>{{ "Rp. " .number_format($dataH -> bayar)." ,-" }}</td>
                    <td>
                      <a href="{{ route('hutang.edit', $dataH->id_hutang) }}" class="btn btn-primary"><i class="fa fa-pencil-square"></i> Edit</a>
                    </td>
                    <td>
                      <form method="post" action="{{ route('hutang.destroy', $dataH->id_hutang) }}">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin ingin Menghapus?!')" type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Hapus</button>
                      </form>
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