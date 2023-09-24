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
            {{-- <div class="mb-3">
                <a href="">
                    <i class="fas fa-fw fa-file-excel"></i><span> format_soal</span>
                </a>
            </div> --}}
            <form action="/ujian/addsoal" method="POST">
              @csrf
              <input type="hidden" name="id_ujian" value="{{$idujian}}">
              <div class="form-group">
                <label for="soal">Soal</label>
                <textarea class="form-control ckeditor @error('soal') is-invalid @enderror" id="soal" name="soal" rows="3">{{old('soal')}}</textarea>
                <x-error-validation input="soal" />
              </div>
              <x-form.input-form type="text" value="" key="opsi_a" action="add" label="Opsi A" />
              <x-form.input-form type="text" value="" key="opsi_b" action="add" label="Opsi B" />
              <x-form.input-form type="text" value="" key="opsi_c" action="add" label="Opsi C" />
              <x-form.input-form type="text" value="" key="opsi_d" action="add" label="Opsi D" />
              <div class="form-group">
                  <label for="kunci_jawaban">Kunci Jawaban</label>
                  <select class="form-control custom-select @error('kunci_jawaban') is-invalid @enderror" name='kunci_jawaban' id="kunci_jawaban">
                      <option value="">Pilih Kunci Jawaban</option>
                      <option value="a">A</option>
                      <option value="b">B</option>
                      <option value="c">C</option>
                      <option value="d">D</option>
                  </select>
                  <x-error-validation input="kunci_jawaban" />
                </div>
                <x-btn-submit title="Tambah Soal"/>
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
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Soal</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Opsi A</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Opsi B</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Opsi C</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Opsi D</th>
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
            @foreach ($soal as $std)
            <tr role="row" class="odd">
                <td class="sorting_1">{{$i++}}</td>
                <td>{{$std->soal}}</td>
                <td>{{$std->opsi_a}}</td>
                <td>{{$std->opsi_b}}</td>
                <td>{{$std->opsi_b}}</td>
                <td>{{$std->opsi_d}}</td>
                <td>
                        <a href="/ujian/editSoal/{{$std->id}}" class="btn btn-warning btn-sm text-white">
                          <i class="fas fa-edit"></i>
                        </a>
                        <form action="/ujian/deleteSoal/{{$std->id}}" class="d-inline" method="post">
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
