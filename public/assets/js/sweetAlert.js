$(document).on('click', '.btn-delete', function(e){
    var form = $(this).closest('form');
    e.preventDefault();
    Swal.fire({
        title: 'Anda yakin ingin menghapus?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#6777ef',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelmButtonText: 'Tidak'
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      })
})
$(document).on('click', '.btn-submit-ujian', function(e){
    var form = $(this).closest('form');
    e.preventDefault();
    Swal.fire({
        title: 'Anda yakin Ingin Submit Ujian?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#6777ef',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelmButtonText: 'Tidak'
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      })
})
            

