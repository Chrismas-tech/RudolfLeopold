<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GeneralWebsiteSettings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
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

    public function dashboard()
    {
        return view('website.pages.dashboard', [
            'user' => Auth::user(),
            'general_website_settings' => $this->general_website_settings,
            'categories_nested' => $this->categories_nested,
        ]);
    }

    public function edit_profile(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|max:25',
                'lastname' => 'required|max:25',
                'phone' => 'required|digits_between:10,13',
                'email' => 'required|email|unique:users,email,' . Auth::user()->id,
                'file'  => 'sometimes|file|mimes:jpg,png,jpeg|max:2120',
            ]
        );

        /* dd($validator); */

        if ($validator->fails()) {
            Alert::toast('Please verify your formular again !', 'error');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('form_1', true);
        }

        // If file upload
        if ($request->has('file')) {
            $file = $request->file;

            // If old photo exists ? => delete
            if (Auth::user()->profile_photo_path) {
                $old_file_path = Auth::user()->profile_photo_path;

                if (file_exists(storage_path('app/private/' . $old_file_path))) {
                    unlink(storage_path('app/private/' . $old_file_path));
                }

                // Upload new profile_photo
                $this->upload_photo_and_save_path($file);
            } else {
                // Upload new profile_photo
                $this->upload_photo_and_save_path($file);
            }
        }

        Auth::user()->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]
        );

        Auth::user()->save();
        Alert::toast('Your changes are saved !', 'success');
        return redirect()->back();
    }

    private function upload_photo_and_save_path($file)
    {
        $folder_name = 'user/profile-photo';
        $extension_file = $file->extension();
        $file_name = 'photo-' . time() . '.' . $extension_file;
        $file->storeAs($folder_name, $file_name, 'private');

        $image_path = $folder_name . '/' . $file_name;

        Auth::user()->update(
            [
                'profile_photo_path' => $image_path,
            ]
        );
    }

    public function profile_photo_serve()
    {
        if (Auth::user()->profile_photo_path) {
            $path_img = storage_path('app/private/' . Auth::user()->profile_photo_path);
        } else {
            $path_img = storage_path('app/private/user/profile-photo/no_image.jpg');
        }
        return response()->file($path_img);
    }

    public function logout()
    {
        Auth::logout();
        Alert::toast('You\'re logged out !', 'success');
        return redirect()->route('login');
    }

    public function delete_account()
    {
        Auth::user()->delete();
        Alert::toast('You successfully deleted your Account !', 'success');
        return redirect()->route('website.home');
    }


    public function address()
    {
        return view('website.pages.address', [
            'user' => Auth::user(),
            'general_website_settings' => $this->general_website_settings,
            'categories_nested' => $this->categories_nested,
        ]);
    }

    public function update_address($id, Request $request)
    {

        $user = User::find($id)->first();

        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    Rule::unique('users')->ignore($user->id),
                ],
                'address' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'postal_code' => ['required', 'digits:5'],
                'phone' => ['required', 'string', 'digits_between:10,13'],
            ]
        );

        if ($validator->fails()) {
            Alert::toast('Please verify your formular again !', 'error');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('form_1', true);
        }

        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'phone' => $request->phone,
        ]);

        Alert::toast('Your address has been updated !', 'success');

        return redirect()->back();
    }


    public function change_password(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'old_password' => [
                    'required',
                    'min:8',
                    /* Verify if old password match */
                    function ($attribute, $value, $fail) {
                        if (!Hash::check($value, Auth::user()->password)) {
                            return $fail('Your old password is invalid.');
                        }
                    },
                ],

                'password' => 'required|min:8|different:old_password',
                'password_confirmation' => 'required|min:8|same:password'
            ],
            [
                'password.required' => 'The new password field is required',
                'password_confirmation.required' => 'The password confirmation field is required'
            ]
        );

        if ($validator->fails()) {
            Alert::toast('Please verify your formular again !', 'error');
            return redirect()->back()
                ->with('form_2', true)
                ->withErrors($validator->errors())
                ->withInput();
        }

        Auth::user()->password = Hash::make($request->password);
        Auth::user()->save();
        Alert::toast('Your changes are saved !', 'success');
        return redirect()->back();
    }
}
