<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\MusicTrackController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDigitalController;
use App\Http\Controllers\ProductMaterialController;
use App\Http\Controllers\ProductOptionController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\SearchBarController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsitePageController;
use App\Http\Controllers\YoutubeVideoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';

/* ******************* WEBSITE PAGES START ********************* */
/* Home */
Route::get('/', [WebsitePageController::class, 'home'])->name('website.home');

/* Product Details */
Route::get('/product-details/{id}/{slug}', [WebsitePageController::class, 'product_details'])->name('website.product.details');


/* Shop  */
Route::get('/videos-gallery', [WebsitePageController::class, 'videos_gallery'])->name('website.videos-gallery');
Route::get('/photos-gallery', [WebsitePageController::class, 'photos_gallery'])->name('website.photos-gallery');
Route::get('/tracks', [WebsitePageController::class, 'tracks'])->name('website.tracks');
Route::post('/update-positions', [MusicTrackController::class, 'update_positions'])->name('tracks.update.position');
Route::get('/contact', [WebsitePageController::class, 'contact'])->name('website.contact');

/* Page de test */
Route::get('/test', [WebsitePageController::class, 'test'])->name('website.test');

/* ******************* WEBSITE PAGES END ********************* */




/* ******************* AJAX START ********************* */

/* Ajax Search Bar Auto Completion */
Route::post('/ajax-searchbar', [SearchBarController::class, 'ajax_search_bar']);

/* Ajax Product Option Search */
Route::post('/ajax-option-product', [ProductOptionController::class, 'ajax_option_product']);

/* ******************* AJAX END ********************* */




/* ******************* CART START ********************* */

/* Cart */
Route::get('/cart', [CartController::class, 'cart'])->name('cart.show');

// Ajax Cart add Product
Route::post('/add-to-cart/', [CartController::class, 'store'])->name('cart.store');

// Delete Cart
Route::get('/delete-cart', [CartController::class, 'delete'])->name('cart.delete');

/* ******************* CART END ********************* */





/* User Routes */

/* Logout */
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::middleware(['auth', 'verified'])->group(function () {

    /* Shop Add Review --> needs Auth */
    Route::post('/add-review/{id}', [ProductReviewController::class, 'add_review'])->name('review.add');

    Route::prefix('profile')->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
        Route::get('/photo/serve', [UserController::class, 'profile_photo_serve'])->name('user.profile.photo.serve');
        Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
        Route::post('/edit', [UserController::class, 'edit_profile'])->name('user.profile.edit');
        Route::get('/photo/serve', [UserController::class, 'profile_photo_serve'])->name('user.profile.photo.serve');
        Route::post('/password', [UserController::class, 'change_password'])->name('user.profile.password');
        Route::delete('/account/delete', [UserController::class, 'delete_account'])->name('user.delete.account');

        // Addresses
        Route::prefix('address')->group(function () {
            Route::get('/', [UserController::class, 'address'])->name('user.address');
            Route::post('/update/{id}', [UserController::class, 'update_address'])->name('user.address.update');
        });
    });
});




