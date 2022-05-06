

 var table = $('.custom-datatable').DataTable({
        createdRow: function ( row, data, index ) {
           $(row).addClass('selected')
        },
     "pageLength": 10000
    });

$(".alert").fadeTo(2000, 500).slideUp(500, function () {
    $(".alert").slideUp(500);
});


// ajax call for change status of active/suspend
$('.change-status-record').on('click', function () {
    var url = $(this).data('url');
    var status = $(this).data('status');
    if (url == "changeStatus-applyjob"){
        //if (url == "changeStatus-applyjob" || url == "changeStatus-job"){
        var message = "You won't be able to recover this!";
        var button = "Yes, delete it!";
    }else{
        var message = "You won't be able to " + status + " this!";
        var button = "Yes, " + status + " it!";
    }
    Swal.fire({
        title: 'Are you sure?',
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: button
    }).then((result) => {
        if (result.isConfirmed) {


            var id = $(this).data('id');
            var status = $(this).data('status');
            $.ajax({
                url: url,
                type: "PUT",
                cache: false,
                dataType: "json",
                data: {"_token": CSRF_TOKEN, 'id': id, 'status': status},
                success: function (data) {
                    Swal.fire({
                        title: data.success,
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false,
                        onClose: () => {
                            location.reload();
                        }
                    });
                }
            });
        }
    });
});

//ajax call for adding job category
$("body").on('click', '.custom-add-dropdown-sweet-alert', function (e) {
    e.preventDefault();
    var action = $(this).data('action');
    var module = $(this).data('module');
    var posModule = $(this).data('pos-module');
    var title = $(this).data('title');
    var inputName = $(this).data('input-name');
    var inputPositions = $(this).data('input-positions');


    Swal.fire({
        title: title,
        html: '<input type="text" name="' + inputName + '" id="' + inputName + '" class="swal2-input" placeholder="Enter ' + module + ' name" required><input type="text" name="' + inputPositions + '" id="' + inputPositions + '" class="swal2-input" placeholder="Enter ' + posModule + ' " required>',
        confirmButtonText: 'Save',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        focusConfirm: false,
        preConfirm: () => {
            const input = Swal.getPopup().querySelector('#' + inputName).value
            const inputpos = Swal.getPopup().querySelector('#' + inputPositions).value
            if (!input && !inputpos) {
                Swal.showValidationMessage(`Please enter values`)
            }
            return { input: input, inputpos: inputpos }

        }
    }).then((result) => {

        var inputValue = result.value.input;
        var inputValuePos = result.value.inputpos;
        $.ajax({
            type: 'POST',
            url: action,
            data: { "_token": CSRF_TOKEN, 'title': inputValue, 'positions': inputValuePos },
            cache: false,
            dataType: "json",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function (response) {
                console.log(response.status); return false;
                if (response.status == true) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        window.location.reload();
                    });
                } else {

                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        window.location.reload();
                    });

                }
            }
        });

    })
});



// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
