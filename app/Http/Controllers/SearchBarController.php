<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchBarController extends Controller
{
    public function ajax_search_bar(Request $request)
    {
        if ($request->ajax()) {
            $string = $request->get('q');

            // We search the products BY TAGS directly -> super useful
            $products_search = Product::where('tags', 'like', '%' . $string . '%')
                ->limit(30)
                /* ->groupBy('name') */
                ->get();

            // We search also all categories
            $categories_search = DB::table('categories')
                ->where('slug', 'like', $string . '%')
                /* ->limit(5) */
                ->groupBy('name')
                ->get();

            return response()->json(
                [
                    'status' => true,
                    'products' => $products_search,
                    'categories' => $categories_search,
                ]
            );
        }
    }
}
