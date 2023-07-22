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
            <form action="/materi" method="POST" enctype="multipart/form-data">
              @csrf
                <x-form.input-form type="text" value="" action="add" key="nama_materi" label="Nama Materi" />
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
                <div class="form-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input @error('file_materi') is-invalid @enderror" name="file_materi" id="customFile">
                      <label class="custom-file-label" for="customFile">Pilih file</label>
                      <x-error-validation input="file_materi" />
                  </div>
                </div>
                <x-form.input-form type="text" value="" action="add" key="link_materi" label="Link Materi" />
                {{-- <div class="form-group">
                  <label for="textarea">Example textarea</label>
                  <textarea class="form-control ckeditor" id="textarea" rows="3"></textarea>
                </div> --}}
                <x-btn-submit title="Tambah" />
                <hr>
            </form>
          </div>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive p-3">
          <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4">
            {{-- <div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTableHover_length"><label>Show <select name="dataTableHover_length" aria-controls="dataTableHover" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="dataTableHover_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTableHover"></label></div></div></div> --}}
          <div class="row"><div class="col-sm-12"><table class="table align-items-center table-flush table-hover dataTable" id="dataTableHover" role="grid" aria-describedby="dataTableHover_info">
            <thead class="thead-light">
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >No</th>
                <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Nama Materi</th>
                <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Mapel</th>
                <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Kelas</th>
                {{-- <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Oleh</th> --}}
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
              @foreach ($materi as $std)
                <tr role="row" class="odd">
                    <td class="sorting_1">{{$i++}}</td>
                    <td>{{$std->nama_materi}}</td>
                    <td>{{$std->mapel->mapel}}</td>
                    <td>{{$std->kelas->kelas}}</td>
                    {{-- <td><a href="student/download/{{$std->file_name}}">download</a></td> --}}
                    {{-- <td>{{$std->guru->nama_guru}}</td> --}}
                    <td>
                        {{-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="btnUpdateKelas">
                            <i class="fas fa-eye"></i></button> --}}
                            <button type="button" class="btn btn-primary btn-sm"
                            data-target="#detail-materi" id="btnDetailMateri"
                            data-toggle="modal"
                            data-namamateri="{{$std->nama_materi}}"
                            data-mapel="{{$std->mapel->mapel}}"
                            data-linkmateri="{{$std->link_materi}}"
                            data-filemateri="{{$std->file_name}}"
                            data-kelas="{{$std->kelas->kelas}}">
                              <i class="fas fa-eye"></i>
                            </button>
                        <a href="materi/{{$std->id}}" class="btn btn-warning btn-sm text-white">
                          <i class="fas fa-edit"></i>
                        </a>
                        <form action="/materi/{{$std->id}}" class="d-inline" method="post">
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
          </table>
        </div>
      </div>
        </div>
        </div>
      </div>
</div>
<x-modal-detail-materi />

@endsection

