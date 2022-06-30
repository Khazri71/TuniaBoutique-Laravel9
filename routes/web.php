<?php

use Illuminate\Support\Facades\Route;
//HomeController
use App\Http\Controllers\HomeController;
//CategoryController
use App\Http\Controllers\CategoryController;
//ProductController
use App\Http\Controllers\ProductController;
//CartController
use App\Http\Controllers\CartController;
//OrderController
use App\Http\Controllers\OrderController;

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

route::get('/' , [HomeController::class , 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//->middleware('auth','verified');
route::get('/redirection' , [HomeController::class , 'redirect']);


//Admin
//Ajouter Catégorie vue
route::get('/ajouter-categorie' , [CategoryController::class , 'add_category']);

//Ajouter Catégorie fonction
route::post('/ajouter-categorie-fn' , [CategoryController::class , 'add_category_fn']);

//Supprimer Catégorie fonction
route::get('/supprimer-categorie-fn/{id}' , [CategoryController::class , 'delete_category_fn']);

//Ajouter Produit vue
route::get('/ajouter-produit' , [ProductController::class , 'add_product']);

//Ajouter Produit fonction
route::post('/ajouter-produit-fn' , [ProductController::class , 'add_product_fn']);

//Consulter Produits
route::get('/consulter-produits' , [ProductController::class , 'show_products']);

//Supprimer Produit
route::get('/supprimer-produit-fn/{id}' , [ProductController::class , 'delete_product']);

//Modifier Produit vue
route::get('/modifier-produit/{id}' , [ProductController::class , 'update_product']);

//Modifier Produit fonction
route::post('/modifier-produit-fn/{id}' , [ProductController::class , 'update_product_fn']);

//Consulter Ordres vue
route::get('/consulter-ordres' , [OrderController::class , 'show_orders']);

//Modifier État Produit Liver Oui ou Rester en traitement
route::get('/modifier-Livrer-fn/{id}' , [OrderController::class , 'update_deliver_fn']);

//Imprimer PDF
route::get('/imprimer-pdf/{id}' , [OrderController::class , 'print_pdf']);
//Envoyer Email vue
route::get('/envoyer-email/{id}' , [OrderController::class , 'send_email']);
//Envoyer Email fonction
route::post('/envoyer-email-fn/{id}' , [OrderController::class , 'send_email_fn']);

//Rechercher Ordre (Commande) selon user_name product_name product_price
route::get('/rechercher-ordre-produit' , [OrderController::class , 'search_Order_Product']);






//Customer
//Détails d'un Produit
route::get('/détails-produit/{id}'  , [ProductController::class , 'details_product']);

//Ajouter une Carte fonction
route::post('/ajouter-carte-fn/{id}' , [CartController::class , 'add_cart_fn']);

//Consulter Carte vue
route::get('/consulter-carte' , [CartController::class , 'show_cart']);

//Supprimer Produit(s)  du Panier (Carte)
route::get('/supprimer-cart/{id}' , [CartController::class , 'delete_cart']);

//Ajouter Ordre fonction
route::get('/ajouter-ordre-fn' , [OrderController::class , 'add_order_fn']);

//Stripe Payment Processing 
//Stripe Payment Processing vue
route::get('/stripe/{totalPrice}', [OrderController::class ,  'stripe' ]);
//Stripe Payment Processing fonction
route::post('/stripe/{totalPrice}', [OrderController::class , 'stripePost'])->name('stripe.post');

//Consulter Ordre (Commande) vue
route::get('/consulter-ordres-cust' , [OrderController::class , 'show_orders_cust']);
//Annuler Ordre (Commande) fonction
route::get('/annuler-ordre-fn/{id}' , [OrderController::class , 'cancel_order_fn']);

 //Rechercher Produits  selon Nom Produit 
 route::get('/rechercher-produit', [HomeController::class , 'search_product']);


//À Propos de nous vue
route::get('/à-propos-de-nous', [HomeController::class , 'about_us']);
//Consulter Tous Les Produits
route::get('/consulter-tous-produits', [ProductController::class , 'show_all_products']);
