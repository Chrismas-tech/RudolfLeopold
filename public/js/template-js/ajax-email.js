$(function() {
    $('#submit_contact_form').on('click', function(e) {
        e.preventDefault()
        console.log('ajax-email');

        $('#mail-errors').html('')
        $('#mail-success').html('')

        let name = $('#name').val()
        let subject = $('#subject').val()
        let files = $('#files').val()
        let message = $('#message').val()
        let email = $('#email').val()

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '/ajax-email',
            data: {
                name: name,
                subject: subject,
                message: message,
                email: email,
                files: files,
            },
            success: function(data) {
                console.log(data);
                if (data.success) {
                    $('#mail-success').append(`
                    <div class="alert alert-success">
                        <li>` + data.success + `</li>
                    </div>
                    `)
                } else {
                    let errors = data.errors

                    let div_mail_errors =
                        $(document.createElement('div'))
                        .addClass('alert alert-danger')

                    $('#mail-errors').append(div_mail_errors)

                    errors.forEach(error => {
                        div_mail_errors.append(`<li>` + error + `</li>`)
                    });
                }
            },
            error: function(data) {
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