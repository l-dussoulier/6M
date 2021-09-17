<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MollieController;

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

Route::get('/', function () { return view('welcome'); });

// administrateur

Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth'])->name('dashboard');

Route::get('/demandeEnCours', [\App\Http\Controllers\CommandeController::class, 'list'])->middleware(['trusted.login'])->name('demandeEnCours');

Route::get('/dashboard/edit/{id}/',[\App\Http\Controllers\CommandeController::class, 'edit'])->name('edit');


// User

Route::get('/commande', [\App\Http\Controllers\CommandeController::class, 'index'])->middleware(['trusted.login'])->name('commande');

Route::get('/demandeEnCoursUser', [\App\Http\Controllers\CommandeController::class, 'listUser'])->middleware(['trusted.login'])->name('demandeEnCoursUser');

Route::post('/submit', [\App\Http\Controllers\CommandeController::class, 'store'])->middleware(['trusted.login'])->name("store-commande-request");


Route::get('/AccepteCommande', function () {return view('BonCommande'); });

Route::get('/StockOut', function () {return view('StockOut'); });


// Section paiements
Route::get('mollie-payment',[MollieController::Class,'preparePayment'])->name('mollie.payment');
Route::get('/BonCommande',[MollieController::Class, 'paymentSuccess'])->name('BonCommande');

require __DIR__.'/auth.php';
