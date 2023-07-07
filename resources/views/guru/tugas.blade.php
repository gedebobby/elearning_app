@extends('layout.master')

@section('content')

<div class="col-lg-12">
  @if (session('success'))
  <x-success-Msg/>
  @endif
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#addMateri" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-fw fa-plus"></i><span>Tambah</span></button>
        </div>
        <div class="collapse show px-3 mb-3" id="addMateri">
          <div class="card p-3 col-lg-6">
            <form action="/tugas" method="POST">
              @csrf
              <x-form.input-form type="text" value="" key="nama_tugas" action="add" label="Nama Tugas" />
              <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>
                        <select class="form-control custom-select @error('id_mapel') is-invalid @enderror" name='id_mapel' id="mapel">
                            <option value="">Pilih Mapel</option>
                          @foreach ($mapel as $std)
                            <option {{ old('id_mapel') == $std->id ? "selected" : "" }} value="{{ $std->id }}" >{{$std->mapel}}</option>
                          @endforeach
                        </select>
                        <x-error-validation input="id_mapel" />
                      </div> 
                </div>
                <input type="hidden" value="{{Session('id_guru')}}" name="id_guru">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control custom-select @error('id_kelas') is-invalid @enderror" name='id_kelas' id="kelas">
                            <option value="">Pilih Kelas</option>
                          @foreach ($kelas as $std)
                              <option {{ old('id_kelas') == $std->id ? "selected" : "" }}  value="{{$std->id}}">{{$std->kelas}}</option>
                          @endforeach
                        </select>
                        <x-error-validation input="id_kelas" />
                      </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label for="tanggal">Batas Tanggal</label>
                          <input type="date" value="{{old('tanggal')}}" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name='tanggal'>
                          <x-error-validation input="tanggal" />
                        </div> 
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label for="waktu">Batas Waktu</label>
                            <input type="time" value="{{old('waktu')}}" class="form-control @error('waktu') is-invalid @enderror" id="waktu" name='waktu'>
                            <x-error-validation input="waktu" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <textarea class="form-control ckeditor @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3">{{old('keterangan')}}</textarea>
                  <x-error-validation input="keterangan" />
                </div>
                <x-btn-submit title="Tambah"/>
                <hr>
            </form>
          </div>
        </div>
    </div>
    <div class="card">
      <div class="table-responsive p-3">
        <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4">
              <div class="row">
                <div class="col-sm-12">
                  <table class="table align-items-center table-flush table-hover dataTable" id="dataTableHover" role="grid" aria-describedby="dataTableHover_info"></div>
          <thead class="thead-light">
            <tr role="row">
              <th class="sorting_asc" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >No</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Nama Tugas</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Mapel</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Kelas</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Status</th>
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
            @foreach ($tugas as $std)
            <tr role="row" class="odd">
                <td class="sorting_1">{{$i++}}</td>
                <td>{{$std->nama_tugas}}</td>
                <td>{{$std->mapel->mapel}}</td>
                <td>{{$std->kelas->kelas}}</td>
                <td>@if ($std->status == 1) <span class="badge badge-warning">Waktu Belum Habis</span> @else <span class="badge badge-danger">Waktu Habis</span> @endif</td>
                <td>
                    <a href="tugas/list/{{$std->id}}/{{$std->id_kelas}}" class="btn btn-primary btn-sm">
                        <i class="fas fa-eye"></i></a>
                        <a href="tugas/{{$std->id}}" class="btn btn-warning btn-sm text-white">
                          <i class="fas fa-edit"></i>
                        </a>
                        <form action="/tugas/{{$std->id}}" class="d-inline" method="post">
                          @csrf
                          @method('DELETE')
                          <x-btn-delete />
                        </form>
                </td>
            </tr> 
            @endforeach
            {{-- @php
                $i = 1;
            @endphp
            @foreach ($guru as $std)
              <tr role="row" class="odd">
              <td class="sorting_1">{{$i++}}</td>
              <td>{{$std->nama_guru}}</td>
              <td>{{$std->nip}}</td>
              <td>BLA</td>
            </tr> 
            @endforeach --}}

            
          </tbody>
        </table></div></div></div>
      </div>
  </div>
</div>

@endsection

