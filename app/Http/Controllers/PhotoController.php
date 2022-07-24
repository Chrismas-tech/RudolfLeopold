<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelpers;
use App\Helpers\InterventionHelpers;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PhotoController extends Controller
{
    private $admin;

    // 1MB => 1048Kbs
    private $ratio_megabytes_to_kilobytes = 1048;
    private $limit_size_photos = 40; // in MB

    public function __construct()
    {
        /* Permet de construire des autres Admin si un jour le besoin */
        $this->middleware(function ($request, $next) {
            $this->admin = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function photos_all()
    {
        $photos = Photo::orderBy('created_at', 'asc')->paginate(10);

        return view('admin.pages.photos.photos-all', [
            'admin' => $this->admin,
            'photos' => $photos,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*  dd($request->all()); */


        /* dd($request->all(), $id); */
        $validator = Validator::make(
            $request->all(),
            [
                // Photos
                'photos.*' => 'file|mimes:jpeg,jpg,png|max:' . ($this->limit_size_photos * $this->ratio_megabytes_to_kilobytes),
            ],
            [
                // Variant Images
                'photos.*.mimes'  => 'Multiple Images Product Variants : only jpeg, jpg formats allowed.',
                'photos.*.max'  => 'Upload Size Product Variant : The total size upload must not exceed ' . $this->limit_size_photos . 'MB',
            ]
        );

        if ($validator->fails()) {
            Alert::toast('Please verify your formular again !', 'error');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('form_1', true);
        }

        $this->store_multiple_photos($request->photos);

        Alert::toast('You successfully added new Photos !', 'success');
        return redirect()->back();
    }

    private function store_multiple_photos($photos)
    {
        // If files uploaded and exist
        if (isset($photos) && !empty($photos)) {
            // Save new files images
            InterventionHelpers::save_multi_photos_album($photos);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        /* dd($request->all()); */
        if ($request->delete_checkbox) {
            $checkbox_ids = json_decode($request->delete_checkbox);

            foreach ($checkbox_ids as $id) {
                $photo = Photo::find($id);

                FileHelpers::delete_folder(public_path('img/img-template/photos/photo-' . $id));
                $photo->delete();
                Alert::toast('You successfully deleted the Photo(s) !', 'success');
            }
        }

        return redirect()->back();
    }
}
