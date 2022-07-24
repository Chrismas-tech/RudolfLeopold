<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelpers;
use App\Helpers\InterventionHelpers;
use App\Helpers\PriceHelpers;
use App\Models\MultipleImageProductVariant;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductVariantController extends Controller
{
    private $admin;

    // 1MB => 1048Kbs
    private $ratio_megabytes_to_kilobytes = 1048;
    private $limit_size_multiple_files_upload = 40; // in MB
    private $limit_size_main_image = 5; // in MB
    /*    private $limit_size_total_multi_images = 50; // in MB */
    private $total_qty = 0;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->admin = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function update_variants(Request $request, $id)
    {

        $this->validator($request);

        // Product Target
        $product_to_update = Product::findOrFail($id);

        // Update each Variant Product
        foreach ($request->variants as $key => $variant) {

            // Update only if all text fields => submit
            // Convert price * 100
            // Manage multi images 

            /* We can update these fields independently, on the contrary we cannot updload a variant image without these fields first
            */

            $product_variant_update = ProductVariant::findOrFail($key);

            /*  if (
                $variant['sku'] !== null &&
                $variant['quantity_variant'] !== null &&
                $variant['unit_price'] !== null
            ) { */


            $price_variant = floatval($variant['unit_price']) * 100;
            // 35 => 3500.0


            /* dd($price_variant, $product_variant_update); */

            // Calculate Price After discount if discount
            if (intval($request->discount_percent) > 0) {
                $unit_price_after_discount = PriceHelpers::selling_price_after_discount($request->discount_percent, $price_variant);
                $unit_price =  floatval($price_variant);
            } else {
                $unit_price_after_discount = null;
                $unit_price = floatval($price_variant);
            }

            $product_variant_update->update(
                [
                    'sku' => $variant['sku'],
                    'qty' => $variant['quantity_variant'],
                    'unit_price' => $unit_price,
                    'unit_price_after_discount' => $unit_price_after_discount * 100,
                ]
            );

            // Increment Quantity Product Table property
            $this->total_qty += intval($variant['quantity_variant']);

            // Manage Multiple Images Variant
            $this->manage_multiple_images_variant($variant, $product_variant_update, $id, $key);
            /* } */
        }

        // Manage Main Image Variant
        $this->manage_main_img_variant($request, $product_to_update, $id);
        $lowest_price = $this->manage_lowest_price($id);

        /* dd($lowest_price); */

        // Update Others Field Product Variant
        $product_to_update->update(
            [
                'selling_price' => $lowest_price,
                'qty' => $this->total_qty,
                'discount_percent' => $request->discount_percent,
                'currency_id' => $request->currency,
            ]
        );

        Alert::toast('Your Product Variants have been successfully Updated !', 'success');
        return redirect()->back();
    }

    private function validator($request)
    {

        /* dd($request->all(), $id); */
        $validator = Validator::make(
            $request->all(),
            [
                // Variant Images
                'variants.*.variant_image' => 'file|mimes:jpeg,jpg,png|max:' . ($this->limit_size_multiple_files_upload * $this->ratio_megabytes_to_kilobytes),

                // Main Image
                'main_img_variant' => 'file|mimes:jpeg,jpg,png|max:' . ($this->limit_size_main_image * $this->ratio_megabytes_to_kilobytes),
            ],
            [
                // Variant Images
                'variants.*.variant_multi_images.mimes'  => 'Multiple Images Product Variants : only jpeg, jpg formats allowed.',
                'variants.*.variant_multi_images.max'  => 'Upload Size Product Variant : The total size upload must not exceed ' . $this->limit_size_multiple_files_upload . 'MB',

                // Main Image
                'main_img_variant.mimes'  => 'Main Image Product Variant : only jpeg, jpg formats allowed.',
            ]
        );

        if ($validator->fails()) {
            Alert::toast('Please verify your formular again !', 'error');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('form_1', true);
        }
    }

    private function manage_multiple_images_variant($variant, $product_variant_update, $id, $key)
    {
        // If files uploaded and exist
        if (
            isset($variant['variant_multi_images']) &&
            !empty($variant['variant_multi_images'])
        ) {

            //Delete Old Images Variants if exist
            //Delete old model entries
            $old_img_variants = MultipleImageProductVariant::where('product_variant_id', $key)->get();
            if (count($old_img_variants)) {
                foreach ($old_img_variants as $img_variant) {
                    FileHelpers::delete_file(public_path($img_variant->file_path));
                }
                FileHelpers::delete_old_model_entries($old_img_variants);
            }

            // Save new files images
            InterventionHelpers::save_multi_images_intervention($variant['variant_multi_images'], $id, $product_variant_update->id);
        }
    }

    private function manage_main_img_variant($request, $product_to_update, $id)
    {

        // If Main Image Uploaded
        if ($request->main_img_variant) {
            //Delete Old Main image variant if exist
            //Update model entry file path Product
            FileHelpers::delete_folder(public_path('img/img-template/products/product-' . $id . '/main-image-variant/'));

            // Save new files images
            $file_path = InterventionHelpers::save_image_intervention(
                $request->main_img_variant,
                'products',
                'product',
                $product_to_update->id,
                'main-image-variant-',
                'main-image'
            );

            $product_to_update->update(
                [
                    'file_path' => $file_path,
                    'url' => asset($file_path),
                ]
            );
        }
    }

    private function manage_lowest_price($id)
    {
        // Lowest Price of product Variants
        $product_lowest_price = ProductVariant::where('product_id', $id)
            ->where('unit_price','>', 0)
            ->min('unit_price');

        /* dd($product_lowest_price, $id); */

        if ($product_lowest_price) {
            $lowest_price = $product_lowest_price;
        } else {
            $lowest_price = null;
        }

        return $lowest_price;
    }
}
