<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GeneralWebsiteSettings;
use App\Models\Product;
use App\Models\ProductVariant;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    private $general_website_settings;
    private $categories_nested;

    public function __construct()
    {
        SeoController::metaTag();
        $this->general_website_settings = GeneralWebsiteSettings::find(1);

        //Category Nested
        $this->categories_nested = Category::whereNull('parent_id')
            ->with('children')
            ->orderby('name', 'asc')
            ->get();
    }

    public function cart()
    {

        if (Cart::count()) {
            return view(
                'website.pages.cart',
                [
                    'general_website_settings' => $this->general_website_settings,
                    'categories_nested' => $this->categories_nested,
                ]
            );
        } else {
            Alert::toast('Your cart is empty !', 'warning');
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        /*  dd($request->all()); */
        $validator = Validator::make(
            $request->all(),
            [
                'variant_id' => 'required',
                'product_id' => 'required',
                'qty' => 'required'
            ],
            [
                'qty.required' => 'The quantity is required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(
                [
                    'response' => false,
                    'message' => 'The quantity is required',
                ]
            );
        }

        $product = Product::findorFail($request->product_id);
        $product_variant = ProductVariant::findorFail($request->variant_id);

        if ($product_variant->qty > 0) {
            Cart::add([
                'id' => $product_variant->id,
                'name' => $product->name,
                'qty' => $request->qty,
                'price' => $product_variant->unit_price,
                'options' => [
                    'product_variant' => $product_variant->name,
                    'file_path' => $product->file_path,
                ],
            ]);

            return response()->json(
                [
                    'response' => true,
                    'message' => 'Item successfully added to your Cart !',
                    'cart_nb_items' => Cart::count(),
                ]
            );
        } else {

            return response()->json(
                [
                    'response' => false,
                    'message' => 'Out of stock !',
                ]
            );
        }
    }

    public function delete()
    {
        Cart::destroy();
    }
}
