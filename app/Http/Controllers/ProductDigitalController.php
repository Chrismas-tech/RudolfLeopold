<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Category;
use App\Models\MultiDigitalFileProduct;
use App\Models\MultiImageProduct;
use App\Models\Product;
use App\Rules\DiscountSmallerThanPrice;
use App\Rules\MultiDigitalTotalSizeUpload;
use App\Rules\MultiImageTotalSizeUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;


class ProductDigitalController extends Controller
{
    private $admin;
    private $ratio_megabytes_to_kilobytes = 1048;

    private $limit_size_main_image = 5; // in MB
    private $limit_size_total_digital_files = 50; // in MB
    private $limit_size_total_multi_images = 50; // in MB

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->admin = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function add_view()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view(
            'admin.pages.product.product-digital.add-product-digital',
            [
                'admin' => $this->admin,
                'categories' => $categories,
            ]
        );
    }

    public function store(Request $request)
    {
        /* dd($request->all()); */
        $validator = Validator::make(
            $request->all(),
            [
                'cat_id' => 'required|max:255',
                'name' => 'required|max:255',
                'product_code' => 'sometimes|nullable|string',
                'product_tags' => 'required',
                'price' => 'required|string',
                'discount_percent' => ['sometimes',  new DiscountSmallerThanPrice($request->price)],
                'long_description' => 'required|string',
                'short_description' => 'required|string',
                'hot_deals' => 'sometimes|boolean',
                'featured' => 'sometimes|boolean',
                'special_deals' => 'sometimes|boolean',
                'status' => 'sometimes|boolean',

                /* Upload Files */
                'multi_digital_files' =>  ['required',  new MultiDigitalTotalSizeUpload($this->limit_size_total_digital_files)],
                'multi_digital_files.*' => 'file|mimes:zip,rar,7zip,mp3,wav,mp4,jpg,jpeg,png',

                'main_image_path' => 'sometimes|file|mimes:jpeg,jpg,png|max:' . ($this->limit_size_main_image * $this->ratio_megabytes_to_kilobytes),

                'multi_images_files' =>  ['sometimes',  new MultiImageTotalSizeUpload($this->limit_size_total_multi_images)],
                'multi_images_files.*' => 'file|mimes:jpeg,jpg,png',
            ],
            [
                'multi_digital_files.*.mimes'  => 'Mutiple Digital Files Upload : only zip, rar, 7zip, mp3, wav, mp4, jpeg, jpg, png formats are allowed.',

                'main_image_path.required' => 'Main Image : is required.',
                'main_image_path.mimes'  => 'Main Image : only accepts jpeg, jpg, png.',
                'main_image_path.max'  => 'Main Image : size is limited to ' . $this->limit_size_main_image . 'MB.',

                'multi_images_files.*.mimes'  => 'Mutiple Images Upload : only jpeg, jpg formats allowed.',

                'product_tags.required' => 'The product tag(s) is required.'
            ]
        );

        if ($validator->fails()) {
            Alert::toast('Please verify your formular again !', 'error');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('form_1', true);
        }

        //Manage checkboxes
        $checkboxes = Helpers::manage_product_checkboxes($request, ['hot_deals', 'special_offer', 'special_deals', 'featured']);
        /* dd($checkboxes); */


        // Find Category to save names with product
        $category = Category::find($request->cat_id);

        /* Create Product */
        $new_product = Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->cat_id,
            'category_name' => $category->name,
            'product_code' => $request->product_code,
            'product_type' => 2,
            'product_qty' => 1,
            'product_tags' => $request->product_tags,
            'main_image_path' => null,
            'price' => Helpers::sanitize_db_price($request->price),
            'discount_percent' => Helpers::sanitize_db_price($request->discount_percent),
            'selling_price' => Helpers::sanitize_db_price($request->price) - Helpers::sanitize_db_price($request->discount_percent),
            'long_description' => $request->long_description,
            'short_description' => $request->short_description,
            'hot_deals' => $checkboxes['hot_deals'],
            'featured' =>  $checkboxes['featured'],
            'special_deals' => $checkboxes['special_deals'],
            'special_offer' =>  $checkboxes['special_offer'],
            'status' => 0,
        ]);

        //Update product_tags_complete
        $new_product->update(
            [
                'product_tags_complete' =>  Helpers::fill_products_tags($request->product_tags, $new_product),
            ]
        );

        // If multiple digital files are uploaded
        if ($request->has('multi_digital_files')) {
            $this->upload_multi_digital_and_save_path($request->multi_digital_files, $new_product);
        }

        // If a main file is uploaded
        if ($request->has('main_image_path')) {

            $main_image_path = $this->upload_one_file_and_return_path_database($request->main_image_path, $new_product);

            $new_product->update(
                [
                    'main_image_path' => $main_image_path
                ]
            );
        }

        // If multiple files image are uploaded
        if ($request->has('multi_images_files')) {
            $this->upload_multi_images_and_save_path($request->multi_images_files, $new_product);
        }

        //Table pivot product_categories
        /* Helpers::pivot_table_create_product_categories($request, $new_product); */

        $new_product->save();
        Alert::toast('Your Digital Product has been successfully created in database !', 'success');
        return redirect()->route('products.all');
    }

    private function upload_one_file_and_return_path_database($file, $new_product)
    {

        $image_file = Helpers::resize_image_product($file);

        $extension_file = $file->extension();
        $file_name = 'main-image-' . time() . '-' . mt_rand() . '.' . $extension_file;

        $folder_path_database = 'admin/product-' . $new_product->id . '/main-image/';
        $folder_path_server = storage_path('app/private/' . $folder_path_database);

        if (!file_exists($folder_path_server)) {
            mkdir($folder_path_server, 0777, true);
        }

        $image_file->save($folder_path_server . $file_name);

        /* Image Path Database */
        return $folder_path_database . $file_name;
    }

    private function upload_multi_digital_and_save_path($files, $new_product)
    {
        foreach ($files as $file) {

            $extension_file = $file->extension();
            $file_name = 'digital-files-' . time() . '-' . mt_rand() . '.' . $extension_file;

            $digital_file_path = 'admin/product-' . $new_product->id . '/digital-files/';

            $file->storeAs($digital_file_path, $file_name, 'private');

            MultiDigitalFileProduct::create(
                [
                    'product_id' => $new_product->id,
                    /* Folder Path Database*/
                    'file_path' => $digital_file_path . $file_name,
                ]
            );
        }
    }

    private function upload_multi_images_and_save_path($files, $new_product)
    {
        foreach ($files as $file) {

            $extension_file = $file->extension();

            $image_file = Helpers::resize_image_product($file);

            $file_name = 'multi-images-' . time() . '-' . mt_rand() . '.' . $extension_file;

            $folder_path_database = 'admin/product-' . $new_product->id . '/multi-images/';
            $folder_path_server = storage_path('app/private/' . $folder_path_database);

            if (!file_exists($folder_path_server)) {
                mkdir($folder_path_server, 0777, true);
            }

            $image_file->save($folder_path_server . $file_name);

            MultiImageProduct::create(
                [
                    'product_id' => $new_product->id,
                    /* Folder path to database*/
                    'file_path' => $folder_path_database . $file_name,
                ]
            );
        }
    }



    public function download_file_serve($id)
    {
        $digital_products = MultiDigitalFileProduct::where('product_id', $id)->get();

        $files_path = [];
        foreach ($digital_products as $digital_path_file) {
            $files_path[] = $digital_path_file->file_path;
        }

        Helpers::compress_files_in_zip_and_download($files_path);
    }

    public function download_file_serve_list($id)
    {
        $digital_products = MultiDigitalFileProduct::where('product_id', $id)->first();

        if ($digital_products->file_path) {
            $file = storage_path('app/private/' . $digital_products->file_path);
        }

        return response()->file($file);
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::orderBy('parent_id', 'asc')->get();

        $multi_digital_files = MultiDigitalFileProduct::where('product_id', $id)->get();
        $multiple_images_product = MultiImageProduct::where('product_id', $id)->get();

        // Stock images product in array
        if ($multiple_images_product) {
            $multiple_images_id = Helpers::stock_multiple_images_path($multiple_images_product);
        }

        return view(
            'admin.pages.product.product-digital.edit-product-digital',
            [
                'admin' => $this->admin,
                'product' => $product,
                'categories' => $categories,
                'multi_digital_files' => $multi_digital_files,
                'multiple_images_id' => $multiple_images_id,
            ]
        );
    }

    public function update(Request $request, $id)
    {
        /* dd($request->all()); */
        $validator = Validator::make(
            $request->all(),
            [
                'cat_id' => 'required|max:255',
                'name' => 'required|max:255',
                'product_code' => 'sometimes|nullable|string',
                'product_tags' => 'sometimes|nullable|string',
                'price' => 'required|string',
                'discount_percent' => ['sometimes',  new DiscountSmallerThanPrice($request->price)],
                'long_description' => 'required|string',
                'short_description' => 'required|string',
                'hot_deals' => 'sometimes|boolean',
                'featured' => 'sometimes|boolean',
                'special_deals' => 'sometimes|boolean',
                'status' => 'sometimes|boolean',
                'reset_default_image' => 'sometimes',

                /* Upload Files */
                'main_image_path' => 'sometimes|file|mimes:jpeg,jpg,png|max:' . ($this->limit_size_main_image * $this->ratio_megabytes_to_kilobytes),

                'multi_digital_files' =>  ['sometimes',  new MultiDigitalTotalSizeUpload($this->limit_size_total_digital_files)],
                'multi_digital_files.*' => 'file|mimes:zip,rar,7zip,mp3,wav,mp4,jpg,jpeg,png',
            ],
            [
                'main_image_path.required' => 'Main Image : is required.',
                'main_image_path.mimes'  => 'Main Image : only accepts jpeg, jpg, png.',
                'main_image_path.max'  => 'Main Image : size is limited to ' . $this->limit_size_main_image . 'MB.',

                'multi_digital_files.*.mimes'  => 'Mutiple Digital Files Upload : only zip, rar, 7zip, mp3, wav, mp4, jpeg, jpg, png formats are allowed.',
            ]
        );

        if ($validator->fails()) {
            Alert::toast('Please verify your formular again !', 'error');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('form_1', true);
        }

        $product_update = Product::find($id);

        //Manage checkboxes
        $checkboxes = Helpers::manage_product_checkboxes($request, ['hot_deals', 'special_offer', 'special_deals', 'featured']);

        // Find Category to save names with product
        $category = Category::find($request->cat_id);

        // Manage product_tags_complete
        $product_tags_complete = Helpers::fill_products_tags($request->product_tags, $product_update);

        /* Update Product */
        $product_update->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->cat_id,
            'category_name' => $category->name,
            'product_code' => $request->product_code,
            'product_type' => 2,
            'product_tags' => $request->product_tags,
            'product_tags_complete' => $product_tags_complete,
            'price' => Helpers::sanitize_db_price($request->price),
            'discount_percent' => Helpers::sanitize_db_price($request->discount_percent),
            'selling_price' => Helpers::sanitize_db_price($request->price) - Helpers::sanitize_db_price($request->discount_percent),
            'long_description' => $request->long_description,
            'short_description' => $request->short_description,
            'hot_deals' => $checkboxes['hot_deals'],
            'featured' =>  $checkboxes['featured'],
            'special_deals' => $checkboxes['special_deals'],
            'special_offer' =>  $checkboxes['special_offer'],
            'status' => 0,
        ]);

        // If a main file is uploaded
        if ($request->has('main_image_path')) {

            // If main file exist
            if ($product_update->main_image_path) {
                // Delete Old main image
                Helpers::delete_file(storage_path('app/private/' . $product_update->main_image_path));
            }

            //Update new files image path
            $main_image_path = $this->upload_one_file_and_return_path_database($request->main_image_path, $product_update);
            /* dd($main_image_path); */
            $product_update->update(
                [
                    'main_image_path' => $main_image_path
                ]
            );
        }

        // If multiple files image are uploaded
        if ($request->has('multi_images_files')) {

            // Delete Old folder of multiple images
            Helpers::delete_folder(storage_path('app/private/admin/product-' . $product_update->id . '/multi-images/'));

            // Delete Old Multi Images Path 
            $old_multi_images_path = MultiImageProduct::where('product_id', $product_update->id)->get();
            foreach ($old_multi_images_path as $image_path) {
                $image_path->delete();
            }

            $this->upload_multi_images_and_save_path($request->multi_images_files, $product_update);
        }

        //Table pivot product_categories
        /* Helpers::pivot_table_update_product_categories($request, $product_update); */

        Alert::toast('Your Product has been successfully Updated !', 'success');
        return redirect()->route('products.all');
    }
}
