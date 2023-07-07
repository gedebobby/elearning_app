if ($(location).attr('href') == page_url+'mapel') {
    showDataMapel();
}

function tabel_mapel(res){
    let htmlView = '';

    if (res.data.length <= 0) {
        htmlView += `
        <tr>
            <td class='text-center' colspan='3'>Data Belum Ada<td>
        </tr>
        `;
    }

    // for (const i in res.data.length) {
    for (let i = 0; i < res.data.length; i++) {
        htmlView += `
        <tr role="row" class="odd">
            <td class="sorting_1">${(i+1)}</td>
            <td>${res.data[i].mapel}</td>
            <td>
            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#updateMapel" id="btnUpdateMapel"
            data-id='${res.data[i].id}'
            data-mapel='${res.data[i].mapel}'
            >
                <i class="fas fa-edit"></i></button>
            <button type="button" data-id="${res.data[i].id}" id="deleteMapel" class="btn btn-sm btn-danger">
            <i class="fas fa-trash"></i>
            </button>
            </td>
        </tr>
        `;
    }

    $('#tbody').html(htmlView);

}

function showDataMapel(){
    $.ajax({
        method: 'get',
        url: '/api/mapel',
        success: function(res){
            tabel_mapel(res);
            // console.log(res.data)
        }
    });
}

$('#submitMapel').click(function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    let data = {
        mapel : $('#mapel').val()
    }

    ajaxService('/api/mapel', 'post', data)
    showDataMapel();
});

$('#submitUpdateMapel').click(function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
     let id = $('#id').val()
    let url = 'api/mapel/'+ id
    let data = {
        mapel: $('#showMapel').val()
    }

    console.log(id,data);

    ajaxService(url, 'put', data)
    showDataMapel();
})

function ajaxService(url, method, data){
    $.ajax({
        url: url,
        method: method,
        data: data,
        success: function(res){
            Swal.fire({
            type: 'success',
            icon: 'success',
            title: `${res.message}`,
            showConfirmButton: false,
            timer: 1500
            });
            $('#kelas').val('');
            $('.modalClose').modal('hide');
        },
        error: function(error){
            var formErr = error.responseJSON.errors;
            console.log(formErr);
            for(var err in formErr) {
                $('.' + err + '_err').html(formErr[err][0]);
                $('.invalid-feedback').removeClass('d-none');
                $('#showMapel').addClass('is-invalid');
            }
        }
    });
}

