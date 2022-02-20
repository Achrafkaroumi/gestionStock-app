<?php

use App\Http\Controllers\AchatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FournisseursController;
use App\Http\Controllers\logout;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout',[logout::class, 'logout'])->name('logout');


Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth']],function(){
    Route::get('home',[AdminController::class,'index'])->name('admin.dashbord');
    Route::get('stock',[StockController::class,'indexx'])->name('admin.stock');
    Route::resource('fournisseurs',FournisseursController::class);
    Route::get('fournisseur',[FournisseursController::class,'indexx'])->name('admin.fournisseur');
    Route::resource('clients',ClientController::class);
    Route::get('client',[ClientController::class,'indexx'])->name('admin.clients');
    Route::get('commande',[CommandeController::class,'index'])->name('admin.commandes');
});


Route::group(['prefix'=>'agent','middleware'=>['isAgent','auth']],function(){
    Route::get('/home',[UserController::class,'index'])->name('agent.dashbord');
    Route::resource('/stock',StockController::class);
    Route::resource('/categorie',CategorieController::class);
    Route::resource('/produits',ProduitController::class);
    Route::get('/produit',[ProduitController::class,'index']);
    Route::get('recherchecat',[CategorieController::class,'rechercheCat'])->name('agent.categorie.recherche');
    Route::resource('/achat',AchatController::class);
    Route::resource('/vente',VenteController::class);
    Route::resource('/fournisseur',FournisseursController::class);
    Route::get('client',[ClientController::class,'index'])->name('agent.clients');
    Route::get('facture_ac/{id}',[FactureController::class,'index_ac'])->name('agent.fact_ac');
    Route::get('facture_vt/{id}',[FactureController::class,'index_vt'])->name('agent.fact_vt');
    Route::get('rechercheprix',[VenteController::class,'rechercheProd'])->name('agent.vente.rechercheP');
});