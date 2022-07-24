<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProductReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->admin = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function reviews_all()
    {
        $reviews = ProductReview::orderBy('created_at', 'desc')->get();

        return view(
            'admin.pages.reviews.reviews-all',
            [
                'reviews' => $reviews,
                'admin' => $this->admin,
            ]
        );
    }

    public function add_review($id, Request $request)
    {

        if (Auth::check()) {

            // Check existing reviews and reject if one alraady exist in database
            $product_reviews_user = ProductReview::where('user_id', Auth::user()->id)
                ->where('product_id', $id)
                ->first();

            if ($product_reviews_user) {
                Alert::toast('You already wrote a review on this product !', 'error');
                return redirect()->back();
            }


            /* dd($request->all()); */
            $validator = Validator::make(
                $request->all(),
                [
                    'rating' => ['required', 'string', 'digits_between:1,5'],
                    'message' => ['required', 'string', 'max:1000'],
                ],
                [
                    'rating.required' => 'The rating is required.',
                    'message.required' => 'The message is required.'
                ]
            );

            if ($validator->fails()) {
                Alert::toast('Please verify your formular again !', 'error');
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('form_2', true);
            }

            ProductReview::create(
                [
                    'user_id' => Auth::user()->id,
                    'username' => Auth::user()->name,
                    'product_id' => $id,
                    'review' => $request->message,
                    'rating' => $request->rating,
                    'status' => 2,
                ]
            );

            Alert::toast('Your review has been successfully sent and will be evaluated by our Administrators soon !', 'success');

            return redirect()->back();
        } else {
            Alert::toast('Log in to write a Review !', 'error');
            return redirect()->back();
        }
    }

    public function approve($id)
    {
        $product_review = ProductReview::find($id);
        $product_review->update([
            'status' => 1,
        ]);

        Alert::toast('The review has been successfully approved', 'success');
        return redirect()->back();
    }

    public function pending($id)
    {
        $product_review = ProductReview::find($id);
        $product_review->update([
            'status' => 2,
        ]);

        Alert::toast('The review has been set in pending', 'success');
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        /* dd($request->all()); */
        if ($request->delete_checkbox) {
            $checkbox_ids = json_decode($request->delete_checkbox);

            foreach ($checkbox_ids as $id) {
                $product_review = ProductReview::findOrFail($id);
                $product_review->delete();
            }
            
            Alert::toast('Your Product Review has been deleted !', 'success');
            return redirect()->back();
        }
    }
}
