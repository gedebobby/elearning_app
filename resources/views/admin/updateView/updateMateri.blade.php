@extends('layout.master')

@section('content')

<div class="col-lg-12">
    @if (session('success'))
  <x-success-Msg/>
  @endif
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <a href="/materi" class="btn btn-danger text-white" type="button"><i class="fas fa-fw fa-arrow-left"></i><span>Back</span></a>
        </div>
          <div class="card p-3 col-lg-6">
            <form action="/materi/{{$materi->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                  <x-form.input-form type="text" value="{{$materi->nama_materi}}" action="add" key="nama_materi" label="Nama Materi" />
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="form-group">
                              <label for="mapel">Mata Pelajaran</label>
                              <select class="form-control custom-select @error('id_mapel') is-invalid @enderror" name='id_mapel' id="mapel">
                                  <option value="">Pilih Mapel</option>
                                  @foreach ($mapel as $std)
                                    @foreach ($std->tb_mapel_guru as $m)
                                    <option {{ $materi->id_mapel == $m->id ? "selected" : "" }} value="{{ $m->id }}" >{{$m->mapel}}</option>
                                    @endforeach
                                  @endforeach
                                  
                              </select>
                              <x-error-validation input="id_mapel" />
                            </div> 
                      </div>
                      <input type="hidden" value="1" name="id_guru">
                      <div class="col-lg-6">
                          <div class="form-group">
                              <label for="kelas">Kelas</label>
                              <select class="form-control custom-select @error('id_kelas') is-invalid @enderror" name='id_kelas' id="kelas">
                                  <option value="">Pilih Kelas</option>
                                @foreach ($kelas as $std)
                                    <option {{ $materi->id_kelas == $std->id ? "selected" : "" }}  value="{{$std->id}}">{{$std->kelas}}</option>
                                @endforeach
                              </select>
                              <x-error-validation input="id_kelas" />
                            </div>
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('file_materi') is-invalid @enderror" name="file_materi" id="customFile">
                        <label class="custom-file-label" for="customFile">{{$materi->file_name}}</label>
                        <x-error-validation input="file_materi"/>
                    </div>
                  </div>
                  <x-form.input-form type="text" value="{{$materi->link_materi}}" action="add" key="link_materi" label="Link Materi" />
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

@endsection