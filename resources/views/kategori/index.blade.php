@extends('layouts.layout')
@section('content')
<div class="">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Table Kategori</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <a href="{{ route('kategori.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> TAMBAH</a>
          <div class="row">
            <div class="col-sm-12">
              <div class="card-box table-responsive">
                <p class="text-muted font-13 m-b-30">
                 Kategori 
               </p>
               <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr align="center">
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th colspan="2">Opsi</th>
                  </tr>
                </thead>

                <tbody>
                  @php $no=1; @endphp
                  @foreach ($data as $dataKat)
                  <tr align="center">
                    <td>{{ $no++ }}</td>
                    <td>{{ ($dataKat -> nama_kat) }}</td>
                    <td>
                      <a href="{{ route('kategori.edit', $dataKat->id_kat) }}" class="btn btn-primary"><i class="fa fa-pencil-square"></i> Edit</a>
                    </td>
                    <td>
                      <form method="post" action="{{ route('kategori.destroy', $dataKat->id_kat) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Hapus</button>
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