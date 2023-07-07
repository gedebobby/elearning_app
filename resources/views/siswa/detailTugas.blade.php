@extends('layout.master')

@section('content')

<div class="col-lg-12">
    @if (session('success'))
    <x-success-Msg/>
    @endif
    <div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <a href="/student/tugas" class="btn btn-danger text-white" type="button"><i class="fas fa-fw fa-arrow-left"></i><span>Back</span></a>
        </div>
        @if ($tugas->count() == 0)
            <h2 class="p-3">Belum ada tugas</h2>
        @endif
        <div class="card p-3 mx-3">
            <h2>{{$tugas->nama_tugas}}</h2>
            <h5>Kelas : {{$tugas->kelas->kelas}}</h5>
            <h5>Mata Pelajaran : {{$tugas->mapel->mapel}}</h5>
            <hr>
            <div>
              <h4>@php
                echo strip_tags($tugas->keterangan)
               @endphp </h4>
            </div>
            <hr>
            {{-- <div class="materi"> --}}
                <form action="/student/tugas" method="POST" enctype="multipart/form-data">
                    @csrf
                      {{-- <x-form.input-form type="text" value="" action="add" key="nama_materi" label="Nama Materi" /> --}}
                      <input type="hidden" name="id_siswa" value="{{Session('id_siswa')}}" id="">
                      <input type="hidden" name="id_tugas" value="{{$tugas->id}}" id="">
                      <input type="hidden" name="id_guru" value="{{$tugas->id_guru}}" id="">
                      <div class="form-group col-6">
                        <div class="custom-file">
                            <input type="file" @if ($tugas->status == '0') disabled @endif class="custom-file-input @error('file_name') is-invalid @enderror" name="file_name" id="customFile">
                            <label class="custom-file-label" for="customFile">Pilih file</label>
                            <x-error-validation input="file_name" />
                        </div>
                      </div>
                      <x-btn-submit title="Tambah" />
                      <hr>
                  </form>
            {{-- </div> --}}
        </div>
    </div>
    </
</div>

@endsection