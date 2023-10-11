<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImageProductController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use App\Http\Controllers\User\PayPalController as UserPayPalController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('redirect',[RedirectController::class,'redirect']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth' , 'admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
###################################################### ADMIN ###############################################################

# Admin Routes
# Middleware Located Inside Controllers

Route::prefix('admin')->group(function(){


    # category Route
    Route::resource('category', CategoryController::class)
    #destroy category function in livewire/admin/category/index.php
    ->only(['index','create','store','edit','update']);


    #Brands Route
    #store , edit , update and destroy functions by livewire
    Route::resource('brand', BrandsController::class)
    ->only(['index']);


    #product Route
    Route::resource('products', ProductController::class)
    ->only(['index','create','store','edit','update','destroy']);


    #Image Product Route To Delete Product Images
    Route::get('product-image/{id}',[ImageProductController::class,'destroy'])
    ->name("product_images.delete")
    ->where('id', '[0-9]+');


    #Slider Carousel Route
    Route::resource('slider',SliderController::class)
    ->only(['index','create','store','edit','update','destroy']);


    #order admin controller
    Route::controller(OrderController::class)->group(function(){


        #All orders route
        Route::get('/orders','index')->name('admin.orders');


        #order details route
        Route::get('/order/show/{id}', 'showOrder')->name('admin.show-order');
        Route::put('/order/show/{id}', 'updateStatus')->name('admin.updateStatus');


        #download Invoice
        Route::get('invoiceDownload/{orderId}', "downloadInvoice")->name("downloadInvoice");


        #view invoice
        Route::get("/invoice/{orderId}", 'viewInvoice')->name('viewInvoice');


    });


    # add , display , edit and delete users from admin panel
    Route::controller(UsersController::class)->group(function(){


        # display all users
        Route::get('users' , 'index')->name('admin.all-users');
        Route::get('users/create' , 'create')->name('admin.create-user');
        Route::post('users/store' , 'store')->name('store-user');
        Route::get('users/{id}/edit' , 'edit')->name('edit-user');
        Route::post('users/{id}/update' , 'update')->name('update-user');
        Route::post('users/{id}/delete' , 'delete')->name('delete-user');
    });


    Route::get('home',[DashboardController::class,'index'])->middleware('admin')->name('admin.home');



});
###################################################### USER ###############################################################

# User Routes
Route::prefix('user')->name('user.')->group(function(){


    Route::controller(IndexController::class)->group(function () {


        #Index Route
        Route::get('home','index')->name('home');


        #shop route where display all product sorted randomly
        Route::get('shop','shop')->name('shop');


        #display products belongs to a certain category
        Route::get('categoryProduct/{Category_slug}','categoryProduct')->name('categoryProduct');


        #display product details like image , name ,description and price
        Route::get('product-details/{id}','productDetails')->where('id', '[0-9]+')->name('productDetails');


        #search bar
        Route::get('search' , 'searchProduct')->name('search');


    });

###################################################### AUTHENTICATED USER ###############################################################

        #only authenticated can access
        Route::middleware('auth')->group(function () {


            #wishlist route
            Route::view('wishlist','user.pages.wishlist.wishlist')->name('wishlist');


            #cart route
            Route::view('cart','user.pages.cart.cart')->name('cart');


            #checkout route
            Route::view('checkout','user.pages.checkout.checkout')->name('checkout');


            #thank you page after checkout
            Route::view('thank-you' , 'user.pages.thankYou')->name('thank-you');


            #return to thank you page after confirm payment
            Route::get('payment-success',[UserPayPalController::class,'success'])->name('payment.success');


            #return to thank you page after confirm payment
            Route::view('payment-cancel',"user.pages.checkout.checkout")->name('payment.cancel');


            #thank you page after successful payment
            Route::view('thank-you','user.pages.thankYou')->name('thank');


            #UserOrderController routes
            Route::controller(UserOrderController::class)->group(function(){


                #orders for specific user
                Route::get('orders','index')->name('orders');


                #order details page
                Route::get('/order/show/{id}', 'showOrder')->name('show-order');


            });


        } );


});