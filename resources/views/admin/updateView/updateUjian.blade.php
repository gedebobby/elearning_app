@extends('layout.master')

@section('content')

<div class="col-lg-12">
  @if (session('success'))
  <x-success-Msg/>
  @endif
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <a href="/ujian" class="btn btn-danger text-white" type="button"><i class="fas fa-fw fa-arrow-left"></i><span>Back</span></a>
        </div>
          <div class="card p-3 col-lg-6">
            <form action="/ujian/{{$ujian->id}}" method="POST">
                @csrf
                @method('PUT')
                <x-form.input-form type="text" value="{{$ujian->nama_ujian}}" key="nama_ujian" action="add" label="Nama Ujian" :data="$ujian"/>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>
                        <select class="form-control custom-select @error('id_mapel') is-invalid @enderror" name='id_mapel' id="mapel">
                            <option value="">Pilih Mapel</option>
                            @foreach ($mapel as $std)
                              @foreach ($std->tb_mapel_guru as $m)
                              <option {{ $ujian->id_mapel == $m->id ? "selected" : "" }} value="{{ $m->id }}" >{{$m->mapel}}</option>
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
                            <option {{ $ujian->id_kelas == $std->id ? "selected" : "" }} value="{{ $std->id }}" >{{$std->kelas}}</option>
                          @endforeach
                        </select>
                        <x-error-validation input="id_kelas" />
                      </div> 
                </div>
                <div class="col-lg-6">
                  <x-form.input-form type="date" value="{{$ujian->tgl_mulai}}" key="tgl_mulai" action="add" label="Tanggal Mulai" />
                </div>
                <div class="col-lg-6">
                  <x-form.input-form type="time" value="{{$ujian->waktu_mulai}}" key="waktu_mulai" action="add" label="Waktu Mulai" />
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="mapel">Waktu</label>
                        <select class="form-control custom-select @error('waktu') is-invalid @enderror" name='waktu' id="waktu">
                            <option value="">Pilih Waktu</option>
                            <option {{ $ujian->waktu == '60' ? "selected" : "" }} value="60">60 Menit</option>
                            <option {{ $ujian->waktu == '90' ? "selected" : "" }} value="90">90 Menit</option>
                            <option {{ $ujian->waktu == '120' ? "selected" : "" }} value="120">120 Menit</option>
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

@endsection