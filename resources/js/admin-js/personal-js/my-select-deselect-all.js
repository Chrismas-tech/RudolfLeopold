$(function () {
    //Variables

    //Check Multiple Deletion
    let checkbox_ids = [];
    console.log(checkbox_ids);

    // select All
    $("#select_all").on("click", function () {
        $(".switch-input").prop("checked", true);

        let switch_inputs = $(".switch-input");

        checkbox_ids = [];
        switch_inputs.each((index, input) => {
            checkbox_ids.push($(input).attr("id").split("_")[1]);
        });

        $("#delete_multiple_entries").val(JSON.stringify(checkbox_ids));

        $("#select_all").addClass("d-none");
        $("#deselect_all").removeClass("d-none");
        $('[class*="delete-button_"]').removeClass("d-none");
        console.log(checkbox_ids);
    });

    // Deselect All
    $("#deselect_all").on("click", function () {
        $(".switch-input").prop("checked", false);

        checkbox_ids = [];

        $("#select_all").removeClass("d-none");
        $("#deselect_all").addClass("d-none");
        $('[class*="delete-button_"]').addClass("d-none");
        console.log(checkbox_ids);
    });

    // select One entry
    $(document).on("click", ".switch-input", function () {
        target_extract_id = $(this).attr("id").split("_")[1];
        if ($(this).is(":checked")) {
            // Add id to array
            checkbox_ids.push(target_extract_id);
            // Visible - Delete Button
            console.log(".delete-button_" + target_extract_id);
            $(".delete-button_" + target_extract_id).removeClass("d-none");
        } else {
            // Remove id to array
            checkbox_ids.forEach((el, index) => {
                if (el === target_extract_id) {
                    checkbox_ids.splice(index, 1);
                }
            });
            // Remove - Delete Button
            console.log(".delete-button_" + target_extract_id);
            $(".delete-button_" + target_extract_id).addClass("d-none");
        }

        console.log(checkbox_ids);
        $("#delete_multiple_entries").val(JSON.stringify(checkbox_ids));
    });
});
