<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\StripePaymentController;
use App\Models\PaymentMethod;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('stripe', [StripePaymentController::class, 'stripe']);
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/payments/create', [PaymentMethodController::class, 'create']);
Route::get('/payments/edit/{id}', [PaymentMethodController::class, 'edit']);
Route::put('/payments/update/{id}', [PaymentMethodController::class, 'update']);
Route::delete('/payments/delete/{id}', [PaymentMethodController::class, 'destroy']);
Route::get('/index', [PaymentMethodController::class, 'index']);
Route::post('/payments/store', [PaymentMethodController::class, 'store']);




