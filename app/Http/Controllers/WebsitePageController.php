<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Category;
use App\Models\GeneralWebsiteSettings;
use App\Models\MultipleImageProductVariant;
use App\Models\Photo;
use App\Models\Product;
use App\Models\ProductOptionPivot;
use App\Models\ProductReview;
use App\Models\YoutubeVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Sitemap\SitemapGenerator;

class WebsitePageController extends Controller
{
    private $general_website_settings;
    private $paginate_default = 20;
    private $display_nb_results;
    private $paginate_reviews = 20;
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

    public function home(Request $request)
    {
        if ($request->lg == 'en') {
            $default_language = 'en';
        } elseif ($request->lg == 'at') {
            $default_language = 'at';
        } else {
            $default_language = 'en';
        }

        $ytb_videos = YoutubeVideo::orderBy('id', 'desc')->take(9)->get();
        $photos_gallery = Photo::orderBy('id', 'desc')->take(12)->get();

        // Checkbox
        $hot_deals_product = Product::where('hot_deals', 1)->limit(8)->get();
        $special_offer_product = Product::where('special_offer', 1)->limit(8)->get();
        $special_deals_product = Product::where('special_deals', 1)->limit(8)->get();
        $featured_product = Product::where('featured', 1)->limit(8)->get();

        return view(
            'website.pages.home',
            [
                'general_website_settings' => $this->general_website_settings,
                'categories_nested' => $this->categories_nested,
                'hot_deals_product' => $hot_deals_product,
                'special_offer_product' => $special_offer_product,
                'special_deals_product' => $special_deals_product,
                'featured_product' => $featured_product,
                'default_language' => $default_language,
                'ytb_videos' => $ytb_videos,
                'photos_gallery' => $photos_gallery,
            ]
        );
    }

    public function test(Request $request)
    {
    }

    public function product_details($id)
    {

        $product = Product::find($id);

        // Display Product Options
        $product_options_pivot = ProductOptionPivot::where('product_id', $id)->get();
        $product_options_values = [];

        foreach ($product_options_pivot as $option) {
            $product_options_values[$option->product_option->name] = $option->product_option->value;
        }

        // Case Simple Product, Call Multiple Image 
        $multiple_image_simple_product = MultipleImageProductVariant::where('product_id', $id)->get();

        if (!count($multiple_image_simple_product)) {
            $multiple_image_simple_product = '';
        }

        // PRODUCT RATING REVIEW
        $product_review = ProductReview::where('product_id', $id)->get();

        if (count($product_review)) {
            $sum_rating_review = DB::table("product_reviews")
                ->where('product_id', $id)
                ->where('status', 1)
                ->get()
                ->sum("rating");
            $nb_product_review = count(ProductReview::where('product_id', $id)->get());

            $product_review_rating = $sum_rating_review / $nb_product_review;
        } else {
            $product_review_rating = '';
        }

        // Call All Reviews
        $reviews = ProductReview::where('product_id', $id)->orderBy('created_at', 'desc')->paginate($this->paginate_reviews);

        return view(
            'website.pages.product-details',
            [
                'general_website_settings' => $this->general_website_settings,
                'categories_nested' => $this->categories_nested,
                'product' => $product,
                'product_review_rating' => $product_review_rating,
                'reviews' => $reviews,
                'product_options_pivot' => $product_options_pivot,
                'product_options_values' => $product_options_values,
                'multiple_image_simple_product' => $multiple_image_simple_product
            ]
        );
    }

    public function shop(Request $request)
    {
        // CASE MEGA MENU SEARCH
        if ($request->category_search) {
            /* dd($request->category_search); */

            //Category Nested
            $categories_left_side = Category::where('name', $request->category_search)
                ->with('children')
                ->orderby('name', 'asc')
                ->get();
        } else {
            $categories_left_side = '';
        }

        $all_products = $this->filters_shop_products($request);

        $collect_parent_ids = $this->collect_parent_ids($request->all());
        $collect_parent_names = $this->collect_parent_names($request->all());

        return view(
            'website.pages.shop-module.shop',
            [
                'general_website_settings' => $this->general_website_settings,
                'display_nb_results' => $this->display_nb_results,
                'categories_nested' => $this->categories_nested,
                'categories_left_side' => $categories_left_side,
                'collect_parent_ids' => $collect_parent_ids,
                'collect_parent_names' => $collect_parent_names,
                'all_products' => $all_products,
            ]
        );
    }

