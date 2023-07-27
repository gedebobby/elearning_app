@extends('layout.master')

@section('content')

<div class="row mb-3">
    <!-- Invoice Example -->
    <div class="col-xl-12 col-lg-7 mb-4">
    @if (session('msg'))
      <div class='alert alert-danger alert-dismissible' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>×</span>
        </button>
        <h6><i class='fas fa-check'></i><b> Failed!</b></h6>
        {{session('msg')}}
      </div>
      @endif
        <form action="/student/ujian/{{$idujian}}" method="POST" class="">
        <div class="ujian-btn w-100 px-1 d-flex">
            {{-- <p class="my-auto mr-2">Perhatian! : Waktu Anda Mengerjakan {{$ujian->waktu}} menit mulai dari Jam {{$ujian->waktu_mulai}}</p> --}}
            {{-- <p class="my-auto mr-2">Waktu :</p> --}}
            
            <button type="submit" class="btn btn-warning btn-submit-ujian mr-2">Selesai</button>
            <button type="button" class="btn btn-success mr-2 d-none" id="btnShowTime"
            data-date="{{$ujian->tgl_mulai}}"    
            data-endtime="{{$ujian->endtime}}"    
            >Lihat Waktu</button>
            <div class="clock-builder-output my-auto mr-2"></div>
        </div>
        <div class="mt-2 p-2" style="height: 500px; overflow-y: scroll;">
        @php
            $i = 1;
            @endphp
        @foreach ($soal as $std) 
        <div class="my-1 mb-3 d-flex flex-row align-items-center justify-content-between">
            <div class="card p-3 w-100">
                <p>{{$i++}}. {{strip_tags($std->soal)}}</p>
                    @csrf
                    <input type="hidden" name="id_soal[{{$std->id}}]" value="{{$std->id}}">
                    <input type="hidden" name="id_ujian[{{$std->id}}]" value="{{$std->id_ujian}}">
                    <input type="hidden" name="id_siswa[{{$std->id}}]" value="{{Session('id_siswa')}}">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban[{{$std->id}}]" id="a[{{$std->id}}]" value="a" >
                        <label class="form-check-label" for="a[{{$std->id}}]">
                            {{$std->opsi_a}}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban[{{$std->id}}]" id="b[{{$std->id}}]" value="b" >
                        <label class="form-check-label" for="b[{{$std->id}}]">
                            {{$std->opsi_b}}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban[{{$std->id}}]" id="c[{{$std->id}}]" value="c" >
                        <label class="form-check-label" for="c[{{$std->id}}]">
                            {{$std->opsi_c}}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban[{{$std->id}}]" id="d[{{$std->id}}]" value="d" >
                        <label class="form-check-label" for="d[{{$std->id}}]">
                            {{$std->opsi_d}}
                        </label>
                    </div>
                </div>
            </div>
            @endforeach
        </form>
        </div>
    </div>
  </div>

@endsection