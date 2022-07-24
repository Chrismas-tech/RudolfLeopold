export class SweetAlert {
    constructor(
        target_class,
        title,
        message,
        icon,
        form_submit,
    ) {

        /* console.log('constructor');
        console.log($(form_submit)); */

        // Variables
        this.target_class = (target_class !== undefined) ? target_class : '.delete-sweet-alert';
        this.title = (title !== undefined) ? title : 'Are you sure ?';
        this.icon = (icon !== undefined) ? icon : 'warning';
        this.message = message;
        this.form_submit = form_submit;

        // Method
        this.popup(
            this.target_class,
            this.title,
            this.message,
            this.icon,
            this.form_submit
        );
    }

    popup(target_class, title, message, icon, form_submit) {

        $(document).on('click', target_class, function(e) {
            e.preventDefault()

            // Case Product Clone
            // Because there are multiple clonage possible we have to target the id this time
            if (form_submit == 'clone') {
                let id_target_clone = $(this).attr('id').split('_')[1]
                form_submit = '#form_clone_product_' + id_target_clone
            }

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success my-white',
                    cancelButton: 'btn btn-danger my-white me-2'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: title,
                text: message,
                icon: icon,
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $(form_submit).submit();
                } else {
                    result.dismiss === Swal.DismissReason.cancel
                }
            })

        })
    }
}