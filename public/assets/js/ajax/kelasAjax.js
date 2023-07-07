const page_url = 'http://127.0.0.1:8000/';
 
if ($(location).attr('href') == page_url+'kelas') {
    showDataKelas()
}

function table_kelas(res){
    let htmlView = '';

    if (res.data.length <= 0) {
        htmlView += `
        <tr>
            <td class='text-center' colspan='3'>Data Belum Ada</td>
        </tr>
        `;
    }

    for (let i = 0; i < res.data.length; i++) {
        htmlView += `
        <tr role="row" class="odd">
            <td class="sorting_1">${(i+1)}</td>
            <td>${res.data[i].kelas}</td>
            <td>
            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#updateKelas" id="btnUpdateKelas"
            data-id='${res.data[i].id}'
            data-kelas='${res.data[i].kelas}'
            >
                <i class="fas fa-edit"></i></button>
            <button type="button" data-id="${res.data[i].id}" id="deleteKelas" class="btn btn-sm btn-danger">
            <i class="fas fa-trash"></i>
            </button>
            </td>
        </tr>
    `;  
    }

    $('#tbody').html(htmlView);
}

function showDataKelas(){
    $.ajax({
        method: 'get',
        url: '/kelas',
        success: function(res){
            table_kelas(res);
            // console.log(res.data);
        }
    });
}

$('#submitKelas').click(function(e)
{
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    let data = {
        kelas:$('#kelas').val()
    };

    ajaxService('/api/kelas', 'post', data);
    showDataKelas();
});

$('#submitUpdateKelas').click(function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    let id = $('#id').val();
    let kelas = $('#showKelas').val()
    let url = '/api/kelas/' + id;
    let data = {
        kelas:kelas
    };

    ajaxService(url, 'put', data);
    showDataKelas();
});

$(document).on('click', '#deleteKelas', function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    let id = $(this).data('id');
    let url = '/api/kelas/' + id;
    let data = {
        _token:'{{ csrf_token() }}'
    }

    Swal.fire({
        title: 'Yakin Ingin Menghapus Data?',
        type: 'warning',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak',
    }).then((result) => {
        if (result.isConfirmed) {
          ajaxService(url, 'delete', data);
        }
        showDataKelas();
    })
});

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
            console.log(error);
            for(var err in formErr) {
                $('.' + err + '_err').html(formErr[err][0]);
                $('.invalid-feedback').removeClass('d-none');
                $('#showKelas').addClass('is-invalid');
            }
        }
    });
}
