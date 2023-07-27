@extends('layout.master')

@section('content')

<div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <a href="/student/materi" class="btn btn-danger text-white" type="button"><i class="fas fa-fw fa-arrow-left"></i><span>Back</span></a>
        </div>
        @if ($materi->count() == 0)
            <h2 class="p-3">Belum ada materi</h2>
        @endif
        @foreach ($materi as $std)
        <div class="card p-3">
            <h2>{{$std->nama_materi}}</h2>
            <h5>Kelas : {{$std->kelas->kelas}}</h5>
            <h5>Mata Pelajaran : {{$std->mapel->mapel}}</h5>
            <h5>Oleh : {{$std->guru->nama_guru}}</h5>
            <div class="materi">
                <img src="" alt="">
                        <div class="card mb-3 p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="format"><i class="fas fa-fw fa-file-pdf"></i> | {{$std->file_name}}</div>
                                <div class="download">
                                    @if ($std->file_name == null)
                                    <i class="fas fa-fw fa-download"></i>
                                    @else
                                    <a href="/materi/download/{{$std->file_name}}"><i class="fas fa-fw fa-download"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card p-4">
                            <div class="justify-content-between align-items-center">
                                <div class="format"><i class="fas fa-fw fa-paperclip"></i> |
                                    @if ($std->link_materi == null)
                                    Tidak ada Link Materi
                                    @else
                                    <a href="{{$std->link_materi}}">{{$std->link_materi}}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection