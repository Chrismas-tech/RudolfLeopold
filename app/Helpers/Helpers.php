<?php

namespace App\Helpers;

use App\Models\Category;
use App\Models\MultipleImageSimpleProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class Helpers
{
    public static $collect_parent_ids = [];
    public static $collect_childrens_categories_ids = [];

    /**
     * This array check if the checkboxes names exist by submitting the formular.
     * If the chexbox is not checked, the value will be equal to null
     * @param Request $request
     * @param array $array individual of checkboxes submitted
     */
    public static function manage_checkboxes_website(Request $request, array $array)
    {
        $checkboxes = [];

        foreach ($array as $name_checkbox) {
            $request->$name_checkbox ?
                $checkboxes[$name_checkbox] = $request->$name_checkbox :
                $checkboxes[$name_checkbox] = null;
        }

        return $checkboxes;
    }

    /**
     * This array check if the checkboxes names exist by submitting the formular.
     * If the chexbox is not checked, the value will be equal to null
     * @param Request $request
     * @param array $array individual of checkboxes submitted
     */
    public static function manage_checkboxes_options($product_options_checkboxes)
    {
        $checkboxes = [];

        foreach ($product_options_checkboxes as $option) {
            $checkboxes[] = $option;
        }

        return $checkboxes;
    }

    /**
     * 
     * The checkbox 
     * 
     */
    public static function manage_checkboxes_variant_exist($variant)
    {
        $variant ? 0 : $variant;
        return $variant;
    }

    /**
     * Return the total numbers of current products save in database
     */
    public static function nb_products_database()
    {
        return count(Product::all());
    }

    /**
     * Extract name file of absolute pathinfo
     * @param $path_file
     */
    public static function name_of_file($path_file)
    {
        // We explode the $files_path array to catch the file Name, last element of array
        $file_explode = explode("/", $path_file);
        $count_el_array = count($file_explode);

        // Catch the last element
        $file_name = $file_explode[$count_el_array - 1];

        return $file_name;
    }

    /**
     * Create nanoGallery data-ngthumb attribute
     * @param $path_file
     */
    /* public static function nano_data_thumb_multi_images($image_id)
    {
        $image = MultipleImageSimpleProduct::where('id', $image_id)->first();

        $nano_data_thumb = substr($image->file_path, -4);

        switch ($image->file_path) {
            case '.jpg':
                $nano_data_thumb = str_replace('.jpg', 't.jpg', $image->file_path);
                break;
            case '.jpeg':
                $nano_data_thumb = str_replace('.jpeg', 't.jpeg', $image->file_path);
                break;
            case '.png':
                $nano_data_thumb = str_replace('.png', 't.png', $image->file_path);
                break;
        }
        return $nano_data_thumb;
    } */

    /**
     * Create nanoGallery data-ngthumb attribute
     * @param $path_file
     */
    public static function nano_data_thumb_main_image($product_id)
    {

        $product = Product::where('id', $product_id)->first();
        $nano_data_thumb = substr($product->main_image_path, -4);

        /*  dd($product->main_image_path); */

        switch ($product->main_image_path) {
            case '.jpg':
                $nano_data_thumb = str_replace('.jpg', 't.jpg', $product->main_image_path);
                break;
            case '.jpeg':
                $nano_data_thumb = str_replace('.jpeg', 't.jpeg', $product->main_image_path);
                break;
            case '.png':
                $nano_data_thumb = str_replace('.png', 't.png', $product->main_image_path);
                break;
        }

        /*  dd($nano_data_thumb); */

        return $nano_data_thumb;
    }


    /**
     * Return an array with all images_path of product
     * @param MultipleImageSimpleProduct $multiple_images_product
     */
    /* public static function stock_multiple_images_path($multiple_images_product): array
    {
        $files_path_multiple_images = [];
        foreach ($multiple_images_product as $image) {
            $files_path_multiple_images[] = $image->file_path;
        }
        return $files_path_multiple_images;
    } */


    /**
     * Create ProductCategories Entry
     * @param Request $request
     * @param Product $product
     */
    /* public static function pivot_table_create_product_categories($request, $product)
    {
        ProductCategories::create(
            [
                'product_id' => $product->id,
                'category_id' => $request->cat_id,
            ]
        );
    } */

    /**
     * Update ProductCategories Table
     * @param Request $request
     * @param Product $product
     */
    /* public static function pivot_table_update_product_categories($request, $product)
    {
        $product_update = ProductCategories::where('product_id', $product->id)->first();
        $product_update->update(
            [
                'category_id' => $request->cat_id,
            ]
        );
    } */


    /**
     * Working
     * Collect parent_ids in an array from a Category Model
     * @param Category $category
     */
    public static function category_parents_ids(Category $category)
    {
        return $category->getParentsIDs($category);
    }

    /**
     * Working
     * Collect parent_names in an array from a Category Model
     * @param Category $category
     */
    public static function category_parents_names(Category $category)
    {
        return $category->getParentsNames($category);
    }

    /**
     * Prevent an error if user uses ',' instead of '.' for the price
     * Multiply by 100 for the nb_products_database
     * @param $price
     */
    public static function sanitize_db_price($price)
    {
        return  (float) str_replace(',', '.', $price) * 100;
    }

    /**
     * Return the number of products for a given Category ID
     */
    public static function nb_products_of_category($category_id)
    {

        $category_target = Category::where('id', $category_id)->first();
        $products_of_category = $category_target->products_of_category($category_target);

        return count($products_of_category);
    }

    /**
     * Fill product_tags for Admin 
     * We collect the category names of product and produuct name too
     * @param $request->product_tags
     * @param Product
     */
    public static function fill_products_tags($product_tags, Product $product_update)
    {
        $category_target = Category::where('id', $product_update->category_id)->first();
        $collect_names = $category_target->getParentsNames($category_target);

        $product_tags = json_decode($product_tags);

        foreach ($collect_names as $name) {
            // Push Category names
            $product_tags[] = $name;
        }

        //Push Product Name
        $product_tags[] =  $product_update->name;

        // Convert unique array, serialize to conserve special characters
        $product_tags = serialize(array_unique($product_tags));

         /* dd($product_tags); */

        return $product_tags;
    }

}
