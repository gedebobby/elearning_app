@extends('layout.master')

@section('content')

<div class="col-lg-12">
  @if (session('success'))
  <x-success-Msg/>
  @endif
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <a href="/mapel" class="btn btn-danger text-white" type="button"><i class="fas fa-fw fa-arrow-left"></i><span>Back</span></a>
        </div>
          <div class="card p-3 col-lg-6">
            <form action="/mapel/{{$mapel->id}}" method="POST">
              @csrf
              @method('PUT')
                <x-form.input-form type="text" action="update" key="mapel" label="Mata Pelajaran" :data="$mapel" />
                <x-btn-submit title="Update" />
                <hr>
          </form>
          </div>
    </div>
</div>

@endsection