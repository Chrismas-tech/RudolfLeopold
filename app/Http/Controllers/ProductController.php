<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelpers;
use App\Models\MultiDigitalFileProduct;
use App\Models\MultipleImageProductVariant;
use App\Models\Product;
use App\Models\ProductOptionPivot;
use App\Models\ProductVariant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    private $admin;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->admin = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function products_all()
    {
        $products = Product::all();
        $digital_files = MultiDigitalFileProduct::all();
        return view(
            'admin.pages.product.products-all',
            [
                'admin' => $this->admin,
                'products' => $products,
                'digital_files' => $digital_files
            ]
        );
    }

    public function delete(Request $request)
    {

        /*     dd($request->all()); */
        if ($request->delete_checkbox) {
            $checkbox_ids = json_decode($request->delete_checkbox);

            foreach ($checkbox_ids as $id) {
                $product = Product::find($id);

                /* Delete all files related to product type */
                $path_folder = public_path('img/img-template/products/product-' . $id);
                FileHelpers::delete_folder($path_folder);

                $product->delete();
                Alert::toast('You successfully deleted the Product !', 'success');
            }
        }

        return redirect()->back();
    }

    public function clone($id)
    {
       /*  dd($id); */

        // Clone Product
        $product = Product::find($id);
        $copy_product = $product->replicate();
        $copy_product->created_at = Carbon::now();
        $copy_product->save();

        //Clone Product Variant
        $product_variants = ProductVariant::where('product_id', $id)->get();

        if (count($product_variants)) {
            foreach ($product_variants as $variant) {

                // Clone Variant
                $variant_copy = $variant->replicate();
                $variant_copy->product_id = $copy_product->id;
                $variant_copy->created_at = Carbon::now();
                $variant_copy->save();

                // If variant has multi images
                $multi_images_variant = MultipleImageProductVariant::where('product_variant_id', $variant->id)->get();

                if (count($multi_images_variant)) {
                    foreach ($multi_images_variant as $img_variant) {
                        $multi_image_copy = $img_variant->replicate();
                        $multi_image_copy->product_variant_id = $variant_copy->id;
                        $multi_image_copy->product_id = $copy_product->id;

                        $multi_image_copy->file_path = str_replace('product-variant-' . $variant->id, 'product-variant-' . $variant_copy->id,  $multi_image_copy->file_path);

                        $multi_image_copy->file_path = str_replace('product-' . $product->id, 'product-' . $copy_product->id,  $multi_image_copy->file_path);

                        $multi_image_copy->created_at = Carbon::now();
                        $multi_image_copy->save();
                    }

                    //Copy the entire Folder Product Files
                    $folder_source_copy =
                        public_path('img/img-template/products/product-' . $product->id);

                    $folder_destination =
                        public_path('img/img-template/products/product-' . $copy_product->id);
                    FileHelpers::copy_folder($folder_source_copy, $folder_destination);

                    $dir = scandir($folder_destination);
                    foreach ($dir as $file) {
                        if (str_contains($file, 'product-variant-' . $variant->id)) {

                            $path_source = $folder_destination . '/product-variant-' . $variant->id;
                            $path_destination = $folder_destination . '/product-variant-' . $variant_copy->id;

                            FileHelpers::copy_folder($path_source, $path_destination);
                            FileHelpers::delete_folder($path_source);
                        }
                    }
                }
            }
        }

        // Clone Product Options
        $product_options = ProductOptionPivot::where('product_id', $id)->get();

        if (count($product_options)) {
            foreach ($product_options as $option) {
                $option_copy = $option->replicate();
                $option_copy->product_id = $copy_product->id;
                $option_copy->created_at = Carbon::now();
                $option_copy->save();
            }
        }

        Alert::toast('Your Product has been successfully duplicated !', 'success');
        return redirect()->back();
    }
}
