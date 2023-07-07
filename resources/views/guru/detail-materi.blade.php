@extends('layout.master')

@section('content')

<div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <a href="/guru" class="btn btn-danger text-white" type="button"><i class="fas fa-fw fa-arrow-left"></i><span>Back</span></a>
        </div>
        <div class="card p-3">
            <h2>Materi IPA Reproduksi</h2>
            <h5>Kelas : VII A</h5>
            <h5>Mata Pelajaran : IPA</h5>
            <h5>Oleh : Pak Dadang</h5>
            <div class="materi">
                <img src="" alt="">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="format"><i class="fas fa-fw fa-file-pdf"></i> | materi.pdf</div>
                                <div class="download">
                                    <a href=""><i class="fas fa-fw fa-download"></i></a>
                                    <a href=""><i class="fas fa-fw fa-edit"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection