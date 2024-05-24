<?php

use App\Events\Admin\RealTimeNotifEvent;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Frontend\CustomPageController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\FrontendPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Frontend\Order;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(FrontendController::class)->group(function () {
    Route::get('/',  'index')->name('home');

    // profile
    Route::post('/profile/update', 'profileUpdate')->name('profile.update');
    Route::post('/profile/image/update', 'profileImageUpdate')->name('profile.image.update');


    // wishlist
    Route::get('/wishlist',  'wishlist')->name('wishlist');

    Route::get('/wishlist/store/{productId}',  'wishlistStore')->name('wishlist.store');
});



Route::controller(FrontendPageController::class)->group(function () {
    // chef
    Route::get('/chef',  'chefPage')->name('chef');

    // about
    Route::get('/about',  'aboutPage')->name('about');

    // contact
    Route::get('/contact',  'contactPage')->name('contact');
    Route::post('/contact/message/send',  'contactMessageSend')->name('contact.message.send');

    // terms & condition
    Route::get('/terms-condition',  'termsPage')->name('terms_condition');

    // blog
    Route::get('/blogs',  'blogPage')->name('blogs');
    Route::get('/blog/details/{slug}',  'blogDetails')->name('blog.details');


    // products
    Route::get('/products', 'productPage')->name('products');

    // testimonial
    Route::get('/testimonial',  'testimonialPage')->name('testimonial');
});


// invoke controller
Route::get('/pages/{slug}', CustomPageController::class);


Route::get('/notif', function () {
    RealTimeNotifEvent::dispatch('hi');
});

Route::get('/dashboard', function () {
    $totalOrders = Order::where('user_id', Auth::id())->count();
    $pendingOrders = Order::where(['user_id' => Auth::id(), 'order_status'  => 'pending'])->count();
    $completedOrders = Order::where(['user_id' => Auth::id(), 'order_status'  => 'delivered'])->count();
    $processedOrders = Order::where(['user_id' => Auth::id(), 'order_status'  => 'processed'])->count();

    return view('dashboard', [
        'totalOrders'           => $totalOrders,
        'pendingOrders'         => $pendingOrders,
        'completedOrders'       => $completedOrders,
        'processedOrders'       => $processedOrders,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/users', [UserController::class, 'userList'])->name('users');


require 'auth.php';

require 'frontend/index.php';
