 {{-- Modal User --}}
 <div class="modal fade modalClose" id="addGuru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah {{$title}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
                <form class="form-kelas" method="POST">
                    @csrf
                <div class="form-group">
                    <label for="nama">Nama Guru</label>
                    <input type="text" class="form-control" id="namaGuru" placeholder="">
                    <label for="nama">NIK</label>
                    <input type="text" class="form-control" id="nikGuru" placeholder="">
                    {{-- <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div> --}}
                    <div class="invalid-feedback guru_err"></div>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitKelas" data-method='post'>Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade modalClose" id="updateGuru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit {{$title}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
                <form class="form-kelas" method="post">
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="hidden" class="form-control" name="id" id="id" placeholder="">
                    <input type="text" class="form-control" name="kelas" id="showGuru" placeholder="">
                    <div class="invalid-feedback guru_err"></div>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitUpdateKelas" data-method="put">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
 {{-- -------------- --}}
 
 
 
 {{-- Modal Kelas --}}
 <div class="modal fade modalClose" id="addKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah {{$title}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
                <form class="form-kelas" method="POST">
                    @csrf
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" class="form-control" id="kelas" placeholder="">
                    {{-- <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div> --}}
                    <div class="invalid-feedback kelas_err"></div>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitKelas" data-method='post'>Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

 <div class="modal fade modalClose" id="updateKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit {{$title}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
                <form class="form-kelas" method="post">
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="hidden" class="form-control" name="id" id="id" placeholder="">
                    <input type="text" class="form-control" name="kelas" id="showKelas" placeholder="">
                    <div class="invalid-feedback kelas_err"></div>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitUpdateKelas" data-method="put">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- --------------------------- --}}


{{-- Modal Mapel --}}
<div class="modal fade modalClose" id="addMapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah {{$title}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
                <form class="form-kelas" method="POST">
                    @csrf
                <div class="form-group">
                    <label for="kelas">Mata Pelajaran</label>
                    <input type="text" class="form-control" id="mapel" placeholder="">
                    {{-- <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div> --}}
                    <div class="invalid-feedback mapel_err"></div>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitMapel" data-method='post'>Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

 <div class="modal fade modalClose" id="updateMapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit {{$title}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
                <form class="form-mapel" method="post">
                <div class="form-group">
                    <label for="mapel">Mata Pelajaran</label>
                    <input type="hidden" class="form-control" name="id" id="id" placeholder="">
                    <input type="text" class="form-control" name="mapel" id="showMapel" placeholder="">
                    <div class="invalid-feedback mapel_err"></div>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitUpdateMapel" data-method="put">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- ---------------------- --}}