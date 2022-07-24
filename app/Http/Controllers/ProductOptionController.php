<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelpers;
use App\Models\MultipleImageProductVariant;
use App\Models\ProductOption;
use App\Models\ProductOptionPivot;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProductOptionController extends Controller
{
    private $admin;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->admin = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function options_all()
    {
        $product_options = ProductOption::orderBy('name', 'asc')->get();

        return view(
            'admin.pages.options.product-options',
            [
                'admin' => $this->admin,
                'products_options' => $product_options,
            ],

        );
    }

    public function store(Request $request)
    {

        /* dd($request->all()); */
        $validator = Validator::make(
            $request->all(),
            [
                'option_name' => 'required|string|unique:product_options,name',
                'product_options_tags' => 'required|string',
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

        ProductOption::create([
            'name' => strtolower($request->option_name),
            'value' => $request->product_options_tags,
        ]);

        Alert::toast('Your options has been created !', 'success');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        /* dd($request->all()); */
        $product_option_update = ProductOption::findorFail($request->option_id);

        $validator = Validator::make(
            $request->all(),
            [
                'option_id' => 'required|string',
                'option_name' => 'required|string|unique:product_options,name,' . $request->option_id,
                'option_value' => 'required|string',
            ],
            []
        );

        if ($validator->fails()) {
            Alert::toast('Please verify your formular again !', 'error');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('form_2', true);
        }

        $product_option_update->update(
            [
                'name' => $request->option_name,
                'value' => $request->option_value,
            ]
        );

        Alert::toast('Your options has been updated !', 'success');
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        /* dd($request->all()); */
        if ($request->delete_checkbox) {
            $checkbox_ids = json_decode($request->delete_checkbox);

            foreach ($checkbox_ids as $id) {
                // Delete Product Option Pivot
                $product_option = ProductOptionPivot::where('product_option_id', ($id));
                $product_option->delete();

                // Delete Product Option Pivot
                $product_option = ProductOption::find($id);
                $product_option->delete();

                Alert::toast('Your options has been deleted !', 'success');
                return redirect()->back();
            }
        }
    }

    public function ajax_option_product(Request $request)
    {
        if ($request->ajax()) {
            $input_values = $request->get('input_values');
            $id = $request->get('id');

            $product_variant = ProductVariant::where('product_id', $id)
                ->where(function ($q)  use ($input_values) {
                    foreach ($input_values as $value) {
                        $q->where('name', 'like', '%/' . $value . '/%');
                    }
                })
                ->first();

            $multi_images_variant = MultipleImageProductVariant::where('product_variant_id', $product_variant->id)->get();

            $array_absolute_img_path = [];

            foreach ($multi_images_variant as $img_variant) {
                $array_absolute_img_path[] = asset($img_variant->file_path);
            }

            return response()->json(
                [
                    'message' => true,
                    'product' => $product_variant,
                    'multi_images_variant' => $array_absolute_img_path,
                ]
            );
        }
    }
}