/* Admin Routes */
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login_form'])->name('admin.form');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');

    Route::middleware(['admin'])->group(function () {
        /* Page de test */
        Route::get('/admin-test', [AdminController::class, 'test'])->name('admin.test');
        Route::get('/choose-icon', [AdminController::class, 'choose_icon'])->name('choose.icon');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::post('/profile/edit', [AdminController::class, 'edit_profile'])->name('admin.profile.edit');

        // Profile photo serve
        Route::get('/profile/photo/serve', [AdminController::class, 'profile_photo_serve'])->name('admin.profile.photo.serve');

        // Profile password
        Route::post('/profile/password', [AdminController::class, 'change_password'])->name('admin.profile.password');

        // Categories
        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'categories_all'])->name('categories.all');
            Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
            Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        });

        // SubCategories
        Route::prefix('subcategory')->group(function () {
            Route::post('/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
            Route::post('/update', [SubCategoryController::class, 'update'])->name('subcategory.update');
        });

        // Products
        Route::prefix('products')->group(function () {

            Route::get('/', [ProductController::class, 'products_all'])->name('products.all');

            Route::post('/clone/{id}', [ProductController::class, 'clone'])->name('product.clone');
            Route::post('/delete', [ProductController::class, 'delete'])->name('product.delete');

            Route::prefix('material')->group(function () {
                Route::get('/add', [ProductMaterialController::class, 'add_view'])->name('product-material.add');
                Route::post('/store', [ProductMaterialController::class, 'store'])->name('product-material.store');
                Route::get('/edit/{id}', [ProductMaterialController::class, 'edit'])->name('product-material.edit');
                Route::post('/update-informations/{id}', [ProductMaterialController::class, 'update_informations'])->name('product-material.update-informations');

                Route::prefix('product-variants')->group(function () {
                    Route::post('/generate', [ProductVariantController::class, 'generate_variants'])->name('product-variants.generate');
                    Route::post('/update/{id}', [ProductVariantController::class, 'update_variants'])->name('product-variants.update');
                    Route::post('/update-price-qty-discount-sku/{id}', [ProductMaterialController::class, 'update_price_qty_discount_sku_simple_product'])->name('product-material.product-variants.update-price-qty-discount-sku');
                });
            });

            Route::prefix('digital')->group(function () {
                Route::get('/add', [ProductDigitalController::class, 'add_view'])->name('product-digital.add');
                Route::post('/store', [ProductDigitalController::class, 'store'])->name('product-digital.store');
                Route::get('/edit/{id}', [ProductDigitalController::class, 'edit'])->name('product-digital.edit');
                Route::post('/update/{id}', [ProductDigitalController::class, 'update'])->name('product-digital.update');
                Route::get('/download-file/{id}', [ProductDigitalController::class, 'download_file_serve'])->name('product-digital.download.file');
                Route::get('/download-file-list/{id}', [ProductDigitalController::class, 'download_file_serve_list'])->name('product-digital.download.file.list');
            });

            Route::prefix('reviews')->group(function () {
                Route::get('/', [ProductReviewController::class, 'reviews_all'])->name('reviews.all');
                Route::post('/approve/{id}', [ProductReviewController::class, 'approve'])->name('review.approve');
                Route::post('/pending/{id}', [ProductReviewController::class, 'pending'])->name('review.pending');
                Route::post('/reject/{id}', [ProductReviewController::class, 'reject'])->name('review.reject');
                Route::post('/delete', [ProductReviewController::class, 'delete'])->name('review.delete');
            });

            Route::prefix('options')->group(function () {
                Route::get('/', [ProductOptionController::class, 'options_all'])->name('options.all');
                Route::post('/store', [ProductOptionController::class, 'store'])->name('option.store');
                Route::post('/update', [ProductOptionController::class, 'update'])->name('option.update');
                Route::post('/delete', [ProductOptionController::class, 'delete'])->name('option.delete');
            });
        });

        // Musicians
        Route::prefix('youtube-videos')->group(function () {
            Route::get('/', [YoutubeVideoController::class, 'videos_all'])->name('youtube-videos.all');
            Route::post('/store', [YoutubeVideoController::class, 'store'])->name('youtube-videos.store');
            Route::post('/update', [YoutubeVideoController::class, 'update'])->name('youtube-videos.update');
            Route::post('/ajax-edit', [YoutubeVideoController::class, 'ajax_edit']);
            Route::post('/delete', [YoutubeVideoController::class, 'delete'])->name('youtube-videos.delete');
        });

        // Album Photo
        Route::prefix('photos')->group(function () {
            Route::get('/', [PhotoController::class, 'photos_all'])->name('photos.all');
            Route::post('/store', [PhotoController::class, 'store'])->name('photo.store');
            Route::post('/update', [PhotoController::class, 'update'])->name('photo.update');
            Route::post('/delete', [PhotoController::class, 'delete'])->name('photo.delete');
        });

        // Album Photo
        Route::prefix('music-tracks')->group(function () {
            Route::get('/', [MusicTrackController::class, 'tracks_all'])->name('tracks.all');
            Route::post('/store', [MusicTrackController::class, 'store'])->name('track.store');
            Route::post('/update', [MusicTrackController::class, 'update'])->name('track.update');
            Route::post('/delete', [MusicTrackController::class, 'delete'])->name('track.delete');
        });
    });
});

/* Email */
Route::post('/ajax-email', [EmailController::class, 'send_email'])->name('send-email');

/* SitemapGenerator */
Route::get('/sitemap', [WebsitePageController::class, 'sitemap']);

/* Error Page */
Route::get('/{any}', [WebsitePageController::class, 'page_404'])->name('website.404');
