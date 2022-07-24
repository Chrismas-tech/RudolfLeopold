<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    private $admin;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->admin = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function store(Request $request)
    {

        /* dd($request->all()); */
        $validator = Validator::make(
            $request->all(),
            [
                'sub_cat_name' => 'required',
            ],
            [
                'sub_cat_name.required' => 'The Subcategory name is required.'
            ]
        );

        if ($validator->fails()) {
            Alert::toast('Please verify your formular again !', 'error');
            return redirect()->back()
                ->with('form_2', true)
                ->withErrors($validator->errors())
                ->withInput();
        }

        $subcategory = Category::create(
            [
                'name' => $request->sub_cat_name,
                'slug' => Str::slug($request->sub_cat_name),
                'parent_id' => $request->sub_cat_id,
            ]
        );

        // Open the menus
        $collect_parent_ids = $subcategory->getParentsIDs($subcategory);
        /* dd($collect_parent_ids); */
        Alert::toast('You successfully created a SubCategory !', 'success');
        return redirect()->back()->with(compact('collect_parent_ids'));
    }


    public function edit($id)
    {
        $subCategory = Category::find($id);

        return view('admin.pages.categories.category-edit', [
            'admin' => $this->admin,
            'category' => $subCategory
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'edit_sub_cat_name' => 'required',
                'edit_sub_cat_id' => 'required',
            ],
        );

        if ($validator->fails()) {
            Alert::toast('Please verify your formular again !', 'error');
            return redirect()->back()
                ->with('form_3', true)
                ->withErrors($validator->errors())
                ->withInput();
        } else {

            /* dd($request->all()); */

            $category = Category::find($request->edit_sub_cat_id);
            $category->update([
                'name' => $request->edit_sub_cat_name,
                'slug' => Str::slug($request->edit_sub_cat_name),
            ]);

            // Open the menus
            $collect_parent_ids = $category->getParentsIDs($category);

            $category->save();
            Alert::toast('You successfully updated your Category/SubCategory !', 'success');
            return redirect()->back()->with(compact('collect_parent_ids'));
        }
    }
}
