<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AziendeController;
// USE DEL PROFESSORE
// use App\Http\Controllers\OldPublicController;
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

Route::get('/', [PublicController::class, 'index'])
        ->name('homepage');

Route::get('/aziende', [PublicController::class, 'aziende'])
        ->name('aziende');

Route::get('/aziende/{azienda}', [PublicController::class, 'azienda'])
    ->name('azienda');

Route::get('/promozione/{promozione}', [PublicController::class, 'promozione'])
        ->name('promozione');

Route::get('/faq', [PublicController::class, 'faq'])
        ->name('faq');

Route::get('/admin/companies', [PublicController::class, 'adminCompanies'])
    ->name('adminCompanies');

Route::get('/admin/faq', [PublicController::class, 'adminFaq'])
    ->name('adminFaq');

Route::get('/admin/utenti', [PublicController::class, 'adminUsers'])
    ->name('adminUsers');

Route::get('/admin/staff', [PublicController::class, 'adminStaff'])
    ->name('adminStaff');

Route::get('/staff/promozioni', [PublicController::class, 'staffPromo'])
    ->name('staffPromo');



// ROTTE DEL PROFESSORE
// Route::get('/', [OldPublicController::class, 'showCatalog1'])
//         ->name('catalog1');

// Route::get('/selTopCat/{topCatId}', [OldPublicController::class, 'showCatalog2'])
//         ->name('catalog2');

// Route::get('/selTopCat/{topCatId}/selCat/{catId}', [OldPublicController::class, 'showCatalog3'])
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
