/* Sweet Alert modal delete  */
$(function() {
    $(document).on('click', '#submit-upload', function(e) {
        /* console.log('yolo') */
        /* e.preventDefault() */
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false,
            width: 600
        })

        swalWithBootstrapButtons.fire({
            title: '<h2 class="please-wait">Please wait during the process...</h2>',
            iconHtml: '<img style="width:250px;max-width:none;" src="../../../../../img/img-admin/loading.webp">',
            customClass: {
                icon: 'no-border',
            },
            showCancelButton: false,
            showConfirmButton: false,
            reverseButtons: true
        })
    })
})