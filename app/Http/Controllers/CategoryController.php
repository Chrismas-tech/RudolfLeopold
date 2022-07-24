<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelpers;
use App\Helpers\InterventionHelpers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $admin;
    private $ratio_megabytes_to_kilobytes = 1048;
    private $limit_size_main_image = 5; // in MB

    public function __construct()
    {
        /* Permet de construire des autres Admin si un jour le besoin */
        $this->middleware(function ($request, $next) {
            $this->admin = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function categories_all()
    {
        /* Cette variable vide doit exister car si l'on ajoute une subcategory, 
        on collecte tous les parent_id pour ouvrir le menu au bon endroit */
        $collect_parent_ids = [];

        $categories = Category::whereNull('parent_id')
            ->with('children')
            ->orderby('name', 'asc')
            ->get();

        return view('admin.pages.categories.categories-all', [
            'admin' => $this->admin,
            'categories' => $categories,
            'collect_parent_ids' => $collect_parent_ids,
        ]);
    }


    public function store(Request $request)
    {
        /*  dd($request->all()); */
        $validator = Validator::make(
            $request->all(),
            [
                'cat_name' => 'required|unique:categories,name',
                'file_path_mega_menu' => 'sometimes|file|mimes:jpeg,jpg,png|max:' . ($this->limit_size_main_image * $this->ratio_megabytes_to_kilobytes),
                'category_icon' => 'sometimes|string',
            ],
            [
                'cat_name.required' => 'The category name is required.',
                'cat_name.unique' => 'The category name has been already taken.'
            ]
        );

        if ($validator->fails()) {
            Alert::toast('Please verify your formular again !', 'error');
            return redirect()->back()
                ->with('form_1', true)
                ->withErrors($validator->errors())
                ->withInput();
        }

        $category_icon = '<i class="bi bi-'.$request->category_icon.'"></i>';

        $new_category = Category::create([
            'name' => $request->cat_name,
            'slug' => Str::slug($request->cat_name),
            'parent_id' => null,
            'file_path_mega_menu' => $request->file_path_mega_menu,
            'url_mega_menu' => asset($request->file_path_mega_menu),
            'category_icon' => $category_icon,
            'category_name' => $request->category_icon,
        ]);

        // If Main Image Uploaded
        if ($request->file_path_mega_menu) {

            // Save new files images
            $file_path = InterventionHelpers::save_image_intervention($request->file_path_mega_menu, 'categories', 'category', $new_category->id, 'mega-menu-category', 'mega-menu-category-');

            $new_category->update(
                [
                    'file_path_mega_menu' => $file_path,
                    'url_mega_menu' => url($file_path),
                ]
            );
        }

        Alert::toast('You successfully created a Category !', 'success');
        return redirect()->back();
    }


    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.pages.categories.category-edit', [
            'admin' => $this->admin,
            'category' => $category
        ]);
    }

    public function update(Request $request, $id)
    {

        /* dd($request->all()); */
        $update = Category::findOrFail($id);
        $validator = Validator::make(
            $request->all(),
            [
                'cat_name' => 'required|unique:categories,name, ' . $id . ',id',
                'file_path_mega_menu' => 'sometimes|file|mimes:jpeg,jpg,png|max:' . ($this->limit_size_main_image * $this->ratio_megabytes_to_kilobytes),
                'category_icon' => 'sometimes|string',
            ],
            [
                'cat_name.required' => 'The category name is required.',
                'cat_name.unique' => 'The category name has been already taken.'
            ]
        );

        if ($validator->fails()) {
            Alert::toast('Please verify your formular again !', 'error');
            return redirect()->back()
                ->with('form_1', true)
                ->withErrors($validator->errors())
                ->withInput();
        }

        $category_icon = '<i class="bi bi-'.$request->category_icon.'"></i>';

        $update->update([
            'cat_name' => $request->cat_name,
            'slug' => Str::slug($request->cat_name),
            'parent_id' => null,
            'file_path_mega_menu' => $request->file_path_mega_menu,
            'url_mega_menu' => asset($request->file_path_mega_menu),
            'category_icon' => $category_icon,
            'category_name' => $request->category_icon,
        ]);

        // If Main Image Uploaded
        if ($request->file_path_mega_menu) {
            //Delete Old file if exist
            if ($update->file_path_mega_menu) {
                FileHelpers::delete_file(public_path($update->file_path_mega_menu));
            }

            // Save new file image
            $file_path = InterventionHelpers::save_image_intervention(
                $request->file_path_mega_menu,
                'categories',
                'category',
                $update->id,
                'mega-menu-category',
                'mega-menu-category-'
            );

            $update->update(
                [
                    'file_path_mega_menu' => $file_path,
                    'url_mega_menu' => asset($file_path),
                ]
            );
        }

        Alert::toast('You successfully updated a Category !', 'success');
        return redirect()->route('categories.all');
    }


    public function delete($id)
    {
        $category = Category::find($id);

        // Delete ProductCategories Entries
        /* $products_category = ProductCategories::where('category_id', $id)->get();

        if (count($products_category)) {
            foreach ($products_category as $product) {
                $product->delete();
            }
        } */

        // Delete Products Entries
        $products = Product::where('category_id', $id)->get();

        if (count($products)) {
            foreach ($products as $product) {
                $product->delete();
            }
        }


        // Open the menus
        $collect_parent_ids = $category->getParentsIDs($category);
        /*  dd('yolo'); */

        $category->delete();
        Alert::toast('You successfully deleted a Category !', 'success');
        return redirect()->back()->with(compact('collect_parent_ids'));;
    }
}
