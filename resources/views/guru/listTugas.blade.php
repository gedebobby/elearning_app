@extends('layout.master')

@section('content')

<div class="col-lg-12">
  @if (session('success'))
  <x-success-Msg/>
  @endif
    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <a href="/tugas" class="btn btn-danger text-white" type="button"><i class="fas fa-fw fa-arrow-left"></i><span>Back</span></a>
      </div>
      <div class="table-responsive p-3">
        <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12"><table class="table align-items-center table-flush table-hover dataTable" id="dataTableHover" role="grid" aria-describedby="dataTableHover_info">
          <thead class="thead-light">
            <tr role="row">
              <th class="sorting_asc" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >No</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Nama</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Kelas</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >File Tugas</th>
              <th class="sorting" tabindex="0" aria-controls="dataTableHover" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Nilai</th>
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
            @foreach ($siswa as $std)
              <tr role="row" class="odd">
              <td class="sorting_1">{{$i++}}</td>
              <td>{{$std->nama_siswa}}</td>
              <td>{{$std->kelas->kelas}}</td>
              @php
                  $tugas = App\Http\Controllers\Guru\TugasController::showFileTugas($idtugas, $std->id);
              @endphp
              <td>@if (!$tugas)
                  Belum Mengumpulkan
              @elseif($tugas)
                <a href="/tugas/download/{{$tugas->file_name}}">{{$tugas->file_name}}</a>
              @endif
            </td>
            <td>
              @if (!$tugas)
                Belum Mengumpulkan
              @elseif($tugas)
                @if ($tugas->nilai == 0)
                Belum dinilai
                @else
                {{$tugas->nilai}}
                @endif
              @endif
            </td>
              <td>
                <button type="button" @if(!$tugas) disabled @endif class="btn btn-primary btn-sm"
                  data-target="#nilai-tugas" id="btnNilaiTugas"
                  data-toggle="modal"
                  data-idtugas={{$idtugas}}
                  data-idsiswa={{$std->id}}>
                    <i class="fas fa-pen-square"></i>
                </button>
              </td>
              {{-- <td>
                  <a href="" class="btn btn-warning btn-sm text-white">
                    <i class="fas fa-edit"></i> Beri Nilai</a>
                <form action="/siswa/{{$std->id}}" class="d-inline" method="post">
                  @csrf
                  @method('DELETE')
                  <x-btn-delete />
                </form>
                </td> --}}
            </tr> 
            @endforeach

            
          </tbody>
        </table></div></div></div>
      </div>
    </div>
</div>
<x-modal-nilai-ujian />


@endsection