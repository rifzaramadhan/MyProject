const swalalert = $('.swal').data('swal');
//console.log(swalalert);
    // if (swalalert){
    //     swal.fire({
    //         title: 'Success',
    //         text: swalalert,
    //         type: 'success',
    //         icon: 'success'
    //     })
    // }

// document.querySelector('.sweet-confirm').onclick = function(){
//         swal.fire({
//        title: "Hapus Data",
//        text: "Apakah anda yakin ?",
//        type: "warning",
//        showCancelButton: true,
//        confirmButtonColor: "#DD6B55",
//        confirmButtonText: "Yes, delete it !!",
//        closeOnConfirm: false
//        },
//        );
//     };


function sweetdelete($id_alamat){
    swal.fire({
        title: "Apakah anda yakin menghapus data ?",
        text: "",
        type: "error",
        icon: 'error',
        showCancelButton: true,
        confirmButtonText: "Delete It",
        confirmButtonColor: "#ff0055",
        cancelButtonColor: "#999999",
        reverseButtons: true,
        focusConfirm: false,
        focusCancel: true
      }).then((result) => {
          if (result.isConfirmed){
              //console.log($id_alamat);
              
            $("#coba").val($id_alamat);
            //alert($("#coba").val());
              $form = $("#formDelete");
              $form.submit();
          }
      })
}

$('.tombol-hapus').on('click', function (e){
    e.preventDefault();
    const href = $(this).attr('type');
    swal.fire({
        title: "Apakah anda yakin menghapus data ?",
        text: "",
        type: "error",
        icon: 'error',
        showCancelButton: true,
        confirmButtonText: "Delete It",
        confirmButtonColor: "#ff0055",
        cancelButtonColor: "#999999",
        reverseButtons: true,
        focusConfirm: false,
        focusCancel: true
      }).then((result) => {
          if (result.isConfirmed){
              document.location.type = href
          }
      })
});

$(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000,
      timerProgressBar: true
    });

    if (swalalert){
        Toast.fire({
            title: swalalert,
            icon: 'success'
        })

    }

});