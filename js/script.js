$(document).ready(() => {
  $('#tombol-cari').hide();
  $('#keyword').on('keyup', () => {
    $('.loader').show();
    // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());
    $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), (data) => {
      $('#container').html(data);
      $('.loader').hide();
    });
  });
});