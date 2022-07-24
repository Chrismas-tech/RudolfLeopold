<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\GeneralClientSettings;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            $title_page = 'Verify your email';
            $general_website_settings = GeneralClientSettings::find(1)->first();
            return view('auth.verify-email', compact('title_page', 'general_website_settings'));
        }
    }
}
