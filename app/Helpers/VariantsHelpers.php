<?php

namespace App\Helpers;

use App\Models\MultipleImageSimpleProduct;
use App\Models\ProductOption;
use App\Models\ProductOptionPivot;
use App\Models\ProductVariant;

class VariantsHelpers
{

    public static function create_variants_or_not($checkboxes_option_ids, $new_product)
    {
        // If checkboxes options exist => create combination variants
        if (!empty($checkboxes_option_ids)) {

            $new_product->update(
                [
                    'variant' => 1,
                ]
            );

            VariantsHelpers::create_combination_variants($checkboxes_option_ids, $new_product);
        } else {

            $new_product->update(
                [
                    'variant' => 0,
                ]
            );

            VariantsHelpers::create_one_combination_variant($new_product);
        }
    }

    public static function create_combination_variants($checkboxes_option_ids, $new_product)
    {
        /* dd($new_product); */
        // Table Pivot ProductOptions
        foreach ($checkboxes_option_ids as $option) {
            ProductOptionPivot::create(
                [
                    'product_id' => $new_product->id,
                    'product_option_id' => $option,
                ]
            );
        }

        // Prepare Combinations
        $combination_variants = VariantsHelpers::combination_all_variants($checkboxes_option_ids);

        // Create All Product Variants
        if (count($combination_variants)) {
            foreach ($combination_variants as $value) {
                ProductVariant::create(
                    [
                        'product_id' => $new_product->id,
                        'name' => $value,
                    ]
                );
            }
        }
    }

    public static function create_one_combination_variant($new_product)
    {
        ProductVariant::create(
            [
                'product_id' => $new_product->id,
                'name' => 'Simple Product',
            ]
        );
    }

    /**
     * Delete old ProductVariant 
     * Delete old ProductOptionPivot
     * Delete all files of ProductVariant
     */
    public static function delete_old_variants_product($update)
    {
        // Product Variant target
        $variant_update = ProductVariant::where('product_id', $update->id)->get();
        $product_option_pivot_update = ProductOptionPivot::where('product_id', $update->id)->get();
        $multi_images_simple_product = MultipleImageSimpleProduct::where('product_id', $update->id)->get();

        // Delete All Files Product Variants if exist
        if (count($variant_update)) {
            FileHelpers::delete_folder(public_path('img/img-template/products/product-' . $update->id . '/product-variants/'));
        }

        //Delete Old entries Model if exist 
        FileHelpers::delete_old_model_entries($variant_update);
        FileHelpers::delete_old_model_entries($product_option_pivot_update);
        FileHelpers::delete_old_model_entries($multi_images_simple_product);
    }

    /* public static function update_combination_variants($update, $checkboxes_options_new)
    {
        if (count($checkboxes_options_new)) {

            foreach ($checkboxes_options_new as $value) {
                $option = ProductOption::where('id', $value)->first();
                if ($option) {
                    ProductOptionPivot::create(
                        [
                            'product_id' => $update->id,
                            'product_option_id' => $option->id,
                        ]
                    );
                }
            }

            $combination_variants = VariantsHelpers::combination_all_variants($checkboxes_options_new);
        } else {
            $combination_variants = [];
        }


        if (count($combination_variants)) {
            foreach ($combination_variants as $value) {
                ProductVariant::create(
                    [
                        'product_id' => $update->id,
                        'name' => $value,
                    ]
                );
            }
        } else {
            ProductVariant::create(
                [
                    'product_id' => $update->id,
                    'name' => 'Simple Product',
                ]
            );
        }
    } */

    public static function combination_all_variants($product_option_ids)
    {
        $array_build_product_options = VariantsHelpers::build_array_combination($product_option_ids);
        $array_build_all_combinations = VariantsHelpers::get_all_combinations($array_build_product_options);

        /*  dd($array_build_all_combinations); */

        $combination_all = [];
        $combination_simple = '';

        foreach ($array_build_all_combinations as $combinations) {

            $combination_simple = '';
            foreach ($combinations as $key => $combination) {

                if ($key !== (count($combinations) - 1)) {
                    $combination_simple .= $combination . '/';
                } else {
                    $combination_simple .= $combination . '/';
                    $combination_all[] = '/' . $combination_simple;
                }
            }
        }

        return $combination_all;
    }

    /**
     * Return an array of product options of the current product
     * @param array $product_option_ids
     */
    public static function build_array_combination($product_option_ids): array
    {

        $array_all_product_options = [];

        foreach ($product_option_ids as $product_option_id) {
            $option_values = [];

            $product_option_target = ProductOption::where('id', $product_option_id)->first();

            foreach (json_decode($product_option_target->value) as $value) {
                $option_values[] = $value;
            }

            $array_all_product_options[] = $option_values;
        }

        return $array_all_product_options;
    }

    /**
     * Return an array of product options of the current product
     * @param string $product_option_ids
     */
    /* public static function build_all_combinations($array_options): array
    {
        return VariantsHelpers::get_combinations($array_options);
    } */

    /**
     * Deduct all unique combinations of arrays in an array
     * @param $array [[], [], []]
     */
    public static function get_all_combinations($arrays)
    {
        $result = [[]];

        foreach ($arrays as $property => $property_values) {

            $tmp = [];

            // Here after pass 0 we use $result again in foreach
            foreach ($result as $result_item) {

                // Here we use $property_values as foreach !
                foreach ($property_values as $property_value) {
                    $tmp[] = array_merge($result_item, [$property => $property_value]);
                }
            }

            /* Here after pass 0 
            $result = []
              0 => [
                "clothes" => "XS"
              ]
              1 => []
                "clothes" => "S"
              ]
              2 => []
                "clothes" => "L"
              ]
              3 => []
                "clothes" => "M"
              ]
              4 => []
                "clothes" => "XL"
              ]
              5 => []
                "clothes" => "2XL"
              ]
              6 => []
                "clothes" => "3XL"
              ]
            ]
            */
            $result = $tmp;
        }

        /* dd($result); */

        return $result;
    }
}
