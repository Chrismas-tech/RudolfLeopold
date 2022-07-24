<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelpers;
use App\Helpers\InterventionHelpers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    private $admin;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->admin = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function login_form()
    {
        $categories = Category::whereNull('parent_id')
            ->with('children')
            ->orderby('name', 'asc')
            ->get();

        return view('admin.layouts.login');
    }

    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt([
            'email' => $request['email'],
            'password' => $request['password'],
        ])) {
            Alert::toast('You are connected as Administrator !', 'success');
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->withErrors(['error' => 'Invalid Email or Password']);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Alert::toast('You successfully logged out from Administration !', 'success');
        return redirect()->route('admin.form');
    }

    public function dashboard()
    {
        return view(
            'admin.pages.dashboard',
            [
                'admin' => $this->admin,
            ]
        );
    }

    public function profile()
    {
        return view(
            'admin.pages.profile',
            [
                'admin' => $this->admin,
            ]
        );
    }

    public function edit_profile(Request $request)
    {
        /* dd($request->all()); */
        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'email' => 'required|email|string',
                'address' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'postal_code' => ['required', 'digits:5'],
                'phone' => ['required', 'string', 'digits_between:10,13'],
                'file'  => 'sometimes|file|mimes:jpg,png,jpeg|max:2120',
            ]
        );

        if ($validator->fails()) {
            Alert::toast('Please verify your formular again !', 'success');
            return redirect()->back()
                ->withErrors($validator)
                ->with('form_1', true);
        }

        $this->manage_photo_profile($request, $this->admin);

        $this->admin->update(
            [
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'address' => $request->address,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'phone' => $request->phone,
            ]
        );

        $this->admin->save();
        Alert::toast('Your changes are saved !', 'success');
        return redirect()->back();
    }


    private function manage_photo_profile($request, $model)
    {
        // If Main Image Uploaded
        if ($request->img_photo) {
            //Delete Old Main image variant if exist
            //Update model entry file path Product
            FileHelpers::delete_folder(storage_path('app/private/avatar'));

            // Save new files images
            $file_path = InterventionHelpers::save_image_profile_photo(
                $request->img_photo,
                'avatar',
                'avatar-image-'
            );

            $model->update(
                [
                    'avatar_path' => $file_path,
                ]
            );
        }
    }

    public function profile_photo_serve()
    {
        if ($this->admin->avatar_path) {
            $path_img = storage_path($this->admin->avatar_path);
        } else {
            $path_img = public_path('img/img-admin/profile-photo/no_image.jpg');
        }
        return response()->file($path_img);
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
                        if (!Hash::check($value, $this->admin->password)) {
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
            Alert::toast('Please verify your formular again !', 'success');
            return redirect()->back()
                ->with('form_2', true)
                ->withErrors($validator->errors())
                ->withInput();
        }

        $this->admin->password = Hash::make($request->password);
        $this->admin->save();
        Alert::toast('Your changes are saved !', 'success');
        return redirect()->back();
    }

    public function test()
    {
        return view(
            'admin.pages.test',
            [
                'admin' => $this->admin,
            ]
        );
    }

    public function choose_icon() {
        return view(
            'admin.pages.choose-icon',
            [
                'admin' => $this->admin,
            ]
        );  
    }
}
