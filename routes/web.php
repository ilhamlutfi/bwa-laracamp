<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\CheckoutController;

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
})->name('welcome');

// routes group auth if user login
Route::middleware('auth')->group(function () {
    // routes dashboard
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // routes checkout
    Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout-success');
    // {camp:slug} untuk ambil slug dari tbl camp
    Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])->name('checkout-create');
    // {camp} untuk ambil id dari tbl camp
    Route::post('checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout-store');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// socialite routes
Route::get('sign-in-google', [UserController::class, 'google'])->name('sign-in-google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user-google-callback');

require __DIR__.'/auth.php';
