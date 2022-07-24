<script src="{{asset('js/admin-js/app.js')}}"></script>
<script src="{{asset('js/admin-js/preview-image-upload.js')}}"></script>
<script src="{{asset('js/admin-js/preview-multi-images-upload.js')}}"></script>
<script src="{{asset('js/admin-js/preview-multi-audio-files-upload.js')}}"></script>
<script src="{{asset('js/admin-js/template-admin-js/simple-datatables.js')}}"></script>

<script>
    $('#zero_config').dataTable({
        aLengthMenu: [
            [15, 25, 50, 100, 200, -1]
            , [15, 25, 50, 100, 200, "All"]
        ]
        , iDisplayLength: 15
    });

</script>

@if(Route::current()->getName() == 'products.all' ||
Route::current()->getName() == 'product-material.edit' ||
Route::current()->getName() == 'options.all')
<script src="{{asset('js/admin-js/avoid-key-press-enter.js')}}"></script>
@endif

