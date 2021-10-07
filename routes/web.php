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

Route::get('/',[\App\Http\Controllers\HomeController::class, 'index'])->name("welcome");

// administrateur

Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard1', function () { return view('dashboard1'); })->name('dashboard1');

Route::get('dashboard/demandeEnCours', [\App\Http\Controllers\CommandeController::class, 'list'])->middleware(['trusted.login'])->name('demandeEnCours');

Route::get('dashboard/demandeEnCours/edit/{id}/',[\App\Http\Controllers\CommandeController::class, 'edit'])->name('edit');

Route::get('/delete/{id}/',[\App\Http\Controllers\CommandeController::class, 'delete'])->name('delete');

// Promotion
Route::get('dashboard/createPromotion', [\App\Http\Controllers\PromotionController::class, 'create'])->middleware(['trusted.login'])->name('promotions.createPromotion');

Route::get('dashboard/promotions/edit/{id}/',[\App\Http\Controllers\PromotionController::class, 'edit'])->name('promotions.Edit');

Route::get('dashboard/promotions/delete/{id}/',[\App\Http\Controllers\PromotionController::class, 'delete'])->name('promotions.delete');

Route::get('dashboard/promotions', [\App\Http\Controllers\PromotionController::class, 'index'])->middleware(['trusted.login'])->name('promotions.listePromotions');

Route::post('dashboard/createPromotion/submit', [\App\Http\Controllers\PromotionController::class, 'store'])->name("store-promotion-request");


// drop

Route::post('dashboard/createDrop/submit', [\App\Http\Controllers\DropController::class, 'store'])->name("store-drop-request");

Route::get('dashboard/drops', [\App\Http\Controllers\DropController::class, 'index'])->middleware(['trusted.login'])->name('drops.listeDrops');

Route::get('dashboard/createDrop', [\App\Http\Controllers\DropController::class, 'create'])->middleware(['trusted.login'])->name('drops.createDrop');

Route::get('dashboard/drops/edit/{id}/',[\App\Http\Controllers\DropController::class, 'edit'])->name('drops.Edit');

Route::get('dashboard/drops/delete/{id}/',[\App\Http\Controllers\DropController::class, 'delete'])->name('drops.delete');


// article
Route::get('dashboard/articles', [\App\Http\Controllers\ArticleController::class, 'index'])->middleware(['trusted.login'])->name('articles.listeArticles');

Route::get('dashboard/articles/createArticle', [\App\Http\Controllers\ArticleController::class, 'create'])->middleware(['trusted.login'])->name('articles.createArticle');

Route::post('dashboard/articles/createArticle/submit', [\App\Http\Controllers\ArticleController::class, 'store'])->name("store-article-request");

Route::get('dashboard/articles/edit/{id}/',[\App\Http\Controllers\ArticleController::class, 'edit'])->name('articles.Edit');

Route::get('dashboard/articles/delete/{id}/',[\App\Http\Controllers\ArticleController::class, 'delete'])->name('articles.delete');


// taille
Route::get('dashboard/tailles', [\App\Http\Controllers\TailleController::class, 'index'])->middleware(['trusted.login'])->name('tailles.listeTailles');

Route::get('dashboard/tailles/createTaille', [\App\Http\Controllers\TailleController::class, 'create'])->middleware(['trusted.login'])->name('tailles.createTaille');

Route::post('dashboard/tailles/createTaille/submit', [\App\Http\Controllers\TailleController::class, 'store'])->name("store-taille-request");

Route::get('dashboard/tailles/edit/{id}/',[\App\Http\Controllers\TailleController::class, 'edit'])->name('tailles.Edit');

Route::get('dashboard/tailles/delete/{id}/',[\App\Http\Controllers\TailleController::class, 'delete'])->name('tailles.delete');







// User

Route::get('/commande', [\App\Http\Controllers\CommandeController::class, 'index'])->middleware(['trusted.login'])->name('commande');
//test
Route::post('/product-page', [\App\Http\Controllers\ProductController::class, 'index'])->middleware(['trusted.login'])->name('produit');

Route::get('/demandeEnCoursUser', [\App\Http\Controllers\CommandeController::class, 'listUser'])->middleware(['trusted.login'])->name('demandeEnCoursUser');

Route::post('/submit', [\App\Http\Controllers\CommandeController::class, 'store'])->middleware(['trusted.login'])->name("store-commande-request");


Route::get('/AccepteCommande', function () {return view('commandes.BonCommande'); });

Route::get('/StockOut', function () {return view('StockOut'); });


// Section paiements
Route::get('mollie-payment',[MollieController::Class,'preparePayment'])->name('mollie.payment');
Route::get('/BonCommande',[MollieController::Class, 'paymentSuccess'])->name('BonCommande');

require __DIR__.'/auth.php';


