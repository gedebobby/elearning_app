<div class="modal fade modalClose" id="nilai-tugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nilai Tugas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/tugas/nilaitugas" method="POST">
                @csrf
                <input type="hidden" name="inputIdSiswa" id="inputIdSiswa">
                <input type="hidden" name="inputIdTugas" id="inputIdTugas">
                <x-form.input-form type="number" value="" action="add" key="nilai" label="Nilai Tugas" />
                <x-btn-submit title="Beri Nilai" />
            </form>
        </div>
        </div>
    </div>
</div>