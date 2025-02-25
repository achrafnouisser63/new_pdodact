<?php
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MsgController;
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
    return view('site.index');
});
Route::get('/about', function () {
    return view('site.about');
});
Route::get('/contact', function () {
    return view('site.contact');
});
Route::get('/service', function () {
    return view('site.service');
});
Route::get('/offer', function () {
    return view('site.offer');
});



Route::middleware('auth:web')->group(function () {
Route::get('/produit', [ProduitController::class, 'detais'])->name('produit');
Route::get('/produits/Ajouter', [ProduitController::class,'Ajouter'])->name('ajouter');
Route::get('/ctg', [ProduitController::class, 'affiche_ctg'])->name('ctg');
Route::get('/edite_ctgr/{id}', [ProduitController::class, 'edite_ctgr'])->name('edite_ctgr');
Route::get('/prod', [ProduitController::class, 'affiche_prod'])->name('prod');
Route::post('/add_ctg', [ProduitController::class, 'add_ctg']);
Route::post('/addprod', [ProduitController::class, 'add_prod']);
Route::get('/Categories_delete/{id}', [ProduitController::class, 'Categories_delete'])->name('Categories_delete');
Route::post('/categories/{id}', [ProduitController::class, 'Categories_edite'])->name('Categories_edite');
Route::get('/produits_edite/{id}', [ProduitController::class, 'produits_edite'])->name('produits_edite');

Route::post('/edite_prod/{id}', [ProduitController::class, 'edite_prod'])->name('edite_prod');

Route::get('/produits_delete/{id}', [ProduitController::class, 'produits_delete'])->name('produits_delete');
Route::get('/categorie/ajout', [ProduitController::class, 'add_catgrosie']);
//Route::get('/produits', [ProduitController::class, 'index']);
Route::get('/profile', [AdminController::class, 'my_profile'])->name('profile.edit');

Route::get('/messages', [MsgController::class, 'messages']);
Route::get('/show_message/{id}', [MsgController::class, 'show_message']);

Route::get('/profile/update', [AdminController::class, 'update_my_profile'])->name('profile.update');
Route::post('/edite/profiles', [AdminController::class, 'edite_profiles']);
Route::get('/password/update', [AdminController::class, 'update_my_password']);
Route::post('/edite/password', [AdminController::class, 'edite_password']);




});




Route::get('/produits/{id}', [ProduitController::class, 'index'])->name('produits');
Route::get('/produite_dt/{id}', [ProduitController::class, 'produite_dt'])->name('produite_dt');

Route::post('/send_message', [MsgController::class, 'send_message']);





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/{page}',[AdminController::class, 'index']);