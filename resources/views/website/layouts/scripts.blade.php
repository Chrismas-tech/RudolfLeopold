<script src="{{asset('js/template-js/jquery-2.2.4.min.js')}}"></script>
<script src="{{asset('js/template-js/app.js')}}"></script>
<script src="{{asset('js/template-js/sweetalert2.js')}}"></script>
<script src="{{asset('js/template-js/my-mega-menu.js')}}"></script>

<!-- MY-JS -->
<script src="{{asset('js/template-js/my-menu-responsive.js')}}"></script>
<script src="{{asset('js/template-js/my-sidebar-categories-toggle.js')}}"></script>
<script src="{{asset('js/template-js/my-sidebar-categories-manage-nest.js')}}"></script>
<script src="{{asset('js/template-js/my-sidebar-filters.js')}}"></script>
<script src="{{asset('js/template-js/my-reinitialise-filters.js')}}"></script>
<script src="{{asset('js/template-js/my-dropdown-account.js')}}"></script>
<script src="{{asset('js/admin-js/nanogallery2.js')}}"></script>
<!-- MY-JS -->


<!-- Sweet alert modal delete account -->
<script>
    $(function() {
        $(document).on('click', '[class*=delete_account_]', function(e) {
            e.preventDefault()

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success'
                    , cancelButton: 'btn btn-danger'
                }
                , buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?'
                , html: '<a  yolo'
                , text: "Do you really want to delete your account ?"
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonText: '<a id="delete_btn_approve">Yes, delete it!</a>'
                , cancelButtonText: 'No, cancel!'
                , reverseButtons: true
            })
        })
    })

    $(document).on('click', '#delete_btn_approve', function() {
        $('#form_account_approve').submit()
    });

</script>
<!-- Sweet alert modal delete account -->

<!-- Splide Jumbotron -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var splide = new Splide('.splide', {
            type: 'loop'
            , perPage: 1
            , autoplay: true
            , pauseOnHover: false
            , interval: 8000
        , });

        splide.on('pagination:mounted', function(data) {
            // You can add your class to the UL element
            data.list.classList.add('splide__pagination--custom');

            // `items` contains all dot items
            data.items.forEach(function(item) {
                item.button.textContent = '';
            });
        });

        splide.mount();
    });

</script>
<!-- Splide Jumbotron -->

<!-- Drift Zoom Image -->
<script>
    new Drift(document.querySelector(".product-details-main-img"), {
        paneContainer: document.querySelector(".zoom-product-details")
        , inlinePane: false
    , });

</script>
<!-- Drift Zoom Image -->
