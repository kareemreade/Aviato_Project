<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\siteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\productsController;
use App\Http\Controllers\CaregorysController;
use App\Http\Controllers\CartController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::prefix(LaravelLocalization::setLocale())->group(function(){
                Route::get('/',[siteController::class,'index'])->name('index');
/////////////////////////////////////////////web site routers////////////////////////////////////////////////////////////////
            Route::prefix('site1')->name('site1.')->group(function(){
                    Route::get('/',[siteController::class,'index'])->name('home');
                    Route::get('Shop',[siteController::class,'Shop'])->name('Shop');
                    Route::get('category/{id}',[siteController::class,'category'])->name('category');
                    Route::get('product/{id}',[siteController::class,'product'])->name('product');
                    Route::post('reviews/{id}',[siteController::class,'reviews'])->name('reviews');
                    Route::get('/Search',[siteController::class,'Search'])->name('Search');
                    Route::post('carts/{id}',[siteController::class,'carts'])->name('carts')->middleware('auth');
                    Route::get('cart',[siteController::class,'showcart'])->name('showcart')->middleware('auth');
                    Route::delete('carts_delete/{id}',[siteController::class,'destroy'])->name('destroy');
                    Route::get('Checkout',[siteController::class,'Checkout'])->name('Checkout')->middleware('auth');
                    Route::get('payment',[siteController::class,'payment'])->name('payment')->middleware('auth');
                    Route::get('paysuccessful',[siteController::class,'paysuccessful'])->name('paysuccessful')->middleware('auth');
                    Route::get('payErros',[siteController::class,'payErros'])->name('payErros')->middleware('auth');
                    Route::post('sendemil',[siteController::class,'sendemil'])->name('sendemil');





              });



            //////////////////////////////////////////////////////////////
            /////////////////////////////////////////admin route///////////////////////

            Route::prefix('Admin')->name('Admin.')->middleware('auth','Cheek_User')->group(function(){

                Route::get('/',[AdminController::class,'index'])->name('index');
                /////////////////////////////////////////categories routes//////////////////////////////////////////////////////
                Route::get('Caregorys/trash',[CaregorysController::class,'trash'])->name('catag.trash');
                Route::get('Caregorys/{id}/restor',[CaregorysController::class,'restor'])->name('Caregorys.restor');
                Route::delete('Caregorys/{id}/forcedelete',[CaregorysController::class,'forcedelete'])->name('Caregorys.forcedelete');
                Route::resource('Caregorys',CaregorysController::class);
                //////////////////////////////prodects routes//////////////////////////////////////////////////////////
                Route::get('products/trash',[productsController::class,'trash'])->name('product.trash');
                Route::get('products/{id}/restor',[productsController::class,'restor'])->name('products.restor');
                Route::delete('products/{id}/forcedelete',[productsController::class,'forcedelete'])->name('products.forcedelete');
                Route::resource('products',productsController::class);
                Route::get('reviews',[AdminController::class,'reviews'])->name('reviews');
                Route::delete('reviews/{id}',[AdminController::class,'destory'])->name('reviews.destory');
                Route::get('orders',[AdminController::class,'orders'])->name('orders');
                Route::delete('orders/{id}',[AdminController::class,'order_destory'])->name('order_destory');
                Route::get('payments',[AdminController::class,'payments'])->name('payments');
                Route::delete('payments/{id}',[AdminController::class,'payments_destory'])->name('payments_destory');




                //////////////////////////////users router/////////////////////////////////////////////////////////////
                Route::get('users',[UsersController::class,'index'])->name('users');
                Route::delete('users/{id}',[UsersController::class,'destroy'])->name('users.destroy');

            });

            Auth::routes();
            // Route::get('/home', [HomeController::class, 'index'])->name('home');
            // Route::view('not-allowed','not-allowed');
            Route::get('not-allowed',[HomeController::class ,'not_allowed'])->name('not-allowed');





});


