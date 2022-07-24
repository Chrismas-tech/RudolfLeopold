/* Modal add Subcat */
$('[data-bs-target="#add-category"]').on('click', function(e) {
    /* Move id subcat to field for submission*/
    $id = $(this).attr('id')
    $('[name="sub_cat_id"]').attr('value', $id)

    /* Focus the field, needs setTimeout*/
    setTimeout(() => {
        $('[name="sub_cat_name"]').focus()
    }, 480);
})


$('[data-bs-target="#edit-category"]').on('click', function() {
    $target = $(this).attr('id')
    console.log($target);

    $name = $('[class="edit_name_category_' + $target + '"]').text()
    console.log($name);
    $('[name="edit_sub_cat_name"]').val($name)

    // Input field hidden
    $('[name="edit_sub_cat_id"]').val($target)


    /* Focus the field, needs setTimeout*/
    setTimeout(() => {
        $('[name="edit_sub_cat_name"]').focus()
    }, 480);
})