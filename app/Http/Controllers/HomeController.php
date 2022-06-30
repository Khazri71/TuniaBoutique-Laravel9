<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Auth
use Illuminate\Support\Facades\Auth;

//Model User
use App\Models\User;

//Model Product
use App\Models\Product;

//Model Cart
use App\Models\Cart;

//Model Order
use App\Models\Order;


class HomeController extends Controller
{
    //Index
    public function index(){
          //---
         // $user = Auth::user();
          //---
    
        //Vêtements pour Hommes
        $productmen = Product::where('category_name' , 'Like', 'Vêtements pour Hommes')->paginate(3);

        //Vêtements pour Femmes
        $productwomen = Product::where('category_name' , 'Like', 'Vêtements pour Femmes')->paginate(3);

        //Vêtements pour Enfants
        $productKid = Product::where('category_name' , 'Like', 'Vêtements pour Enfants')->paginate(3);
        //if(Auth::id()){
        //---
        //Nombre des Produits Ajoutées au Panier (Carte) par un utilisateur connecté
       // $count = Cart::where('user_id' , 'Like' , $user->id)->count();
        //---
       // return view('customer.home' , compact('productmen' , 'productwomen' , 'productKid' , 'count'));
       // }
        //else{
            return view('customer.home' , compact('productmen' , 'productwomen' , 'productKid' ));
       // }
       
      
    }
    //Redirection selon role
    public function redirect(){

        //---
        $user = Auth::user();
        //---
        $role=Auth::user()->role;
        if( $role == '0' ){
        //Espace Utilisateur
       
        //Vêtements pour Hommes
        $productmen = Product::where('category_name' , 'Like', 'Vêtements pour Hommes')->paginate(3);

        //Vêtements pour Femmes
        $productwomen = Product::where('category_name' , 'Like', 'Vêtements pour Femmes')->paginate(3);

        //Vêtements pour Enfants
        $productKid = Product::where('category_name' , 'Like', 'Vêtements pour Enfants')->paginate(3);


        //---
        //Nombre des Produits Ajoutées au Panier (Carte) par un utilisateur connecté
        $count = Cart::where('user_id' , 'Like' , $user->id)->count();
        //---
        return view('customer.home' , compact('productmen' , 'productwomen' , 'productKid' , 'count'));
        }
        else{
             
            //Espace Admin
            //Produits totaux
            $total_product = Product::all()->count();
            //Commandes totaux
            $total_order = Order::all()->count();
            //Commandes Livrées
            $total_order_delivred =Order::where('delivery_status' , 'LIKE' , 'Livré')->count();
            //Commande En Traitement
            $total_order_processing =Order::where('delivery_status' , 'LIKE' , 'En traitement')->count();
            //Prix revenu maintenant
            $order_delivred =Order::where('delivery_status' , 'LIKE' , 'Livré')->get();
            $revenue_now = 0;
            foreach($order_delivred  as $order_delivred ){
               $revenue_now += $order_delivred->product_price;
            }
            //Prix revenu aprés
            $order_processing =Order::where('delivery_status' , 'LIKE' , 'En traitement')->get();
            $revenue_after = 0;
            foreach($order_processing  as $order_processing ){
               $revenue_after += $order_processing->product_price;
            }
            //Revenu Total à atteindre
            $order =Order::all();
            $total_revenue = 0;
            foreach($order as $order){
                $total_revenue += $order->product_price;
            }

            //Clients Total
            $total_customer = User::where('role' , 'LIKE' , '0')->count();

            //Nom Admin Connecté 
            $username = Auth::user()->name;
            return view('admin.home' , compact('total_product' , 'total_order' , 'total_order_delivred', 'total_order_processing' , 'revenue_now' , 'revenue_after' , 'total_revenue' , 'total_customer' , 'username'));
        }
    }



    
     //Rechercher Produits selon Nom Produit 
     public function search_product(Request $request){
            //---
            $user = Auth::user();
            //---
     
            //---
           //Nombre des Produits Ajoutées au Panier (Carte) par un utilisateur connecté
             $count = Cart::where('user_id' , 'Like' , $user->id)->count();
           //---

      $search = $request->search;
      $products = Product::where('name' , 'Like', "%$search%")->paginate(6);
      return view('customer.show-all-products' , compact('products' , 'count'));

  }

    
   //À Propos de nous vue
   public function about_us(){
    return view('customer.about-us');
   }
    
}
