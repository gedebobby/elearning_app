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
          <div class="card p-3 col-lg-12">
            <form action="/ujian/updateSoal/{{$idsoal}}" method="POST">
              @csrf
              <input type="hidden" name="id_soal" value="{{$idsoal}}">
              <div class="form-group">
                <label for="soal">Soal</label>
                <textarea class="form-control ckeditor @error('soal') is-invalid @enderror" id="soal" name="soal" rows="3">{{$soal->soal}}</textarea>
                <x-error-validation input="soal" />
              </div>
              <x-form.input-form type="text" value="{{$soal->opsi_a}}" key="opsi_a" action="add" label="Opsi A" />
              <x-form.input-form type="text" value="{{$soal->opsi_b}}" key="opsi_b" action="add" label="Opsi B" />
              <x-form.input-form type="text" value="{{$soal->opsi_c}}" key="opsi_c" action="add" label="Opsi C" />
              <x-form.input-form type="text" value="{{$soal->opsi_d}}" key="opsi_d" action="add" label="Opsi D" />
              <div class="form-group">
                  <label for="kunci_jawaban">Kunci Jawaban</label>
                  <select class="form-control custom-select @error('kunci_jawaban') is-invalid @enderror" name='kunci_jawaban' id="kunci_jawaban">
                      <option value="">Pilih Kunci Jawaban</option>
                      {{-- <option value="">{{$opsi_jawaban}}</option> --}}
                      @foreach ($opsi_jawaban as $std)
                                  <option {{ $soal->kunci_jawaban == $std['value'] ? "selected" : "" }}  value="{{$std['value']}}">{{$std['values']}}</option>
                        @endforeach
                  </select>
                  <x-error-validation input="kunci_jawaban" />
                </div>
                <x-btn-submit title="Tambah Soal"/>
                <hr>
            </form>
          </div>
        </div>
    </div>
</div>

@endsection
