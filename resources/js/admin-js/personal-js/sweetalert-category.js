/* Sweet Alert modal delete  */
$(function() {
    $(document).on('click', '[class*=delete_category_]', function(e) {
        e.preventDefault()
        let url = $(this).attr('href')

        console.log(url);

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success my-white',
                cancelButton: 'btn btn-danger text-white me-2'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "By deleting this category, you will also delete all subcategories and products associated to this category.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                console.log(url);
                window.location.replace(url)

            }
        })
    })
})