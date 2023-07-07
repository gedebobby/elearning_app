@extends('layout.master')

@section('content')

<div class="col-lg-12">
  @if (session('success'))
  <x-success-Msg/>
  @endif
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#addMapel" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-fw fa-plus"></i><span>Tambah</span></button>
    </div>
    <div class="collapse show px-3 mb-3" id="addMapel">
      <div class="card p-3 col-lg-6">
        <form action="/mapel" method="POST">
          @csrf
          <x-form.input-form type="text" value="" key="mapel" action="add" label="Mata Pelajaran" :data="$mapel" />
          <x-btn-submit title="Tambah" />
            <hr>
          </form>
      </div>
    </div>
</div>
    <div class="card">
      <div class="table-responsive p-3">
        <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12"><table class="table align-items-center table-flush table-hover dataTable" id="dataTableHover" role="grid" aria-describedby="dataTableHover_info">
          <thead class="thead-light">
            <tr role="row">
              <th class="sorting_asc" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">No.</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Mapel</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 145.615px;">Opsi</th>
            </tr>
          </thead>
          <tbody id="tbody">
            @php
                $i = 1;
            @endphp
            @foreach ($mapel as $std)
              <tr role="row" class="odd">
              <td class="sorting_1">{{$i++}}</td>
              <td>{{$std->mapel}}</td>
              <td>
                <a href="mapel/{{$std->id}}" class="btn btn-warning btn-sm text-white">
                    <i class="fas fa-edit"></i></a>
                <form action="/mapel/{{$std->id}}" class="d-inline" method="post">
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