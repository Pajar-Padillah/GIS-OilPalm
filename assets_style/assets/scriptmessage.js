const flashData_success = $('.flashdata-success').data('flashdata');

if (flashData_success) {
    Swal.fire({
        title: 'Berhasil',
        text: flashData_success + '!',
        icon: 'success'
    });
}