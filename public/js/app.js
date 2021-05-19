
  var forms = document.querySelectorAll('.needs-validator')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
      .forEach(function (form) {
      form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
          }
  
          form.classList.add('was-validated')
      }, false)
      


$(function () {
          
    $('#txtnumber').keydown(function (e) {
        var key = e.charCode || e.keyCode || 0;
        $text = $(this);
        if ( key !== 8 && key !== 15 && key !== 17) {
            if ($text.val().length === 8) {
                $text.val($text.val() + '-');
            }
            if ($text.val().length === 15) {
                $text.val($text.val() + '-');
            }
            if ($text.val().length === 17) {
                $text.val($text.val() + '-');
            }
        }
    });


    // $( ".selector" ).datepicker({
    //     format: "MM dd yyyy"
    // }); 

    $('.mdb-select').materialSelect();


    $('select').select2({
        placeholder: 'Pilih Nama',
        allowClear: true
    });

    $('.mdb-select').select2();

    
    // $('.tab-reload').load(function() {
    //     location.reload();
    // });

});