    public function page_404()
    {
        $title_page = "Page not Found";
        $categories_nested = Category::whereNull('parent_id')
            ->with('children')
            ->orderby('name', 'asc')
            ->get();

        return view(
            'website.layouts.error',
            [
                'title_page' => $title_page,
                'categories_nested' => $categories_nested,
                'general_website_settings' => $this->general_website_settings,
            ]
        );
    }

    private function filters_shop_products($r)
    {

        /*  dd($r->all()); */

        if (
            $r->min_price and $r->max_price or
            $r->brand or
            $r->color or
            $r->filter_price or
            $r->filter_nb_result or
            $r->search_bar
        ) {

            /* dd($r->all()); */

            $q = DB::table('products')

                ->when(
                    [
                        $r->brand,
                        $r->color,
                        $r->min_price,
                        $r->max_price,
                        $r->filter_price,
                        $r->search_bar
                    ],
                    function ($q) use ($r) {

                        // BRAND
                        if (isset($r->brand)) {
                            $q->where(function ($q)  use ($r) {
                                foreach ($r->brand as $value) {
                                    $q->orWhere('name', 'like', '%' . $value . '%');
                                }
                            });
                        }

                        // COLOR
                        if (isset($r->color)) {
                            $q->where(function ($q)  use ($r) {
                                foreach ($r->color as $value) {
                                    $q->orWhere('product_color', 'like', '%' . $value . '%');
                                }
                            });
                        }

                        // MIN/MAX PRICE
                        if (
                            isset($r->min_price) and isset($r->max_price) &&
                            (($r->max_price - $r->min_price) > 0)
                        ) {
                            $q->where(function ($q)  use ($r) {
                                $q->whereBetween('selling_price', [
                                    intval($r->min_price * 100),
                                    intval($r->max_price * 100)
                                ]);
                            });
                        }

                        // LOWEST/HIGHEST PRICES
                        if (isset($r->filter_price)) {
                            $q->orderBy('selling_price', $r->filter_price);
                        } else {
                            $q->orderBy('selling_price', 'asc');
                        }

                        /*
                        We search all products 
                        */
                        if (isset($r->search_bar)) {
                            $q->where(function ($q)  use ($r) {
                                $q->where('tags', 'like', '%' . $r->search_bar . '%');
                            });
                        }
                    }
                );


            /* dd($q->toSql(), $q, $q->get()); */

            // NB OF RESULTS DISPLAYED 
            $this->display_nb_results = ['results', count($q->get())];


            // PAGINATION 
            if ($r->filter_nb_result) {
                return $q->paginate($r->filter_nb_result);
            } else {
                return $q->paginate($this->paginate_default);
            }
        } else {
            $products = Product::orderBy('selling_price', 'asc')->paginate($this->paginate_default);
            $this->display_nb_results = ['all', count($products)];
            return $products;
        }
    }

    private function collect_parent_ids($r)
    {
        /* dd($r); */
        // FOR HIERARCHY WE JUST NEED TO COLLECT NAMES NESTED
        if (isset($r['cat_id']) and !empty($r['cat_id'])) {
            $category_target = Category::where('id', $r['cat_id'])->first();
            /* dd($category_target); */
            return Helpers::category_parents_ids($category_target);
        } else {
            return [];
        }
    }

    private function collect_parent_names($r)
    {
        // FOR HIERARCHY WE JUST NEED TO COLLECT NAMES NESTED
        if (isset($r['cat_id']) and !empty($r['cat_id'])) {
            $category_target = Category::where('id', $r['cat_id'])->first();
            return Helpers::category_parents_names($category_target);
        } else {
            return [];
        }
    }

    public function sitemap()
    {
        SitemapGenerator::create(env('APP_URL'))->writeToFile(public_path('sitemap.xml'));
        return Redirect::to('sitemap.xml');
    }
}
