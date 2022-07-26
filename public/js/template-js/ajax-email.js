$(function() {
    $('#submit_contact_form').on('click', function(e) {
        e.preventDefault()
            /* console.log('ajax-email'); */

        $('#submit_contact_form').addClass('d-none')
        $('#spinner').removeClass('d-none')
        $('#mail-errors').html('')
        $('#mail-success').html('')

        // Variables
        let formdata = new FormData();

        // formdata.append("images", $('input[type=file]')[0].files);
        formdata.append("name", $('#name').val());
        formdata.append("subject", $('#subject').val());
        formdata.append("message", $('#message').val());
        formdata.append("email", $('#email').val());

        $.each($('#files')[0].files, function(i, file) {
            formdata.append('files[]', file);
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '/ajax-email',
            data: formdata,
            contentType: false,
            processData: false,
            cache: false,
            success: function(data) {

                $('#spinner').addClass('d-none')

                /*  console.log(data); */
                if (data.success) {

                    // Remove Form if success
                    $('#contact_form').addClass('d-none')

                    // Display Success Message
                    $('#mail-success').append(`
                    <div class="alert alert-success">
                        <li>` + data.success + `</li>
                    </div>
                    `)
                } else {

                    $('#submit_contact_form').removeClass('d-none')

                    let errors = data.errors

                    let div_mail_errors =
                        $(document.createElement('div'))
                        .addClass('alert alert-danger')

                    $('#mail-errors').append(div_mail_errors)

                    errors.forEach(error => {
                        /*  console.log(error); */
                        if (error == 'The name is required.') {
                            $('#name').addClass('invalid-form')
                        }
                        if (error == 'The email is required.') {
                            $('#email').addClass('invalid-form')
                        }
                        if (error == 'The subject is required.') {
                            $('#subject').addClass('invalid-form')
                        }
                        if (error == 'The message is required.') {
                            $('#message').addClass('invalid-form')
                        }
                        if (error.includes("file")) {
                            $('#files').addClass('invalid-form')
                        }


                        div_mail_errors.append(`<li>` + error + `</li>`)
                    });


                }
            },
            error: function(data) {

                $('#spinner').addClass('d-none')


                if (data.status == 500) {
                    $('#mail-success').append(`
                    <div class="alert alert-danger">
                        <li>Internal Server Error, please check your internet connection</li>
                    </div>
                    `)
                }
            }
        });
    })
})