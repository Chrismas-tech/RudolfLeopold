export class Ajax {

    constructor(url, type, data = null) {
        // Variables
        this.url = url
        this.type = type
        this.data = data

        // Method
        this.ajax()
    }

    ajax() {

        let this_instance = this

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: this.url,
            type: this.type,
            data: this.data,
            success: function(data) {
                this_instance.success_server(data)
            },
            error: function(data) {},
        }, this_instance)
    }

    success_server(data) {
        console.log('AJAX CLASS');
        /*  console.log(data); */
    }

    error_server() {
        console.log('There is an error with the server');
    }
}