<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Helpers\VariantsHelpers;
use App\Models\Category;
use App\Models\Currency;
use App\Models\MultipleImageProductVariant;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\ProductOptionPivot;
use App\Models\ProductVariant;
use App\Models\Weight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class ProductMaterialController extends Controller
{
    private $admin;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->admin = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function add_view()
    {
        // Product Options Table
        $options = ProductOption::orderBy('name', 'asc')->get();

        //Product Weight Table
        $weights = Weight::all();

        //Product Currencies Table
        $currencies = Currency::all();

        $categories = Category::orderBy('name', 'asc')->get();

        return view(
            'admin.pages.product.product-material.add.add-product-material',
            [
                'admin' => $this->admin,
                'options' => $options,
                'weights' => $weights,
                'currencies' => $currencies,
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
                'tags' => 'sometimes|nullable',
                'weight' => 'required|between:0,99.99',
                'weight_id' => 'required',
                'long_description' => 'required|string',
                'short_description' => 'required|string',
                'visibile' => 'sometimes|boolean',
                'variant' => 'sometimes|boolean',
                'hot_deals' => 'sometimes|boolean',
                'featured' => 'sometimes|boolean',
                'special_deals' => 'sometimes|boolean',
                'special_offer' => 'sometimes|boolean',
                'variant' => 'sometimes|boolean',
                'option_ids' => 'sometimes|array',
            ],
            []
        );

        if ($validator->fails()) {
            Alert::toast('Please verify your formular again !', 'error');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('form_1', true);
        }

        // Find Category to save category name in product
        $category = Category::find($request->cat_id);

        // Manage checkboxes Deals
        $checkboxes_website = Helpers::manage_checkboxes_website($request, ['visible', 'hot_deals', 'special_offer', 'special_deals', 'featured']);

        //Manage checkboxes Options
        if ($request->option_ids) {
            $checkboxes_option_ids = Helpers::manage_checkboxes_options($request->option_ids);
        } else {
            $checkboxes_option_ids = null;
        }

        $new_product = Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->cat_id,
            'category_name' => $category->name,
            'currency_id' => 1,
            'type' => 1,
            'weight' => floatval($request->weight),
            'weight_id' => $request->weight_id,
            'long_description' => $request->long_description,
            'short_description' => $request->short_description,
            'visible' => $checkboxes_website['visible'],
            'hot_deals' => $checkboxes_website['hot_deals'],
            'featured' =>  $checkboxes_website['featured'],
            'special_deals' => $checkboxes_website['special_deals'],
            'special_offer' =>  $checkboxes_website['special_offer'],
        ]);


        $this->manage_tags($request, $new_product);
        VariantsHelpers::create_variants_or_not($checkboxes_option_ids, $new_product);
        Alert::toast('Your Product has been successfully created in database !', 'success');
        return redirect()->route('product-material.edit', $new_product->id)->with('tabs', 'tabs-highlight');
    }

    public function edit($id)
    {
        // Product Target
        $product = Product::findorfail($id);

        // Product Options Table
        $options = ProductOption::orderBy('name', 'asc')->get();

        // Product Options Pivot 
        $product_options_checked = ProductOptionPivot::where('product_id', $id)->get();

        // Product Variants Table
        $variants = ProductVariant::where('product_id', $id)->orderby('id', 'asc')->get();
        $multiple_img_variants = MultipleImageProductVariant::where('product_id', $id)->get();

        //Product Weight Table
        $weights = Weight::all();

        //Product Currencies Table
        $currencies = Currency::all();

        $categories = Category::orderBy('name', 'asc')->get();

        return view(
            'admin.pages.product.product-material.edit.edit-product-material',
            [
                'admin' => $this->admin,
                'product' => $product,
                'options' => $options,
                'product_options_checked' => $product_options_checked,
                'variants' => $variants,
                'multiple_img_variants' => $multiple_img_variants,
                'weights' => $weights,
                'currencies' => $currencies,
                'categories' => $categories,
            ]
        );
    }

    public function update_informations(Request $request, $id)
    {
        /* dd($request->all()); */
        $validator = Validator::make(
            $request->all(),
            [
                'cat_id' => 'required|max:255',
                'name' => 'required|max:255',
                'tags' => 'sometimes|nullable',
                'long_description' => 'required|string',
                'short_description' => 'required|string',
                'weight' => 'required|between:0,99.99',
                'weight_id' => 'required',
                'visibile' => 'sometimes|boolean',
                'hot_deals' => 'sometimes|boolean',
                'featured' => 'sometimes|boolean',
                'special_deals' => 'sometimes|boolean',
                'special_offer' => 'sometimes|boolean',
                'option_ids' => 'sometimes|array',
            ],
            []
        );

        if ($validator->fails()) {
            Alert::toast('Please verify your formular again !', 'error');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('form_1', true);
        }

        // Product Target Update
        $update = Product::find($id);

        // Find Category to save category name in product
        $category = Category::find($request->cat_id);

        // Manage checkboxes Deals
        $checkboxes_website = Helpers::manage_checkboxes_website($request, ['visible', 'hot_deals', 'special_offer', 'special_deals', 'featured']);

        $update->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->cat_id,
            'category_name' => $category->name,
            'type' => 1,
            'weight' => floatval($request->weight),
            'weight_id' => $request->weight_id,
            'long_description' => $request->long_description,
            'short_description' => $request->short_description,
            'visible' => $checkboxes_website['visible'],
            'hot_deals' => $checkboxes_website['hot_deals'],
            'featured' =>  $checkboxes_website['featured'],
            'special_deals' => $checkboxes_website['special_deals'],
            'special_offer' =>  $checkboxes_website['special_offer'],
        ]);

        
        $this->manage_tags($request, $update);
        Alert::toast('Your Product has been successfully Updated !', 'success');
        return redirect()->back();
    }


    private function manage_tags($request, $update)
    {
        // Update tags, Concatenate tags with category names and product name
        // We do it after because we need the category id to change before update product tags
        $tags = Helpers::fill_products_tags($request->tags, $update);

        $update->update([
            'tags' => $tags,
        ]);
    }
}
