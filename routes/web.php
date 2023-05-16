<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AziendeController;
// USE DEL PROFESSORE
// use App\Http\Controllers\PublicController;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\UserController;

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

Route::get('/', [HomepageController::class, 'index'])
        ->name('homepage');

Route::get('/aziende', [AziendeController::class, 'index'])
        ->name('aziende');

Route::get('/azienda', [AziendaController::class, 'index'])
        ->name('azienda');

Route::get('/faq', [FaqController::class, 'index'])
        ->name('faq');

Route::get('/coupon', [CouponController::class, 'index'])
        ->name('coupon');

// ROTTE DEL PROFESSORE
// Route::get('/', [PublicController::class, 'showCatalog1'])
//         ->name('catalog1');

// Route::get('/selTopCat/{topCatId}', [PublicController::class, 'showCatalog2'])
//         ->name('catalog2');

// Route::get('/selTopCat/{topCatId}/selCat/{catId}', [PublicController::class, 'showCatalog3'])
//         ->name('catalog3');

// Route::get('/admin', [AdminController::class, 'index'])
//         ->name('admin');

// Route::get('/admin/newproduct', [AdminController::class, 'addProduct'])
//         ->name('newproduct');

// Route::post('/admin/newproduct', [AdminController::class, 'storeProduct'])
//         ->name('newproduct.store');

// Route::get('/user', [UserController::class, 'index'])
//         ->name('user')->middleware('can:isUser');


// Route::view('/where', 'where')
//         ->name('where');

// Route::view('/who', 'who')
//         ->name('who');

/*  Rotte aggiunte da Breeze

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

*/
require __DIR__.'/auth.php';
