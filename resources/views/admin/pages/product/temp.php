<?php

// Multiple Images Variant
if (!empty($request->img_variants)) {
    foreach ($request->img_variants as $key => $image) {

        $product_variant_update = ProductVariant::findOrFail($key);

        //Delete Old File if exist
        if ($product_variant_update->file_path) {
            FileHelpers::delete_file(public_path($product_variant_update->file_path));
        }

        //Update, Save new file and return new path to database
        $file_path = InterventionHelpers::save_image_intervention_product_variants($image, $product_variant_update, 'product-variants');
        /* dd($file_path); */
        $product_variant_update->update(
            [
                'file_path' => $file_path
            ]
        );
    }
}
