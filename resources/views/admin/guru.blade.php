@extends('layout.master')

@section('content')

<div class="col-lg-12">

  @if (session('success'))
  <x-success-Msg/>
  @endif
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#addGuru" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-fw fa-plus"></i><span>Tambah</span></button>
    </div>
    <div class="collapse show px-3 mb-3" id="addGuru">
      <div class="card p-3 col-lg-6">
        <form action="/guru" method="POST">
          @csrf
          <x-form.input-form type="text" value="" key="nama_guru" action="add" label="Nama Guru" :guru="$guru" />
          <x-form.input-form type="text" value="" key="nip" action="add" label="NIP" :guru="$guru" />
          <div class="form-group">
            <select class="form-control custom-select @error('role_guru') is-invalid @enderror" name='role_guru' id="kelas">
              <option value="">Pilih Role Guru</option>
                  <option value="wali">Wali</option>
                  <option value="guru">Guru</option>
            </select>
            <x-error-validation input="role_guru" />
          </div>
          <x-btn-submit title="Tambah" />
          <hr>
        </form>
      </div>
    </div>
</div>
    <div class="card">
      <div class="table-responsive p-3">
        <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row"><div class="col-sm-12"><table class="table align-items-center table-flush table-hover dataTable" id="dataTableHover" role="grid" aria-describedby="dataTableHover_info">
          <thead class="thead-light">
            <tr role="row">
              <th class="sorting_asc" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >No</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Nama</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">NIK</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Role</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Opsi</th>
            </tr>
          </thead>
          {{-- <tfoot>
            <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
          </tfoot> --}}
          <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($guru as $std)
              <tr role="row" class="odd">
              <td class="sorting_1">{{$i++}}</td>
              <td>{{$std->nama_guru}}</td>
              <td>{{$std->nip}}</td>
              <td>{{$std->role_guru}}</td>
              <td class="d-inline">
                <a href="guru/set-mapel/{{$std->id}}" class="btn btn-success btn-sm text-white">
                    <i class="fas fa-book"></i></a>
                <a href="guru/{{$std->id}}" class="btn btn-warning btn-sm text-white">
                    <i class="fas fa-edit"></i></a>
                {{-- <a href="guru/{{$std->id}}" class="btn btn-sm btn-danger text-white">
                <i class="fas fa-trash"></i>
                </a> --}}
                <form action="/guru/{{$std->id}}" class="d-inline" method="post">
                  @csrf
                  @method('DELETE')
                  <x-btn-delete />
                </form>
                </td>
            </tr> 
            @endforeach

            
          </tbody>
        </table></div></div></div>
      </div>
    </div>
</div>

@endsection