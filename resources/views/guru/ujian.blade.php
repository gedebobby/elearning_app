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
            <form action="/ujian" method="POST">
              @csrf
              <input type="hidden" value="{{session('id_guru')}}" name="id_guru">
              <x-form.input-form type="text" value="" key="nama_ujian" action="add" label="Nama Ujian" />
              <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>
                        <select class="form-control custom-select @error('id_mapel') is-invalid @enderror" name='id_mapel' id="mapel">
                            <option value="">Pilih Mapel</option>
                            @foreach ($mapel as $std)
                              @foreach ($std->tb_mapel_guru as $m)
                              <option {{ old('id_mapel') == $m->id ? "selected" : "" }} value="{{ $m->id }}" >{{$m->mapel}}</option>
                              @endforeach
                            @endforeach
                        </select>
                        <x-error-validation input="id_mapel" />
                      </div> 
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="mapel">Kelas</label>
                        <select class="form-control custom-select @error('id_kelas') is-invalid @enderror" name='id_kelas' id="kelas">
                            <option value="">Pilih Kelas</option>
                          @foreach ($kelas as $std)
                            <option {{ old('id_kelas') == $std->id ? "selected" : "" }} value="{{ $std->id }}" >{{$std->kelas}}</option>
                          @endforeach
                        </select>
                        <x-error-validation input="id_kelas" />
                      </div> 
                </div>
                <div class="col-lg-6">
                  <x-form.input-form type="date" value="" key="tgl_mulai" action="add" label="Tanggal Mulai Ujian" />
                </div>
                <div class="col-lg-6">
                  <x-form.input-form type="time" value="" key="waktu_mulai" action="add" label="Waktu Mulai Ujian" />
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="mapel">Durasi Ujian</label>
                        <select class="form-control custom-select @error('waktu') is-invalid @enderror" name='waktu' id="mapel">
                            <option value="">Pilih Waktu</option>
                            <option {{ old('waktu') == '60' ? "selected" : "" }} value="60">60 Menit</option>
                            <option {{ old('waktu') == '90' ? "selected" : "" }} value="90">90 Menit</option>
                            <option {{ old('waktu') == '120' ? "selected" : "" }} value="120">120 Menit</option>
                        </select>
                        <x-error-validation input="waktu" />
                      </div> 
                </div>
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
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Nama Ujian</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Kelas</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Mapel</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Waktu</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Tgl Mulai</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Deadline</th>
              {{-- <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Status</th> --}}
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
            @foreach ($ujian as $std)
            <tr role="row" class="odd">
                <td class="sorting_1">{{$i++}}</td>
                <td>{{$std->nama_ujian}}</td>
                <td>{{$std->kelas->kelas}}</td>
                <td>{{$std->mapel->mapel}}</td>
                <td>{{$std->waktu}} Menit</td>
                <td>{{$std->tgl_mulai}}</td>
                <td>{{$std->waktu_mulai}} - {{$std->endtime}}</td>
                {{-- <td>
                  @if ($std->status == 0)
                  <span class="badge badge-danger">Ujian Sudah Selesai</span>
                  @else
                  <span class="badge badge-warning">Ujian Dimulai</span>                      
                  @endif
                </td> --}}
                <td>
                  <a href="/ujian/soal/{{$std->id}}" class="btn btn-success btn-sm"><i class="fas fa-clipboard-list"></i></a>
                  <a href="ujian/{{$std->id}}" class="btn btn-warning btn-sm text-white"><i class="fas fa-edit"></i></a>
                  <form action="/ujian/{{$std->id}}" class="d-inline" method="post">
                    @csrf
                    @method('DELETE')
                    <x-btn-delete />
                  </form>
                  <a href="ujian/hasil/{{$std->id}}/{{$std->id_kelas}}" class="btn btn-primary btn-sm text-white @if($std->status == 0) disabled @endif"><i class="fas fa-eye"></i></a>
                </td>
            </tr> 
            @endforeach            
          </tbody>
        </table></div></div></div>
      </div>
  </div>
</div>

@endsection

