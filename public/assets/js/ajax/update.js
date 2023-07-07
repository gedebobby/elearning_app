$(document).on('click', '#btnUpdateKelas', function(e){
    
    e.preventDefault();

    var id = $(this).data('id');
    var kelas = $(this).data('kelas');

    $('#id').val(id);
    $('#showKelas').val(kelas);
});

$(document).on('click', '#btnUpdateMapel', function(){
    var id = $(this).data('id');
    var mapel = $(this).data('mapel');

    $('#id').val(id)
    $('#showMapel').val(mapel)
})

$(document).on('click', '#btnDetailMateri', function(){
    // var id = $(this).data('id');
    var nama_materi = $(this).data('namamateri');
    var kelas = $(this).data('kelas');
    var mapel = $(this).data('mapel');
    var file = $(this).data('filemateri');
    var link_materi = $(this).data('linkmateri');

    $('#namamateri').text('Nama Materi : '+nama_materi);
    $('#kelasmateri').text('Kelas : '+kelas);
    $('#mapelmateri').text('Mapel : '+mapel);
    if (file == "") {
        $('#download-materi ').attr('href', '#');
        $('#download-materi-p').text('No File');
    } 
    if(file){
        $('#download-materi').attr('href', 'http://127.0.0.1:8000/materi/download/' + file);
        $('#download-materi-p').text(file);
    }
    if (link_materi == "") {
        $('#link-materi ').attr('href', '#');
        $('#link-materi-p').text('');
    } 
    if(link_materi) {
        $('#link-materi ').attr('href', link_materi);
        $('#link-materi-p').text('Link Materi');   
    }

    console.log(file);
})

$(document).on('click', '#btnNilaiTugas', function(){
    var idsiswa = $(this).data('idsiswa');
    var idtugas = $(this).data('idtugas');

    console.log(idsiswa);
    $('#inputIdSiswa').val(idsiswa)
    $('#inputIdTugas').val(idtugas)
})


// COUNTDOWN

$(document).on('click', '#btnShowTime', function(){

    var date = $(this).data('date');
    var endtime = $(this).data('endtime');
    var finaltime = ""+date +" "+endtime;

    $(".clock-builder-output").countdown(finaltime, function(event) {
    $(this).text(
      event.strftime('%H:%M:%S')
    );
    $('#btnShowTime').attr('disabled', 'disabled');
  });
  });

