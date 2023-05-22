<?php

use App\Http\Controllers\AziendaController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PromozioneController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\StaffController;



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

/*Rotte public*/
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

Route::get('/profilo', [UserController::class, 'profilo'])
    ->name('profilo')
    ->middleware('auth', 'can:isUserOrStaff');

Route::get('/profilo/edit', [UserController::class, 'edit'])
    ->name('profilo.edit')
    ->middleware('auth', 'can:isUserOrStaff');

Route::put('/profilo', [UserController::class, 'update'])
    ->name('profilo.update')
    ->middleware('auth', 'can:isUserOrStaff');

Route::get('/profilo/coupon/{coupon}', [UserController::class, 'couponProfilo'])
    ->name('coupon.profilo')
    ->middleware('auth', 'can:isUser');

Route::get('/promozione/{promozione}/riscatta', [UserController::class, 'riscatta'])
    ->name('riscatta');

Route::get('/promozione/{promozione}/{coupon}', [UserController::class, 'coupon'])
    ->name('coupon');



/* Rotte admin*/
Route::get('/admin/aziende', [AdminController::class, 'index'])
    ->name('admin.aziende');

Route::get('/admin/faq', [AdminController::class, 'faq'])
    ->name('admin.faq');

Route::get('/admin/utenti', [AdminController::class, 'users'])
    ->name('admin.users');

Route::get('/admin/staff', [AdminController::class, 'staff'])
    ->name('admin.staff');

Route::get('/admin/stats', [AdminController::class, 'stats'])
    ->name('admin.stats');

Route::get('/staff', [StaffController::class, 'promos'])
    ->name('staff.promos');

// Rotte per la CRUD aziende
Route::get('/admin/azienda/create', [AziendaController::class, 'create'])
    ->name('azienda.create');

Route::post('/admin/azienda', [AziendaController::class, 'store'])
    ->name('azienda.store');

Route::get('/admin/azienda/{azienda}/edit', [AziendaController::class, 'edit'])
    ->name('azienda.edit');

Route::put('/admin/azienda/{azienda}', [AziendaController::class, 'update'])
    ->name('azienda.update');

Route::get('/admin/azienda/{azienda}/delete', [AziendaController::class, 'delete'])
    ->name('azienda.delete');


// Rotte per la CRUD faq
Route::get('/admin/faq/create', [FaqController::class, 'create'])
    ->name('faq.create');

Route::post('/admin/faq', [FaqController::class, 'store'])
    ->name('faq.store');

Route::get('/admin/faq/{faq}/edit', [FaqController::class, 'edit'])
    ->name('faq.edit');

Route::put('/admin/faq/{faq}', [FaqController::class, 'update'])
    ->name('faq.update');

Route::get('/admin/faq/{faq}/delete', [FaqController::class, 'delete'])
    ->name('faq.delete');


// Rotte per la CRUD staff
Route::get('/admin/staff/create', [StaffController::class, 'create'])
    ->name('staff.create');

Route::post('/admin/staff', [StaffController::class, 'store'])
    ->name('staff.store');

Route::get('/admin/staff/{staff}/edit', [StaffController::class, 'edit'])
    ->name('staff.edit');

Route::put('/admin/staff/{staff}', [StaffController::class, 'update'])
    ->name('staff.update');

Route::get('/admin/staff/{staff}/delete', [StaffController::class, 'delete'])
    ->name('staff.delete');

//Rotte per la delete degli utenti
Route::get('/admin/user/{user}/delete', [UserController::class, 'delete'])
    ->name('user.delete');

//Rotte per la CRUD promozioni
Route::get('/staff/promo/create', [PromozioneController::class, 'create'])
    ->name('promo.create');

Route::post('/staff/promo', [PromozioneController::class, 'store'])
    ->name('promo.store');

Route::get('/staff/promo/{promo}/edit', [PromozioneController::class, 'edit'])
    ->name('promo.edit');

Route::put('/staff/promo/{promo}', [PromozioneController::class, 'update'])
    ->name('promo.update');

Route::get('/staff/promo/{promo}/delete', [PromozioneController::class, 'delete'])
    ->name('promo.delete');

//Rotte per le statistiche
/*Route::get('/admin/stats', [StatController::class, 'stats'])
    ->name('admin.stats');*/

/*Route::get('/admin/stats/users', [StatController::class, 'userStats'])
    ->name('admin.stats.users');

Route::get('/admin/stats/promozioni', [StatController::class, 'promoStats'])
    ->name('admin.stats.promozioni');*/

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
require __DIR__ . '/auth.php';
